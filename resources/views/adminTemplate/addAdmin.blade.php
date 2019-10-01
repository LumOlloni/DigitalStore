@extends('layouts.admin')

@section('content-admin')
    <h2 class="text-center mt-4 ">Add Admin</h2>
      <div class="container">
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <strong>{{ $message }}</strong>
          </div>
        @endif
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="{{ action('UserController@store') }}" method="POST"  enctype="multipart/form-data" >
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}"  placeholder="Enter Name">
                  
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                    <label >Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}"   placeholder="Enter Username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  placeholder="Enter email">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label >Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Enter Password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                      <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                      @error('img')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Role</label>
                    <select name="addAdmin" class="form-control" id="exampleFormControlSelect1">
                      @foreach ($role as $item)
                       <option value="{{$item->name}}">{{$item->name}}</option>        
                      @endforeach
                    </select>
                </div>
                  <button  style=" background-color: #f4623a ;
                  color: #fff " type="submit" class="btn btn-block ">Submit</button>
              </form>
          </div>
        </div>
      </div>
@endsection