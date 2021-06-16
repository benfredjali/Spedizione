<?php

namespace App\Http\Controllers;

use App\Helpers\YukatelHelper;
use App\Models\Stock;
use Illuminate\Http\Request;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = YukatelHelper::getStockList();
        $reader = ReaderEntityFactory::createXLSXReader();
        $percorsoFile='C:\laragon\www\smart_yuka.xlsx';
        //apro il file excel 
        $reader->open($percorsoFile);
        //loop sui fogli all'interno del file
        foreach ($reader->getSheetIterator() as $sheet){
            //loop sulle righe di ogni foglio
            foreach ($sheet->getRowIterator() as $count => $row) {
               //recupero tutte le celle della riga
                $cells = $row->getCells();
                //start comparison from 2 row of excel
                if($count > 1){
                    $ean = $cells[0]->getValue();
                    $identifier = [
                        trim(strtolower($cells[3]->getValue())),
                        isset($cells[4]) ? trim(strtolower($cells[4]->getValue())) : null,
                        isset($cells[5]) ? trim(strtolower($cells[5]->getValue())) : null,
                    ];
                    //if cell has ean code 
                    if(strlen(trim($ean)) > 0){
                        foreach ($stocks->Articles as $key => $value) {
                            if(in_array(strtolower($value->articelno), $identifier)){
                                $value->ean = $ean;
                                $value->category = $cells[1]->getValue();
                            }                     
                        }
                    }              
                }
            }
            $reader->close();
        }
        return view('stocks.index',compact('stocks'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }


}