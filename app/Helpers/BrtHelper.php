<?php
    use Dompdf\Dompdf ;
    use GuzzleHttp\Client;
    use App\Models\Spedizione;
    use App\Models\User;
    use Barryvdh\DomPDF\PDF;
    use Illuminate\Support\Facades\Storage;
    //use Illuminate\Support\Facades\Storage;
    //use Barryvdh\DomPDF\Facade as PDF;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    namespace App\Helpers;
    use DB;
    use App;
    use \GuzzleHttp\Middleware;
    use LynX39\LaraPdfMerger\Facades\PdfMerger;
    use Barryvdh\DomPDF\Facade as PDF;
    use Storage;
    use App\Helpers\BtrHelper AS BtrHelpers;


class BtrHelper
{
    
     public static function addShipment()
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
                        "numericSenderReference" =>  47,
                        "alphanumericSenderReference" =>  "aaa2",
                        "numberOfParcels" => 1,
                        "weightKG" =>  81.0,
                        "volumeM3" =>  0.451,
                        "consigneeZIPCode" =>  "55047 ",
                        "consigneeCity" =>  "QUERCETA",
                        "consigneeProvinceAbbreviation" =>  "LU"          
    
                ],
                    
                        "isLabelRequired" =>  1,

                  "labelParameters" =>  [

                        "outputType" =>  "PDF",
                        "offsetX" =>  0,
                        "offsetY" =>  0,
                        "isBorderRequired" =>  "N",
                        "isLogoRequired" =>  "N",
                        "isBarcodeControlRowRequired" =>  "N"
                ]
            ]
          
        ]);
   
            $shimpent_data = $response->getBody()->getContents();
            $shimpent_data = json_decode($shimpent_data);
            $shipment = $shimpent_data;
            //BtrHelpers::getShipment($shipment);
            
            $shipment =  BtrHelpers::ShipmentPDF($shimpent_data);
            
            dd($shimpent_data);

 }

   public static function ShipmentPDF($shipment)
    {
            //$shipment = BrtHelper::addShipping($shipment);
            $pdfMerger = PDFMerger::init();
            $single_files = [];
            //dd($shipment);
            foreach($shipment->createResponse->labels as $key => $label){
            foreach($label as $labelstream){
            $label = base64_decode($labelstream->stream);
    }
            $temp = public_path("app/tmp/".$key.time().".pdf");
            file_put_contents($temp,$label);
            $single_files[] = $temp;
            $pdfMerger->addPDF($temp, 'all'); 
            //merge single files
            $pdfMerger->merge(); 
            //remove single files
            foreach($single_files as $file) unlink($file);        
            return $pdfMerger->save('Etichetta_ordine_.pdf','download');
 
    
    }


    }


    
    public static function getShipment($parcelID)
    {
            
        $client = new \GuzzleHttp\Client(['verify' => false]);
        
        $url = 'https://api.brt.it/rest/v1/tracking/parcelID/'.$parcelID;
        
        $response = $client->request('GET', $url, [
            'headers' => [
                'userID' => '1020118',
                'password' => 'brt1404txt'
            ]                                  
        ]);

        $shimpent_data = $response->getBody()->getContents();
            //dd ($shiment_data);

        dd(json_decode($shimpent_data));
    }


    
    public static function DeleteShipment($numeric, $alphanumeric)
    {
        
         $client = new \GuzzleHttp\Client(['verify' => false]);

            //dd ($shiment_data);
            $response = $client->request('PUT', 'https://api.brt.it/rest/v1/shipments/delete', [
                \GuzzleHttp\RequestOptions::JSON => [
                    'account' => [
                            'userID' => '1020118',
                            'password' => 'brt1404txt'
                    ],
                    'deleteData' => [
                        "senderCustomerCode" => 1020118,
                        "numericSenderReference" => $numeric,
                        "alphanumericSenderReference" => $alphanumeric
                    ]
                ]                                        
            ]);

            $shimpent_data = $response->getBody()->getContents();

            dd(json_decode($shimpent_data));




    }


}