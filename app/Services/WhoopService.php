<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\UserMetric;

// The functionaity for interacting with Whoop
class WhoopService
{
    // Function used for refresh token
    public function refreshToken(UserMetric $userMetric)
    {
            // Using laravels HTTP client, we can make a request to the whoop token end point
            // the asForm() method from this client can specify that the request body should be sent as form data.
            $response = Http :: asForm() -> post ('https://api.prod.whoop.com/oauth/oauth2/token', [

            // Specify that we are requesting a refresh_token 
            'grant_type'        => 'refresh_token',
             // refresh token collected from the userMetric data object.
             'refresh_token'     => $userMetric->whoop_refresh_token,
              // Clinet id from the env file.
              'client_id'         => env('WHOOP_CLIENT_ID'),
                // Client secret from the env file.
               'client_secret'     => env('WHOOP_CLIENT_SECRET'),
        ]); 

        // Check response successful using successful() from http client.
        if ($response -> successful()) {

            // Update the user metric data object
            $userMetric->update([
                // store new access token
                'whoop_access_token' => $response -> json() ['access_token'],
                // store a new referesh token, but if not to keep the same.
                'whoop_refresh_token' => $response -> json() ['refresh_token']  ??  $userMetric->whoop_refresh_token,

            ]);

            // Return the new access token from the json response (using json() method from http client)
            return $response -> json()['access_token'];

        throw new \Exception ('Failed to refresh WHOOP token.') ;

        }
    }
    // Fetch data with param $userMetric data object & $endPoint where dat will be collected
    public function fetchData(UserMetric $userMetric, $endpoint)
    {
             // Presuming the token is up to date to start with.
             $response = Http :: withHeaders([
            // Bearer authentication scheme as per oAuth.
            // Adding the users access token to the header.
            'Authorization' => "Bearer {$userMetric->whoop_access_token}"
            // the get HTTP method with URL, with the $endpoint parameter for dynamic retreival.
             ]) -> get("https://api.prod.whoop.com/$endpoint"); 
             // $response will be declared with the response from WHOOP

            // Handle the 401 reponse status (unauthorised)
            if ($response -> status() === 401) {

                // If we have 401, it might have expired, so attempt to refresh metho and data object as parameter.
                $accessToken = $this -> refreshToken($userMetric);

                // Retry same as above just with the new access token
                $response = Http::withHeaders([
                 'Authorization' => "Bearer $accessToken" 
                ]) -> get ("https://api.prod.whoop.com/$endpoint");
            }
    }
            
}