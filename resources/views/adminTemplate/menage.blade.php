@extends('layouts.admin')

@section('content-admin')

<div class="d-flex" id="wrapper">


    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin Page</div>
      <div class="list-group list-group-flush">
        @hasRole('admin')
          <a href="/menage/product" class="list-group-item list-group-item-action bg-light">Product</a>
        @endhasRole
        @hasRole('Editor')
          <a href="/menage/category" class="list-group-item list-group-item-action bg-light">Categroy</a>
        @endhasRole
        @hasRole('superadmin')
          <a href="/menage/blockUsers" class="list-group-item list-group-item-action bg-light">Block Users</a>
        @endhasRole
        @hasRole('superadmin')
          <a href="/menage/roleUsers" class="list-group-item list-group-item-action bg-light">Role &  Permissions</a>
        @endhasRole
        @hasRole('admin')
          <a href="/menage/statProduct" class="list-group-item list-group-item-action bg-light">Statistics of Product</a>
        @endhasRole
        @hasRole('Editor')
          <a href="/menage/allUser" class="list-group-item list-group-item-action bg-light">All Order of Users </a>
        @endhasRole        
      </div>
    </div>
 
    <div id="page-content-wrapper">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="container-fluid">
      <h1 class="mt-4">Welcome {{Auth::user()->name}}   build something cool </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla deleniti, hic cumque, cupiditate veniam odit similique libero laborum, inventore nostrum enim in debitis! Itaque quidem perspiciatis tempore consequuntur voluptate, amet illo quibusdam quis sit, doloremque est, mollitia quisquam? Consequuntur, perspiciatis.</p>
        
      </div>
    </div>

  </div>




  
@endsection
@section('scripts')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
     
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>
    
@endsection