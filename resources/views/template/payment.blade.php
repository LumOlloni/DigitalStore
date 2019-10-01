@extends('layouts.app')

@section('content')
    <h2 style="color:#F4623A;" class=" text-center mt-4 mb-4">Pagesa Juaj</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="{{route('paymentStore')}}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Emri</label>
              <input type="text" value="{{Auth::user()->name}}" name="name" id="name" class="form-control"  aria-describedby="emailHelp" placeholder="emri">
              @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" value="{{Auth::user()->email}}" name="email" id="email"   class="form-control" placeholder="email">
              @if ($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Adresa</label>
              <input type="text" name="adresa" class="form-control" id="adresa" placeholder="Adresa">
              @if ($errors->has('adresa'))
                <p class="text-danger">{{$errors->first('adresa')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Qyteti</label>
              <input type="text" name="qyteti" class="form-control" id="qyteti" placeholder="qytetin">
              @if ($errors->has('qyteti'))
                <p class="text-danger">{{$errors->first('qyteti')}}</p>
             @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nr Tel</label>
              <input type="text" name="telefoni" class="form-control" id="telefoni" placeholder="telefoni">
              @if ($errors->has('telefoni'))
                 <p class="text-danger">{{$errors->first('telefoni')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element"></div>
              <div id="card-errors" role="alert"></div>
            </div>
            
            <button style="background-color: #f4623a;
            color: #fff;" type="submit" class="btn  btn-block mb-5">Blej Produktet</button>
          </form>
        </div>
        <div class="col-md-6">
          <table class="table text-center">
            <thead>
              <tr>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Produkti</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Qmimi </div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Sasia</div>
                </th>
              </tr>
              <tbody>
                <tbody>
                @foreach ($cartContent as $item)
             
                  <tr class="border-bottom">
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <div class="ml-3 d-inline-block align-middle">
                          <h6 class="mb-0 ">{{$item->name}}</h6>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle border-bottom"><h5 class="text-dark d-inline-block align-middle">{{($item->price) * ($item->quantity) }}</h5></td>
                    <td class="border-0 align-middle"><h5 class="text-dark d-inline-block align-middle">{{$item->quantity}}</h5></td>

                  
                  </tr>
              
                  @endforeach
                  
                </tbody>
              </tbody>
            </thead>
          </table>
      
          <div class="bg-light rounded-pill text-center px-4 py-3 text-uppercase font-weight-bold ">Pagesa per Produktet </div>
          <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Pagesa pa TVSH </strong><strong>{{Cart::getSubTotal()}}</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">TVSH</strong><strong>18 %</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shuma Totale </strong>
                  <h5 class="font-weight-bold">{{ Cart::getTotal()}}</h5>
                </li>
              
              </ul>
        </div>
      </div>
    </div>
    <div class="container">
      @if ($message = Session::get('errorPayment'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
      @endif
    </div>
    
@endsection
@section('scripts')

    <script src="{{asset('js/card.js')}}"></script>
    
@endsection