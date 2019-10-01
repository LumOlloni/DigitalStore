@extends('layouts.app')

@section('content')

 
    <div style="margin-bottom:400px;" class="container">
      @if ($message = Session::get('successPayment'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
      @endif
      <div class="mt-5 py-3">
        <h2 style="color:#F4623A" class="text-center ">Falemiderit per Blerjen</h2>

          <div class="text-center mt-3 px-2">
            <p class="lead">Kompania DigitalStore ju falenderon per besimin tuaj per blerjen e produkteve tona! </p>
            <a href="/home" class="btn btn-outline-danger">Kthehuni mbrapa </a>
        
          </div>
        
        
      </div>
    </div>
  
@endsection
@section('scripts')

<script>
   const pdf = "{{ route('pdfDowload') }}";
   window.location.href = pdf;
  
  </script>
@endsection
