@extends('layouts.admin')

@section('content-admin')
 
    <h3 class="text-center mt-4">Orders of  {{$users->name}}</h3>

  
  <div class="container">
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <div class="row p-2">
      @if (count($query) > 0)
          
     
    @foreach ($query as $item)
      <?php  $data = json_decode($item->order);?>
    @foreach ($data as $value)

      <div class="card">
        <div class="card-body">
        <img style="width: 150px; height: 200px;" class="img-fluid" src="/storage/img/PoduktetImage/{{$value->image}}" alt="" >
              <br>
              <p>Name: {{$value->name }}</p>
              <p>Quantity: {{$value->quantity}}</p> 
              <p>Price: {{$value->price}}</p>
              <p>Order time: {{ $item->created_at}}</p> 
          </div>
        </div>
      
        @endforeach
        @endforeach
        @else 
          <h2 class="text-danger">Konsumatori {{$users->name}} nuk ka blere asgje</h2>
        @endif
    </div>
  </div>
@endsection