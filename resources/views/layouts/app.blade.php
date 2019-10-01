<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>DigitalStore</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>



  @include('viewComponents.navbar')

  @include('auth.login')

  @if (Request::is('/'))
      @include('viewComponents.carousel')
  @endif

  @if (Request::is('contact') || Request::is('about') )
     @include('viewComponents.jumbotron')
  @endif 
  <div id='app'></div>
 

  @yield('content')

  
     @include('viewComponents.footer')
  
 
  @yield('scripts')

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://kit.fontawesome.com/4b690522e4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

@if (Route::is('about'))
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDQREY38YyuNpiY2ObdDAQwT0a7sd-RdXc&callback=createMap"
      type="text/javascript"></script>
@endif

  <script src="{{asset('js/main.js')}}"></script>


</body>
</html>