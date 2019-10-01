@extends('layouts.admin')

@section('content-admin')
   <h1 class="text-center mt-4">See all order of Users</h1>
   <div class="container mt-4">
    <table class="table table-hover">
      <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th>All Order</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td><a href="/menage/order/{{$user->id}}" class="btn btn-primary"><i 
              style ="color:white;"class="fas fa-shopping-cart"></i></a>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
@endsection


