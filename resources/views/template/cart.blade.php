@extends('layouts.app')

@section('content')
<div class="px-4 px-lg-0">
    <!-- For demo purpose -->
    <div class="container  py-5 text-center">
      <h1 class="display-4">Shporta Ime</h1>
    </div>
    <!-- End -->
     
   

    <div class="container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    </div>
    <div class="container">
      @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
      @endif
    </div>
    <div class="pb-5" style="margin-bottom:200px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            @if ($cartEmpty)
              <h2 class="text-center text-danger lead">Shporta juaj eshte e zbrazet</h2>
            @else
            <!-- Shopping cart table -->
            <div class="table-responsive">
             
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Produkti</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Qmimi</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Sasia</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Fshije</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cart  as $item)
                  
                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="/storage/img/PoduktetImage/{{$item->attributes->image}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="/home/showProduct/{{$item->id}}" class="text-dark d-inline-block align-middle">{{$item->name}}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: {{$item->attributes->categoryProduct}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{($item->quantity) * $item->price}} €</strong></td>
                    <td class="border-0 align-middle">
                   
                        <input data-id="{{$item->id}}" id="quantityNumber"   value="{{$item->quantity}}" style="width: 85px;" class="form-control quantityValue" type="number" name="quantity" />
                
                 

                    </td>
                    <td class="border-0 align-middle">
                      {{-- Form DELETE --}}
                    <form id="deleteItemDAta" action="{{route('cart.destroy' , $item->id)}}" method="POST">
                        @csrf 
                      <input type="hidden" name="_method" value="delete">
                      {{ method_field('DELETE')}}
                      </form>
                    {{-- End OF Form --}}

                      <a style="cursor: pointer;"  class="text-dark deleteLink"><i  style="color:#f4623a;"class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
          </div>
        </div>
        <div class="row py-5 p-4 bg-white rounded shadow-sm">
           
            <div class="mx-auto">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Pagesa Juaj </div>
              <div class="p-4">              
                <p class="font-italic mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit adipisicing elit.</p>
                <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Pagesa pa TVSH </strong><strong>{{Cart::getSubTotal()}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">TVSH</strong><strong>18 %</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                    <h5 class="font-weight-bold">{{ Cart::getTotal()}}</h5>
                  </li>
                
                </ul><a href="{{route('paymentPage')}}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js')}}"></script>
    <script>
      if (document.querySelectorAll('.deleteLink')) {
        const deleteButton = document.querySelectorAll('.deleteLink');
        deleteButton.forEach(element => {
          element.addEventListener('click' , function (e) {
          e.preventDefault();
          document.getElementById('deleteItemDAta').submit();

         })
         }
        )
        }
       

      const quantityNumber = document.querySelectorAll('.quantityValue');
      
        Array.from(quantityNumber).forEach(element => {
          element.addEventListener('click' , function () {
        const id = element.getAttribute('data-id');
       
         axios.post(`/home/cart/${id}` , {
           quantity: this.value
         })
         .then(function (data) {
           console.log(data);

            window.location.href = "{{ route('shoppingCart')}}"
         })
         .catch(function (err) {
           console.log(err);
           window.location.href = "{{ route('shoppingCart')}}"
         })
 
      });
        });
        
      


    </script>
@endsection