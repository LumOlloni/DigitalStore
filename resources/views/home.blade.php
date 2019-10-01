@extends('layouts.app')

@section('content')



<section id="produktet" class="">
    <div class="container mr-5 ">
      <div class="row">
        <div class="d-flex  justify-content-center flex-sm-row flex-column text-center w-75 ">
          @foreach ($category as $c)
            <div class="p-3 border-right">
              <a href="/home/search/{{$c->name}}" id="categoryLinks" class="aStyle  ">{{$c->name}}</a>
              {{-- @csrf   --}}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <div class="jumbotroni">
    <div class="container for-about"></div>
  </div>

  <!-- Card Section -->
  <div class="container mt-4" id="cards">
    <div class="row no-gutters">
      @if (count($product) > 0)
        @foreach ($product as $p)
      <div class="col-lg-3 col-md-6">
        <div class="card ">
          <div class="card-body">
            <img src="/storage/img/PoduktetImage/{{$p->image}}" alt="" class="img-fluid imageCard    mb-3" />
            <h5  class="text-muted">
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
      @else 
        <h2 style="padding-bottom:60px;" class="text-danger mx-auto mt-2">Produkti qe kerkuat nuk egziston.Ju lutem provoni te kerkoni diqka tjeter</h2>
      @endif
    </div>
  </div>
  <br><br>
  @if (isset($productSearch))

    <div class="container mt-4">
      <div class="row no-gutters">
          @foreach ($productSearch as $p)
          <div class="col-lg-3 col-md-6">
            <div class="card ">
              <div class="card-body">
                <img id="image" src="/storage/img/PoduktetImage/{{$p->image}}" alt="" class="img-fluid imageCard    mb-3" />
                <h5 id="name" class="text-muted">
                  {{$p->name}}
                </h5>
                <strong  id="qmimi" class="p-1">Qmimi: {{$p->price}}</strong>
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
      </div>
    </div>
      
  @endif
  
@endsection

