<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhoopAuthController extends Controller
{

    public function redirectToWhoop() { 
        
    // https://www.php.net/manual/en/function.http-build-query.php
        $query = http_build_query([
            'client_id'      => env('WHOOP_CLIENT_ID'),
             'redirect_uri'   => env('WHOOP_REDIRECT_URL'),
              'response_type'  => 'code', 
              //Requested data, going to fetch all.
               'scope' => 'read:recovery read:cycles read:sleep read:workout read:profile read:body_measurement'

        ]);

        return redirect ('https://api.prod.whoop.com/oauth/oauth2/auth?' . $query);

    }

}
