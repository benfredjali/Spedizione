<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Spedizione;
use Illuminate\Http\Request;
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
        $data = array();
        $data['senderCustomerCode'] = $request->senderCustomerCode;
        $data['numericSenderReference'] = $request->numericSenderReference;

        $data['alphanumericSenderReference'] = $request->alphanumericSenderReference;

        $data['parcelID'] = $request->parcelID;

        $data['etichetta'] = $request->etichetta;


        $spedizione = DB::table('spediziones')->insert($data);
    
         
        return redirect()->route('spediziones.index')
                        ->with('success','Shipment created successfully.');
    }

    
    public function get(Request $request)
    {
        $data = Post::all();
        return redirect()->route('spediziones.index')
                        ->with('success','Shipment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spedizione  $spedizione
     * @return \Illuminate\Http\Response
     */
    public function show(Spedizione $spedizione)
    {
        //
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
        //
    }
}
