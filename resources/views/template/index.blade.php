
@extends('layouts.app')

@section('content')


  
    <!-- Home Heading Section -->
  <section id="home-heading" class="p-5">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container">
            <h1>A jeni gati per te Filluar ?</h1>
            <p class="d-none d-md-block">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae maiores, recusandae quam vero aperiam, sint odio
              provident illo a, ducimus excepturi pariatur libero culpa eos
              tempora quae impedit quia repellendus?
            </p>
            <a class="btn btn-light btn-xl button" href="/signUp">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end of Home Heading Section -->

  <!--  Icon Service -->
  <section id="home-icons" class="py-5">
    <div class="container">
      <h2 class="text-center mt-0">Sherbimet Tona</h2>
      <hr class="divider my-4 " />
      <div class="row">
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-desktop fa-3x mb2"></i>
          <h3>Kompjuter</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
            eos odit perferendis suscipit quibusdam quam recusandae
            exercitationem accusantium delectus itaque?
          </p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fab fa-playstation fa-3x mb2"></i>
          <h3>Lojra</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
            eos odit perferendis suscipit quibusdam quam recusandae
            exercitationem accusantium delectus itaque?
          </p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-tablet fa-3x mb2"></i>
          <h3>Telefona</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora
            eos odit perferendis suscipit quibusdam quam recusandae
            exercitationem accusantium delectus itaque?
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- end of Icon Service section -->

  <!-- Gallery Section -->
  <section id="gallery">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/adult-apple-black-and-white-2330137.jpg" />
          <div class="overlay">
            <div class="text">
              Lorem ipsum, dolor sit amet consectetur adipisicing
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/bandwidth-close-up-connection-1148820.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/black-and-white-computer-keyboard-desk-209692.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/blur-close-up-computer-2225617.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/Untitled.png" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/brand-cellphone-connection-204611.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/circuit-board-circuits-components-825258.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/edge-plus-mobile-mockup-47261.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <img class="img-fluid" src="../storage/img/Gallery/i1.jpg" />
          <div class="overlay">
            <div class="text">Lorem ipsum, dolor sit amet consectetur</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br /><br />
  <!-- End of Gallery Section -->

  {{-- <!-- Login Section -->
  <div id="loadModal"></div>
  <!-- end of Login --> --}}
  

  

@endsection