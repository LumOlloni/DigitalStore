@extends('layouts.admin')

@section('content-admin')

  <div class="container mt-5">
    @if ($message = Session::get('errorDelete'))
      <div class="alert alert-danger alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">name</th>
          <th scope="col">price</th>
          <th scope="col">manufacter</th>
          <th scope="col">quantity</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($product as $p)
            <tr>
             
              <td>{{$p->name}}</td>
              <td>{{$p->price}}</td>
              <td>{{$p->manufacturer}}</td>
              <td>{{$p->quantity}}</td>
              <td>{{$p->category->name}}</td>
              <td><a href="/menage/product/{{$p->id}}/edit" class="btn btn-primary"><i class="far fa-edit"></i></a>
               <a style="cursor: pointer;" data-id="{{$p->id}}"  class="btn btn-danger deleteLink"><i class="far fa-trash-alt"></i></a></td>
            </tr>
         @endforeach
      </tbody>
    </table>
  </div>

  
@endsection
@section('scripts')
<script src="{{ asset('js/app.js')}}"></script>
<script>
  if (document.querySelectorAll('.deleteLink')) {
      const deleteButton = document.querySelectorAll('.deleteLink');
    
        deleteButton.forEach(element => {
        
        element.addEventListener('click' , function (e) {

        const id = element.getAttribute('data-id');

        e.preventDefault();
        axios.delete(`product/${id}` , {
           idValue: this.value
         })
         .then(function (data) {
           console.log(data);

            window.location.href = "http://localhost:8000/menage/product"
         })
         .catch(function (err) {
           console.log(err);
          
         })

   })
   }
  )
  }

</script>

@endsection