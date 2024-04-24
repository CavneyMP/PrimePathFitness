<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class WhoopAuthController extends Controller
{

    public function redirectToWhoop(Request $request) {

        $state   = Str :: random(40); // Using a laravel help to get a random string.
        $request -> session() -> put('oauth2state', $state); 
        
    // https://www.php.net/manual/en/function.http-build-query.php
        $query = http_build_query([
            // The clinet ID from the env file.
            'client_id'      => env('WHOOP_CLIENT_ID'),
             // the redicret URL from the env file.
             'redirect_uri'   => env('WHOOP_REDIRECT_URL'),
              // Specify that the response should return the code.
              'response_type'  => 'code', 
              //Requested data, going to fetch all.
               'scope' => 'read:recovery read:cycles read:sleep read:workout read:profile read:body_measurement',
               'state' => $state, // When local testing they want at least 8 bit for CSRF protection.


        ]);
            //To O Auth's end point, with $query string.
        return redirect ('https://api.prod.whoop.com/oauth/oauth2/auth?' . $query);

    }

    // Take param request, an isntance of request class, 
    // Responsible to handle call back once we have been authenticated.
    public function handleWhoopCallback(Request $request)
    {

            // Using laravels HTTP client, we can make a request to the whoop token end point
            // the asForm() method from this client can specify that the request body should be sent as form data.
        $response = Http::asForm()->post('https://api.prod.whoop.com/oauth/oauth2/token', [

                    // Parameters require for this request are:
            // To indicate that this is a request for an auth code.
            'grant_type'        => 'authorization_code',

             // The clinet ID from the env file.
             'client_id'         => env('WHOOP_CLIENT_ID'),
              // The clinet secret fromn the env file.
              'client_secret'     => env('WHOOP_CLIENT_SECRET'),
               // the redicret URL from the env file.
               'redirect_uri'      => env('WHOOP_REDIRECT_URL'),
                // Provides the authorisation code as a query parameter back to the call back request.
                'code'              => $request->code,

        ]);

            // If statement to check that HTTP request was sucessful, with the succesful method from the HTTP client.
            if ($response->successful()) {
                // Extract the access token, using json() method from HTTP clinet
            $accessToken = $response->json()['access_token'];
            // Same again, just for the refresh token as have life times.
            $refreshToken = $response->json()['refresh_token'];

            
            // Store the token in the data base
            $user = auth()->user(); 
            // Relation between the user and usermetrics model.
            // Calls the associated data for user metrics.
            // updateOrCreate method to update or create 
            $user -> userMetrics() -> updateOrCreate(
                
                // Finds column where user ID matches the auth'd users ID.
                ['user_id' => $user->id],
                // which data in user metrics to update, with the extracted data.
                [
                    'whoop_access_token' => $accessToken,
                    'whoop_refresh_token' => $refreshToken
                ]
            );
            // Redirect the user to the /metrics-overview page. 
            return redirect ('/metrics-overview');
        }
        
        // Alternative redirect, with the error message so we know if its failed.
        return redirect ('/dashboard') -> withErrors('Failed to authenticate with WHOOP.');
    }

}
