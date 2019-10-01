<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
  <div class="container">
    <a href="/" id="menu-toggle" style="color:#f4623a" class="navbar-brand">Admin Panel</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        @if (Auth::user()->hasAnyRole('admin') && Request::is('menage/product'))
          <li class="nav-item">
            <a href="/menage/product/create" class="nav-link">Add Product</a>
          </li>
        @endif
        @if (Auth::user()->hasAnyRole('Editor') && Request::is('menage/category'))
          <li class="nav-item">
            <a href="/menage/product/create" data-toggle="modal" data-target="#myModal" id="create_category" name="create_category" class="nav-link">Add Category</a>
          </li>
        @endif
        @if (Request::is('menage/roleUsers') && Auth::user()->hasAnyRole('superadmin'))
          <li class="nav-item">
            <a href="/menage/roleUsers/storeAdmin" class="nav-link">Add admin</a>
          </li>
        @endif
        <li class="nav-item">
          <a href="/menage" class="nav-link">Home</a>
        </li>
        @if (Request::is('menage'))
         <li class="nav-item">
            <a href="logout" class="nav-link">Logout</a>
         </li>
        @endif
       
      </ul>
    </div>
  </div>
</nav>