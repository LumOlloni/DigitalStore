@extends('layouts.admin')

@section('content-admin')

  <div class="container mt-5 ">
    <h1 class="text-center">Edit Product</h1>

    @if ($message = Session::get('successUpdate'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <!-- Default form contact -->
<form action="{{ action('ProductController@update' , $product->id) }}" class="text-left border border-light p-5 " method="POST"  enctype="multipart/form-data"  >
  {{ csrf_field() }}
  {{ method_field('PUT')}}
  <div class="col-md-6 mx-auto">
    <div class="form-group">
      <label for="message">Name</label>
        <input type="text" id="defaultContactFormName" name="name" class="form-control mb-4"  value="{{$product->name}}">
        @if ($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
  
    <label for="message">Price</label>
    <input type="number" name="price" class="form-control mb-4" value="{{$product->price}}" >
      @if ($errors->has('price'))
        <p class="text-danger">{{$errors->first('price')}}</p>
      @endif
    <label for="message">Manufacturer</label>
    <input type="text" name="manufacturer" id="defaultContactFormEmail" class="form-control mb-4" value="{{$product->manufacturer}}" >
    @if ($errors->has('manufacturer'))
      <p class="text-danger">{{$errors->first('manufacturer')}}</p>
    @endif
    <label for="message">Quantity</label>
    <input type="number" name="quantity" id="defaultContactFormEmail" class="form-control mb-4" value="{{$product->quantity}}" >
    @if ($errors->has('quantity'))
      <p class="text-danger">{{$errors->first('quantity')}}</p>
    @endif
    <div class="form-group">
        <label for="message">Product Description</label>
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="descriptionProduct" placeholder="Message">{{$product->description}}</textarea>
        @if ($errors->has('descriptionProduct'))
        <p class="text-danger">{{$errors->first('descriptionProduct')}}</p>
      @endif
    </div>
    <label for="message">Category of Product</label>
    <select name="category" class="browser-default custom-select mb-4">
        <option value="{{$product->category->id}}">{{$product->category->name}}</option>
        @foreach ($categories as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select> 
    <div class="form-group">
      <label for="message">Image of Product</label>
      <img src="/storage/img/PoduktetImage/{{$product->image}}" class="img-thumbnail" alt="" >
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