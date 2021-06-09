<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuzzleController extends Controller
{
    public function postRequest()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);

        $response = $client->request('POST', 'http://localhost:8000/post', [
            'form_params' => [
                'title' => 'Post 1',
            ]
        ]);
        $shimpent_data = $response->getBody()->getContents();
        $shimpent_data = json_decode($shimpent_data);
        $shipment = $shimpent_data;
        //BtrHelpers::getShipment($shipment);
        
        //$shipment =  BtrHelpers::ShipmentPDF($shimpent_data);
        
        dd($shimpent_data);
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
