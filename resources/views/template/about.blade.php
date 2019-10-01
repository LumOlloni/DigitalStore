@extends('layouts.app')

@section('content')


<!-- End of Jumbotron Section -->

<!-- About Us Section -->
<section class="py-5 text-center">
<div class="container ">
  <h2 class="textHeading ">Meet Our Staff</h2>
  <p class="lead mb-3">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quidem
    suscipit adipisci consequatur voluptatem illum cum beatae nihil
    quibusdam nemo.
  </p>

  <div class="row">
    <div class="col-lg-3 col-md-6 animationBox">
      <div class="card">
        <div class="card-body">
          <img src="../storage/img/staff/adult-blur-daytime-834863.jpg" alt="" class="img-fluid rounded-circle w-75 mb-3" />
          <h3>Lum Olloni</h3>
          <h5 class="text-muted">Menager</h5>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aperiam reiciendis, consequatur nostrum neque debitis ea!
          </p>
          <div class="d-flex justify-content-center">
            <div class="p-4">
              <a href="#">
                <i class="fab fa-facebook-square"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 animationBox">
      <div class="card">
        <div class="card-body">
          <img src="../storage/img/staff/beautiful-beauty-blurred-background-1239291.jpg" alt=""
            class="img-fluid rounded-circle w-75 mb-3" />
          <h3>Loretta A.Hensley</h3>
          <h5 class="text-muted">Salesman</h5>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aperiam reiciendis, consequatur nostrum neque debitis ea!
          </p>
          <div class="d-flex justify-content-center">
            <div class="p-4">
              <a href="#">
                <i class="fab fa-facebook-square"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 animationBox">
      <div class="card">
        <div class="card-body">
          <img src="../storage/img/staff/adult-businessman-contemporary-937481.jpg" alt=""
            class="img-fluid rounded-circle w-75 mb-3" />
          <h3>Brian P. Fink</h3>
          <h5 class="text-muted">Boss</h5>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aperiam reiciendis, consequatur nostrum neque debitis ea!
          </p>
          <div class="d-flex justify-content-center">
            <div class="p-4">
              <a href="#">
                <i class="fab fa-facebook-square"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 animationBox">
      <div class="card">
        <div class="card-body">
          <img src="../storage/img/staff/facial-hair-fine-looking-guy-614810.jpg" alt=""
            class="img-fluid rounded-circle w-75 mb-3" />
          <h3>Steve M. Bain</h3>
          <h5 class="text-muted">Employee</h5>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Aperiam reiciendis, consequatur nostrum neque debitis ea!
          </p>
          <div class="d-flex justify-content-center">
            <div class="p-4">
              <a href="#">
                <i class="fab fa-facebook-square"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <div class="p-4">
              <a href="#">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- End of About us Section -->

<!-- Location Section  -->

<section class="py-5 text-center">
<div class="container">
  <h2 class="textHeading "> Our Location</h2>
  <p class="lead mb-3">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quidem
    suscipit adipisci consequatur voluptatem illum cum beatae nihil
    quibusdam nemo.
  </p>
  <div class="col">
    <div id="map"></div>
  </div>
</div>
</section>

@endsection

@section('scripts')
<script>
  
function createMap() {
  var map;

var options = {
    center: {
        lat: 42.379654,
        lng: 20.430656
    },
    zoom: 10,

}
map = new google.maps.Map(document.getElementById('map'), options);

var marker = new google.maps.Marker({
    position: {
        lat: 42.379654,
        lng: 20.430656
    },
    map: map
});

}

   


</script>
    
@endsection