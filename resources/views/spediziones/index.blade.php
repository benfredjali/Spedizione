@extends('spediziones.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>add new BRT shipment with web service </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/addShipment') }}"> Create New Shipment</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Parcel ID</th>
            <th>Sender Reference</th>
            <th>Alpha Sender Reference</th>
            <th>Etichetta</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($spediziones as $spedizione)
        <tr>
            <td>{{ $spedizione->id}}</td>
            <td>{{ $spedizione->parcelID }}</td>
            <td>{{ $spedizione->numericSenderReference }}</td>
            <td>{{ $spedizione->alphanumericSenderReference }}</td>
            <td>{{ $spedizione->etichetta }}</td>
            <td>
                <form action="{{ route('spediziones.destroy') }}" method="POST"  enctype="multipart/form-data">
   
                    @csrf
                    <button type="submit" class="btn btn-primary">New</button>

                </form>
                <form>
                    <a class="btn btn-primary" href="{{ route('spediziones.edit',$spedizione->id) }}">Trackng</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection