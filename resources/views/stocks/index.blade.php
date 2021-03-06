@extends('spediziones.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" style="margin-left: 100px ;margin-top:30px;">
            <h2>Yukatel Stock with web service </h2>
        </div>
        <div class="pull-right" style="margin-left: 900px ;margin-top:50px; margin-bottom: 10px">
            <a class="btn btn-success" href="{{ url('/store') }}"> Create New Stock</a>
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
            <th>#</th>

            <th>ArticleNo</th>
            <th>Description</th>
            <th>Stock</th>
            <th>SellingPrice</th>         
            <th >Ean</th>
            <th >Category</th>
        </tr>
        
        @foreach ($stocks->Articles as $key => $values) 

        <tr>
            <td>{{ $key}}</td>

            <td>{{ $values->articelno}}</td>
            <td>{{ $values->description }}</td>
            <td>{{ $values->quantity }}</td>
            <td>{{ $values->sellingprice }}</td>
            <td>{{ isset($values->ean) ? $values->ean : '' }}</td>
            <td>{{ isset($values->category) ? $values->category : '' }}</td>


        </tr>
        @endforeach
    </table>
  
    
      
@endsection