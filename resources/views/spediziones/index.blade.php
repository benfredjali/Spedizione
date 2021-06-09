@extends('spediziones.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="margin-left: 100px ;margin-top:30px;">
                <h2>add new BRT shipment with web service </h2>
            </div>
            <div class="pull-right" style="margin-left: 900px ;margin-top:50px; margin-bottom: 10px">
                <a class="btn btn-success" href="{{ url('/store') }}"> Create New Shipment</a>
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
                <form action="{{ route('spediziones.destroy',$spedizione->id) }}" method="POST"  enctype="multipart/form-data">
   
                    @csrf
                    <a class="btn btn-primary" href="{{url($spedizione->etichetta)}}" download="{{$spedizione->etichetta}}">downlod</a>
                   

                    <a class="btn btn-primary"  href="{{url('getShipment/'.$spedizione->parcelID)}}">Trackng</a>
                   <!-- <a  class="btn btn-primary" id={{$spedizione->parcelID}}  onclick="myFunction(this.id)">Trackng</a>-->

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" href="{{url('delete/'.$spedizione->numericSenderReference.'/'.$spedizione->alphanumericSenderReference)}}" >Delete</button>

                </form>
            </td>
        </tr>
        @endforeach

       
    </table>
  
    
      
@endsection