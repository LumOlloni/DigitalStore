
@extends('layouts.app')

@section('content')


<!-- Contact Us -->
<section class="container">

  <!--Contact heading-->

  <h2 class="textHeading text-center">Contact us</h2>
  <!--Contact description-->
  <p class="lead mb-4">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quidem
    suscipit adipisci consequatur voluptatem illum cum beatae nihil
    quibusdam nemo.
  </p>

  <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 mb-4 ">

      <!--Form with header-->
      <div class="card  border-danger rounded-0">

        <div class="card-header p-0">
          <div class="bg-color text-white text-center py-2">
            <h3><i class="fa fa-envelope"></i> Write to us:</h3>
            <p class="m-0">We'll write rarely, but only the best content.</p>
          </div>
        </div>
        <div class="card-body p-3">
        <form action="{{ url('contactForm')}}" method="post">
            {{ csrf_field() }}
         
          <!--Body-->
          <div class="form-group">
            <label>Your Subject</label>
            <div class="input-group">
              <div class="input-group-addon bg-light"><i class="fa fa-user colorOrange "></i></div>
              <input type="text" name="subject" class="form-control" id="inlineFormInputGroupUsername" placeholder="Subject">
             
            </div>
            @if ($errors->has('subject'))
            <p class="text-danger">{{$errors->first('subject')}}</p>
          @endif
          </div>
          <div class="form-group">
            <label>Your email</label>
            <div class="input-group mb-2 mb-sm-0">
              <div class="input-group-addon bg-light"><i class="fa fa-envelope colorOrange"></i></div>
              <input type="text"  name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
             
            </div>
            @if ($errors->has('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
          @endif
          </div>
          <div class="form-group">
            <label>Message</label>
            <div class="input-group mb-2 mb-sm-0">
              <div class="input-group-addon bg-light"><i class="fa fa-pencil colorOrange"></i></div>
              <textarea name="textMessage" class="form-control"></textarea>
             
            </div>
            @if ($errors->has('textMessage'))
            <p class="text-danger">{{$errors->first('textMessage')}}</p>
          @endif
          </div>

          <div class="text-center">
            <button style="background-color: #f4623a;
            color: #fff;" class="btn bg-color btn-block rounded-0 py-2">Submit</button>
          </div>
          @if (session('success'))
          <div class="alert alert-success">
              {{session('success')}}
          </div>
        @endif
        </form>
        </div>

      </div>
      <!--Form with header-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-7">

      <!--Google map-->
      <div class="mb-4">

      </div>

      <!--Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="bg-color px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
          <p>Marije Shllaku nr 1 , Gjakove<br> Kosove </p>

        </div>

        <div class="col-md-4">
          <a class="bg-color px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
          <p>+ 383454324445, <br> Mon - Fri, 8:00-22:00</p>
        </div>

        <div class="col-md-4">
          <a class="bg-color px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
          <p>info@gmail.com <br> lum-olloni@hotmail.com</p>
        </div>
      </div>

      <div class="col-md-8">
        <img src="../storage/img/cellphone-cellular-communication-263564.jpg" class="imgContact" alt="" srcset="">
      </div>

    </div>


    <!--Grid column-->

  </div>

</section>

@endsection