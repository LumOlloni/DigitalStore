@extends('layouts.admin')

@section('content-admin')

  <div class="container mt-5 ">
    <h1 class="text-center">Create Product</h1>

    @if ($message = Session::get('successCreate'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
  
<form action="{{ action('ProductController@store') }}" class="text-left border border-light p-5 " method="POST"  enctype="multipart/form-data"  >
  @csrf
  <div class="col-md-6 mx-auto">
    <div class="form-group">
      <label for="message">Name</label>
        <input type="text" id="defaultContactFormName" name="name" class="form-control mb-4"  >
        @if ($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
  
    <label for="message">Price</label>
    <input type="number" name="price" class="form-control mb-4"  >
      @if ($errors->has('price'))
        <p class="text-danger">{{$errors->first('price')}}</p>
      @endif
    <label for="message">Manufacturer</label>
    <input type="text" name="manufacturer" id="defaultContactFormEmail" class="form-control mb-4"  >
    @if ($errors->has('manufacturer'))
      <p class="text-danger">{{$errors->first('manufacturer')}}</p>
    @endif
    <label for="message">Quantity</label>
    <input type="number" name="quantity" id="defaultContactFormEmail" class="form-control mb-4"  >
    @if ($errors->has('quantity'))
      <p class="text-danger">{{$errors->first('quantity')}}</p>
    @endif
    <div class="form-group">
        <label for="message">Product Description</label>
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="descriptionProduct" placeholder="Product Description"></textarea>
        @if ($errors->has('descriptionProduct'))
        <p class="text-danger">{{$errors->first('descriptionProduct')}}</p>
      @endif
    </div>
    <label for="message">Category of Product</label>
    <select name="category" class="browser-default custom-select mb-4">

       @foreach ($category as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
       @endforeach

    </select> 
    @if ($errors->has('category'))
      <p class="text-danger">{{$errors->first('category')}}</p>
    @endif
    <div class="form-group">
      <label for="message">Image of Product</label>
      <input type="file" class="form-control" name="img">
      @if ($errors->has('img'))
        <p class="text-danger">{{$errors->first('img')}}</p>
      @endif
    </div>
    <button  style="background-color: #f4623a;
    color: #fff;" class="btn btn-info btn-block" type="submit">Submit</button>
  </div>
</form>

  </div>
@endsection