<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function verified(Request $request)
    {
        $data = $request->all();
        $client = new GuzzleClient();

        $r = $client->request('GET', 
        'https://fffd-180-242-56-69.ngrok-free.app/api/role', 
        [
            'json' => [
                'email' => $data['email'],
                'password' => $data['password']
            ],
            'headers' => [
                'Accept'     => 'application/json',
                'Content-Type'     => 'application/json',
            ],
            'debug' => TRUE
        ]);

        $response = $r->getBody()->getContents();

        //set session or cookie client
        dd($response);
    }
}