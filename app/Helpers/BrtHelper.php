<?php
    use GuzzleHttp\Client;
    use App\Models\Spedizione;
    use App\Models\User;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    namespace App\Helpers;
    use DB;
    use App;
    use \GuzzleHttp\Middleware;
    use Illuminate\Support\Facades\Storage;
    use LynX39\LaraPdfMerger\Facades\PdfMerger;



class BtrHelper
{
    static public  function addShipment($shipping_details=null)
    {
        // Create a client with curl request
        $client = new \GuzzleHttp\Client(['verify' => false]);
          //BrtHelper = new BtrHelper();

        // Create a POST request with i dati
        $response = $client->request('POST', 'https://api.brt.it/rest/v1/shipments/shipment', [
            \GuzzleHttp\RequestOptions::JSON => [
                'account' => [
                        'userID' => '1020118',
                        'password' => 'brt1404txt'
                ],
                'createData' => [

                        "network" => " ",
                        "departureDepot" => 102,
                        "senderCustomerCode" => 1020118,
                        "deliveryFreightTypeCode" =>  "DAP",
                        "consigneeCompanyName" =>  "TEST UFFICIO VAS",
                        "consigneeAddress" =>  "VIA DEL PODERE FIUME 55",
                        "consigneeCountryAbbreviationISOAlpha2" =>  "IT",
                        "consigneeClosingShift1_DayOfTheWeek" =>  "MON",
                        "consigneeClosingShift1_PeriodOfTheDay" =>  "PM",
                        "consigneeClosingShift2_DayOfTheWeek" =>  "",
                        "consigneeClosingShift2_PeriodOfTheDay" =>  "",
                        "consigneeContactName" =>  "RAIMONDI SCANU",
                        "consigneeTelephone" =>  "66144217",
                        "consigneeEMail" =>  "",
                        "consigneeMobilePhoneNumber" =>  "",
                        "isAlertRequired" =>  0,
                        "consigneeVATNumber" =>  "",
                        "consigneeVATNumberCountryISOAlpha2" =>  "",
                        "consigneeItalianFiscalCode" =>  "",
                        "pricingConditionCode" =>  "000",
                        "serviceType" =>  "",
                        "insuranceAmount" =>  0,
                        "insuranceAmountCurrency" =>  "EUR",
                        "senderParcelType" =>  "",
                        "quantityToBeInvoiced" =>  0.0,
                        "cashOnDelivery" =>  0,
                        "isCODMandatory" =>  "0",
                        "codPaymentType" =>  "  ",
                        "codCurrency" =>  "EUR",
                        "notes" =>  "",
                        "parcelsHandlingCode" =>  "2",
                        "deliveryDateRequired" =>  "",
                        "deliveryType" =>  "",
                        "declaredParcelValue" =>  0,
                        "declaredParcelValueCurrency" =>  "EUR",
                        "particularitiesDeliveryManagementCode" =>  "",
                        "particularitiesHoldOnStockManagementCode" =>  "",
                        "variousParticularitiesManagementCode" =>  "B",
                        "particularDelivery1" =>  "",
                        "particularDelivery2" =>  "",
                        "palletType1" =>  "EUR",
                        "palletType1Number" =>  10,
                        "palletType2" =>  "",
                        "palletType2Number" =>  0,
                        "originalSenderCompanyName" =>  "",
                        "originalSenderZIPCode" =>  "",
                        "originalSenderCountryAbbreviationISOAlpha2" =>  "   ",
                        "cmrCode" =>  "",
                        "neighborNameMandatoryAuthorization" =>  "",
                        "pinCodeMandatoryAuthorization" =>  "",
                        "packingListPDFName" =>  "",
                        "packingListPDFFlagPrint" =>  "",
                        "packingListPDFFlagEmail" =>  "",
                        "numericSenderReference" =>  2,
                        "alphanumericSenderReference" =>  "aaa1",
                        "numberOfParcels" => 1,
                        "weightKG" =>  81.0,
                        "volumeM3" =>  0.451,
                        "consigneeZIPCode" =>  "55047 ",
                        "consigneeCity" =>  "QUERCETA",
                        "consigneeProvinceAbbreviation" =>  "LU"          
    
                ],
                    
                        "isLabelRequired" =>  1,

                  "labelParameters" =>  [

                        "outputType" =>  "ZPL",
                        "offsetX" =>  0,
                        "offsetY" =>  0,
                        "isBorderRequired" =>  "N",
                        "isLogoRequired" =>  "N",
                        "isBarcodeControlRowRequired" =>  "N"
                ]
            ]
          
        ]);
   
            $data = $response->getBody()->getContents();
            $data = json_decode($data);
            $shipping_details = $data;
            //echo"<pre>";print_r($shipping_details);echo"</pre>";
            dd($data);

 }

   public  function getShipment()
    {


//    $client = new \GuzzleHttp\Client([
//     // Base URI is used with relative requests
//     //'base_uri' => 'https://reqres.in',
//     ]);
  
//     $response = $client->request('GET', '/api/users', [
//     'query' => [
//     'page' => '2',
//     ]
//     ]);
 
// //get status code using $response->getStatusCode();
 
//     $body = $response->getBody();
//     $arr_body = json_decode($body);
//     print_r($arr_body);
//     }
        

       $client = new \GuzzleHttp\Client(['verify' => false]);
        $request = $client->get('http://httpbin.org');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
}


   public static function ShipmentPDF()
    {

      /*  //merger for returned pdf files
            $pdfMerger = PDFMerger::init();

            $single_files = [];

            $shipment = BtrHelper::addShipment();
            //cast response to object
            $response = $shipment;

            $response = base64_decode($response->scalar);
            
            if (!file_exists(storage_path("app/tmp/"))) {
                mkdir(storage_path("app/tmp/"), 0775, true);
            }

            $temp = storage_path("app/tmp/".$i.time().".pdf");

            //save labels list to allow deletion after merging
            $single_files[] = $temp;
            file_put_contents($temp,$response);

            $pdfMerger->addPDF($temp, 'all');
        

        //merge single files
        // $pdfMerger->merge();   
        
        //remove single files
        foreach($single_files as $file) unlink($file);
        
        $pdfMerger->save('Etichetta_ordine_.pdf','download');*/

        $pdfMerger = PDFMerger::init();

        $single_files = [];

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML('<h1>Test</h1>');
       Storage::put('public/pdf/invoice.pdf', $pdf->output());
        return $pdf->stream();

       //return $pdf->download('invoice.pdf');

    }

}