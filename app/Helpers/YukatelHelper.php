<?php
namespace App\Helpers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class YukatelHelper{

    //recuperare la lita di stock
    public static function getStockList()
    {
            
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        $url = 'https://api.yukatel.de/api/stock-list';
        
        $response = $client->request('GET', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168
            
            ]                                 
        ]);

        $response = $response->getBody()->getContents();
            //dd ($shiment_data);
        $response = (json_decode($response));
        dd($response);
      
    }
    public static function getOrders()
    {
            
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        $url = 'https://api.yukatel.de/api/orders';
        
        $response = $client->request('GET', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168
            
            ]                                 
        ]);

        $response = $response->getBody()->getContents();
            //dd ($shiment_data);
        $response = (json_decode($response));
        dd($response);
      
    }
    public static function getAdress()
    {
            
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        $url = 'https://api.yukatel.de/api/customer/address';
        
        $response = $client->request('GET', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168
            
            ]                                 
        ]);

        $response = $response->getBody()->getContents();
            //dd ($shiment_data);
        $response = (json_decode($response));
        dd($response);
      
    }
    public static function getOdersById($id)
    {
           
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $url = 'https://api.yukatel.de/api/orders/'.$id;
        $response = $client->request('GET', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168    
            ]                                 
        ]);
        $response = $response->getBody()->getContents();
         //dd ($shiment_data);
        $response = (json_decode($response));
          dd($response);
    }
    public static function stockCheck($artc,$qnty)
    {
           
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $url = 'https://api.yukatel.de/api/stock/check';
        $response = $client->request('GET', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168,
                'artnr' => $artc,
                'quantity' => $qnty  
            ]                                 
        ]);
        $response = $response->getBody()->getContents();
         //dd ($shiment_data);
        $response = (json_decode($response));
          dd($response);
    }
    //creare nuovo ordine
    public static function addStockList()
    {
            
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        $url = 'https://api.yukatel.de/api/order/create';
        
        $response = $client->request('POST', $url, [
            \GuzzleHttp\RequestOptions::JSON => [
                'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                'vpnr' => 21168,
           
            'items' => [
                  
                'article_number' => 'appi11_128blde',
                'requested_stock' => 7
                
                ],
                'customer_address_id' => 0                  
            ]                                               
        ]);

        $response = $response->getBody()->getContents();
      // dd ($response);
        $response = (json_decode($response));
        dd($response);
      
    }

     //elimnare un ordine
    public static function deleteStockList($id)
    {
        
         $client = new \GuzzleHttp\Client(['verify' => false]);
         $url = 'https://api.yukatel.de/api/order/delete/'.$id;
            //dd ($shiment_data);
            $response = $client->request('DELETE', $url, [
                \GuzzleHttp\RequestOptions::JSON => [
                    'authcode' => '21168-f18ad75d-5416-11eb-9f84-0050568c8f1a',
                    'vpnr' => 21168                

                ]                                
            ]);

            $response = $response->getBody()->getContents();
           //return alert("Shipmet deleted succefuly");
            dd(json_decode($response));

    }

   

}