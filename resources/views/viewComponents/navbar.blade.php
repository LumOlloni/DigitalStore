

@if (Auth::check())
<nav class="navbar navbar-expand-sm navbar-dark bg-dark " id="nav">
    <div class="container">
      <a href="/home" style="color:#f4623a" class="navbar-brand">DigitalStore</a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <form action="/home/search" method="POST" class="form-inline my-2 my-lg-0 ml-auto " id="navBarSearchForm">
            @csrf
          <input class="form-control input-lg  form-control-sm mr-3" type="text" placeholder="Kerko Produktin" name="search"
            aria-label="Search" />
          <i class="fas fa-search"></i>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profile">Profile Juaj</a>
            
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" style="color: #f4623a;" href="logout">Logout</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('shoppingCart')}}"><span><i style="font-size: 20px;" class="fas fa-shopping-cart"></i></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 
  @elseif(Auth::guest())
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container">
        <a href="/" style="color:#f4623a" class="navbar-brand">DigitalStore</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="/" class="nav-link ">Home</a>
            </li>
            <li class="nav-item">
              <a href="/contact" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="/about" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
              <a data-toggle="modal" style="cursor: pointer;" data-target="#loginModal" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 
@endif
