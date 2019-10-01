@extends('layouts.admin')

@section('content-admin')
    <br><br>
  <div class="container">
    @if ($message = Session::get('warning'))
      <div class="alert alert-warning alert-block">
         <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
       <strong>{{ $message }}</strong>
    </div>
  @endif
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Menage Users</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Roles</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                    <tr>
                      <th>{{$item->name}}</th>
                      <th>{{$item->username}}</th>
                      <th>{{$item->email}}</th>
                      <th>{{implode (',' , $item->roles()->get()->pluck('name')->toArray() )}}</th>
                      <th>
                        <a href="{{route('editAdmin',$item->id)}}">
                          <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </a>
                      </th>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection