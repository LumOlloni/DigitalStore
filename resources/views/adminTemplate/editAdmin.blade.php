@extends('layouts.admin')

@section('content-admin')
    <br><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Edit {{$user->name}} Roles </div>
          <div class="card-body">
            <form action="{{route('updateAdmin' ,[$user->id])}}" method="POST">
              @csrf
              {{method_field('PUT')}}
              @foreach ($roles as $role)
                <div class="form-chech">
                  <input type="checkbox" name="roles[]" value="{{$role->id}}" 
                  {{$user->hasAnyRole($role->name)?'checked': ''}} >
                  <label>{{$role->name}}</label>
                </div>
              @endforeach
              <button class="btn btn-primary" type="submit">
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection