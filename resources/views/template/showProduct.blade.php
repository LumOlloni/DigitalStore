@extends('layouts.app')

@section('content')


 <div class="container" id="bodyFooter">
   <div class="row">

     <div class="col-md-6">
        <img src="/storage/img/PoduktetImage/{{$product->image}}" class="pt-4 img-fluid showImage" alt="">
       
     </div>

     <div class="col-md-5">
        <h2 class="text-center pt-4">{{$product->name}}</h2>
        <p class="text-muted">{{$product->description}}</p>
        <h4 class="text-muted">Qmimi: <span class="text-center">{{$product->price}} € </span></h4>
        <h4 class="text-muted ">Prodhuesi: <span class="text-center">{{$product->manufacturer}}</span> </h4> 
     
     </div>
     <div class=" btn-group mt-4 mx-auto" role="group" aria-label="Basic example">
       @if ($product->quantity > 0)
       <form action="{{route('cart.store')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$product->id}}">
          <input type="hidden" name="name" value="{{$product->name}}">
          <input type="hidden" name="imageProduct" value="{{$product->image}}">
          <input type="hidden" name="price" value="{{$product->price}}">
          <input type="hidden" name="categoryName" value="{{$product->category->name}}">
          <button type="submit" class="btn btn-success"><i style="color:aliceblue" style="font-size: 20px;" class="fas fa-shopping-cart"></i> Shto ne Shport</button>
       </form>
       @else 
         <div class="text-danger">{{$product->name}} nuk eshte ne dispozicion</div> 
       @endif
      
    </div>

   </div>
   <br>
   <h2 class="text-center mt-5">Shiko produkte të tjera</h2>
   <div class="row no-gutters">
         @if (count($productRandom) > 0)
         @foreach ($productRandom as $p)
       <div class="col-lg-3 col-md-6">
         <div class="card ">
           <div class="card-body">
             <img src="/storage/img/PoduktetImage/{{$p->image}}" alt="" class="img-fluid imageCard    mb-3" />
             <h5 class="text-muted">
               {{$p->name}}
             </h5>
             <strong class="p-1">Qmimi: {{$p->price}}</strong>
             <div class="d-flex justify-content-left">
               <div class="p-1">
                 <a href="/home/showProduct/{{$p->id}}" class="btn btn-light styleButton">Shiko Detajet </a>
               </div>
               <div class="p-1">
                 <a class="btn btn-light styleButton " href="#"><span><i style="font-size: 22px; color: rgb(41, 41, 38);"
                       class="fas fa-shopping-cart"></i></span></a>
               </div>
             </div>
          
           </div>
         </div>
       </div>
       @endforeach
       @endif
   </div>
</div>
@endsection