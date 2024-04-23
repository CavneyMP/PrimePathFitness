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

        throw new \Exception('');
    }
}
