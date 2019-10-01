
<div class="modal fade" role="dialog" id="loginModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Login Form</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
            <div class="container">
              @if (session('message'))
                  <div class="alert alert-danger">{{ session('message') }}</div>
              @endif
            </div>
            <form action="{{ route('login') }}" method="POST">
              @csrf  
                
          
            <div class="modal-body">

              <div class="form-group">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                @enderror
              </div>
            </div>
            <div class="modal-footer">

                <div class="row mx-auto">
                <button id="butoni" style="background-color: #f4623a;
                color: #fff;" type="submit" class="btn  mr-2   bg-color  rounded-0 py-2">
                    {{ __('Login') }}
            </button>
           
             @if (Route::has('password.request'))
                <a  style="background-color: #f4623a;
                color: #fff;" class="btn    bg-color  rounded-0 " href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
             @endif
            </div>
            
            </div> 
            <div class="col-sm-12 mx-auto p-1">
              <a href="{{url('/login/google')}}" class="btn btn-block btn-danger">
                <span id="social" style="color: white;" class="fab fa-google"></span> Sign in with Google
              </a>
            </div>
            </form>
          </div>
        </div>
      </div>
      
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



  <script type="text/javascript">
     @if (Request::is('contact') || Request::is('about') || Request::is('/'))
      @if (count($errors) > 0)
        $(window).load(function() {
          $('#loginModal').modal('show');
        });
      @endif
    @endif 



  @if (session('openModal'))
    $(window).load(function() {
        $('#loginModal').modal('show');
    });
  @endif

  @if (session('errorLogin'))
    $(window).load(function() {
        $('#loginModal').modal('show');
    });
  @endif

  
</script>

  
@endsection