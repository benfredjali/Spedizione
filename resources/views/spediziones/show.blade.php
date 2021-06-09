@extends('spediziones.layout')
  
@section('content')

<div class="cardshow" style="margin-top: 20px;">
    <div class="card">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Datail Shipment:</h2>
            </div>
            
        </div>
 
   
    <div class="row1">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numero Serie:</strong>
                {{ $spediziones->ttParcelIdResponse->currentTimeUTC }}
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>esito:</strong>
                {{ $spediziones->ttParcelIdResponse->esito }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>isposta_timestamp:</strong>
                {{ $spediziones->ttParcelIdResponse->risposta_timestamp }}
            </div>
        </div>
      
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
        <div class="pull-center">
            <a class="btn btn-primary" href="{{ route('spediziones.index') }}"> Back</a>
        </div>
        </div>
    </div>
    </div>
</div>
</div>


@endsection

{{-- @extends('products.layout')
  
@section('content')
    <div class="card">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
 
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
</div>
@endsection --}}