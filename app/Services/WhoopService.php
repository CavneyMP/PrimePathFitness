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
        }      
          throw new \Exception ('Failed to refresh WHOOP token.') ;

    }

    // Fetch data with param $userMetric data object & $endPoint where dat will be collected
        public function fetchData(UserMetric $userMetric, $endpoint, $params = [])
{
            $url  = "https://api.prod.whoop.com/$endpoint";
            
            // Include the parameters for query if provided
            if (!empty($params)) {
                    $url .= '?' . http_build_query($params);
            }

            // First attempt with access token
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$userMetric->whoop_access_token}"
                ])->get($url);

            // Handle token expiration if this is the issue
            if ($response->status() === 401) {
                $accessToken = $this->refreshToken($userMetric);
                $response = Http::withHeaders([
              'Authorization' => "Bearer $accessToken"
                ])->get($url);
            }

            // If the response is succesful,
            if ($response -> successful()) {
                // then we need to return the extracted json using json() method to $response data object.
                return $response -> json();
            }
            throw new \Exception ('We failed to fetch data from WHOOP :(' . $response->body());
            
    }

    public function fetchAllSleepData(UserMetric $userMetric)
    {
        $allSleepData = []; // Array for all sleep data
        $nextToken = null; // Declaration of null next token

        do {
            $params = ['limit' => 24]; // Whoop state 25 limit, so we'll go with 24
            if ($nextToken) {
                $params['nextToken'] = $nextToken;
            }

            $response = $this -> fetchData($userMetric, 'v1/activity/sleep', $params); 
            $allSleepData = array_merge($allSleepData, $response['records']); 

            $nextToken = $response['next_token'] ?? null;
        }  while ($nextToken);

        return $allSleepData;
}
    
    public function storeSleepData (array $sleepData)
    { 
        foreach ($sleepData as $data) {
            SleepData :: create([
                'user_id'                => $data['user_id'],
                 'start'                  => $data['start'],
                  'end'                  => $data['end'], 
                   'timezone_offset'     => $data['timezone_offset'],
                    'nap'                => $data['nap'],
                     'score_state'       => $data['score_state'],
                      'score'            => json_encode($data['score']),
             ]);
        }
    }
}