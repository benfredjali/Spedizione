<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Spedizione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\BtrHelper;
use Illuminate\Http\Client\Response;
//use App\Models\Spedizione;

class SpedizioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$spedizione = DB::table('spediziones')->get();
        //->orderBy('nome', 'desc')
        //->orderBy('created_at', 'desc')
        //->groupBy('count')
        //->having('count', '>', 100)
        //->get();

        $spediziones = Spedizione::all();

        return view('spediziones.index',compact('spediziones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spedizione = array();
        $data = BtrHelper::addShipment();
        $Filename= BtrHelper::getFilename();

        //dd($data);
        foreach($data->createResponse->labels as $key => $label){
            //$numericSenderReference = $data->createResponse->numericSenderReference;

            $alphanumericSenderReference = $data->createResponse->alphanumericSenderReference ;
       
            foreach($label as $labelstream){
            $label = $labelstream->parcelID ;
           
            $spedizione['parcelID']= $label;
        }
        //$data->numericSenderReference = $request->get('numericSenderReference');
        //$data->alphanumericSenderReference = $request->get('alphanumericSenderReference');
        $numericSenderReference =  BtrHelper::datasender();
        $spedizione['numericSenderReference'] = $numericSenderReference;
        $spedizione['alphanumericSenderReference'] = $alphanumericSenderReference;
        $spedizione['etichetta'] =  $Filename ;

        //$data->numericSenderReference = $numericSenderReference;
        //dd($data);
        //$data->etichetta = "dfs"  ;
    }
       //$spedizione = DB::table('spediziones')->insert($spedizione);
       $articolo = DB::table('spediziones')->insert($spedizione);
       //Spedizione::create($spedizione->all());
       //dd($data);
         
        return redirect()->route('spediziones.index')
                        ->with('success','Shipment created successfully.');

    
    }

    
    public function get(Request $request)
    {
        $data = Spedizione::all();
        return redirect()->route('spediziones.index')
                        ->with('success','Shipment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spedizione  $spedizione
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       /* $spedizione = array();
        $data = BtrHelper::getShipment();
        dd($data);*/
       
echo "ali";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spedizione  $spedizione
     * @return \Illuminate\Http\Response
     */
    public function edit(Spedizione $spedizione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spedizione  $spedizione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spedizione $spedizione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spedizione  $spedizione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spedizione $spedizione)
    {
        $spedizione->delete();
    
        return redirect()->route('spediziones.index')
                        ->with('success','Product deleted successfully');
    }
    public function lastnum(Spedizione $spedizione)
    {
      //Spedizione::all()->last->id();

        return view('spediziones.index',compact('data'));
    }

   
    
  
}
