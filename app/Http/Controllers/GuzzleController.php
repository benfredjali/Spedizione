<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuzzleController extends Controller
{
    public function postRequest()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);

        $response = $client->request('POST', 'http://localhost:8000/store', [
            'form_params' => [
                'title' => 'Post 1',
            ]
        ]);
        $response = $response->getBody()->getContents();
        echo '<pre>';
        print_r($response);
    }

    public function getRequest()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);

        $request = $client->get('http://localhost:8000/get');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);

    }
}
