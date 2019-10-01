@extends('layouts.app')

@section('content')

<h5 class=" text-center mt-5 primaryColor">Te dhenat E profilit Tuaj</h5>
  @if (password_verify('123456',Auth::user()->password ))
  <div class="container">
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> Passwordi juaj default eshte nga 123456 sepse ju jeni regjistuar me Google account ju lutem nderroni passwordin tuaj !
    </div>
  </div>
  @endif
  <div class="container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
  </div>
<div class="container emp-profile">
 
<section id="profileBody">
  <div class="row">
    <div class="col-md-4">
      <div class="profile-image">
        <img src="/images/imgUsers/{{Auth::user()->image}}" alt="">
      </div>
    </div>
    <div class="col-md-8">

      <div class="row">

        <div class="col-md-6">
          <label>Emri</label>
        </div>
        <div class="col-md-6">
          <label>{{Auth::user()->name}}</label>
        </div>
        <div class="col-md-6">
          <label>Username</label>
        </div>
        <div class="col-md-6">
            @if(is_null(Auth::user()->username))
              <label>You dont have username</label>
           @else 
           <label>{{Auth::user()->username}}</label>
           @endif
        </div>
        <div class="col-md-6">
          <label>Email</label>
        </div>
        <div class="col-md-6">
          <label>{{Auth::user()->email}}</label>
        </div>
        <div class="col-md-6">
          <label>Member since</label>
        </div>
        <div class="col-md-6">
            <label>{{Auth::user()->created_at}}</label>
        </div>
        <div class="col-md-12 ">
          <hr class="hrColor">
        </div>
        <div class="col-md-6 mt-4 ">
          <button href="#demo" data-toggle="collapse" class="btn bg-color btn-block rounded-0 py-2">Ndysho Passwordin</button>
        </div>

        <!-- NdrySho te Dhenat -->
        <div class="col-md-8 mt-4">
          <div id="demo" class="collapse">
            <form action="{{route('profileUpdate' , Auth::user()->id)}}" method="POST">
              @csrf
              
              <div class="form-group">
                <label for="pwd">Old Password:</label>
              <input type="password" placeholder="Old Password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" id="pwd">
              @error('oldPassword')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
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
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"  autocomplete="new-password">
                    </div>
                  </div>
            

              <button type="submit" class="btn bg-color btn-block rounded-0 py-2">Submit</button>
            </form>
          </div>
        </div>

        

      </div>

    </div>

  </div>
</div>
</section>
@endsection
@section('scripts')
    <script>
      const card = document.querySelector('.cardSel');

     
    </script>
@endsection
