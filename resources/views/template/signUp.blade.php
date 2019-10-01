@extends('layouts.app')

@section('content')
    <!-- Sign Up Section -->

  <section>
    <div class="container">
      <div class="col-md-5 col-lg-5 mx-auto">
        <div class="card  border-danger rounded-0 mt-4">
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
              @csrf
          <div class="card-header p-0">
            <div class="bg-color text-white text-center py-2">
              <h3><i class="fa fa-user-plus"></i> Sign Up</h3>

            </div>
          </div>
          <div class="card-body p-3">

            <!--Body-->
            <div class="form-group">
              <label>Your name</label>
              <div class="input-group">

                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Your Username</label>
              <div class="input-group mb-2 mb-sm-0">

                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}"  placeholder="Username">

                @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Your Email</label>
              <div class="input-group mb-2 mb-sm-0">

                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email">

                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group mb-2 mb-sm-0">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <div class="input-group mb-2 mb-sm-0">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
              </div>
            </div>
            <div class="form-group">
                <label>Your Email</label>
                <div class="input-group mb-2 mb-sm-0">
                <input type="file" class="form-control @error('img') is-invalid @enderror"   name="img" >
                  @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            
            <div class="text-center">
              <button style=" background-color: #f4623a ;
              color: #fff " class="btn bg-color btn-block rounded-0 py-2"> {{ __('Register') }}</button>
            </div>

          </div>

        </div>
        <!--Form with header-->
      </form>
      </div>
    </div>
    </div>
  </section>
<br>
  <!-- end of Sign Up Section -->
@endsection

