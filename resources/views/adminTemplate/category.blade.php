@extends('layouts.admin')

@section('content-admin')

  <div class="container mt-5">
      <h2 class="text-center ">All Category</h2>
    @if ($message = Session::get('successCategory'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
    <table class="table table-hover w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($category  as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                  <a style="cursor: pointer;" data-id="{{$item->id}}"  class="btn btn-danger deleteLink"><i class="far fa-trash-alt "></i></a></td>
              </tr>
          @endforeach
        </tbody>

    </table>
  </div>
@endsection
@section('scripts')

   <script src="{{ asset('js/app.js')}}"></script> 

    <script>

      // Add Category Value 
    const category = document.getElementById('button');
    const name = document.getElementById('categoryname');
    const error = document.getElementById('error');

    const letters = /^[A-Za-z]+$/;

      
    category.addEventListener('click' , function (event) {
      if(name.value.match(letters)){
       axios.post('category', {
          nameCategory:name.value
      })
      .then( data => {
        console.log(data);
        window.location.href = "http://localhost:8000/menage/category"
      })
      .catch (err => {
        console.log(err);
      });
      }
      else {
        $(window).load(function() {
           $('#myModal').modal('show');
        });
       
        error.innerHTML = '<p class="alert alert-danger alert-block"> Required field or number given  </p>';
      }

      event.preventDefault();
    });
    // end of category value function 


    // Delete Category

    if (document.querySelectorAll('.deleteLink')) {
      const deleteButton = document.querySelectorAll('.deleteLink');
    
        deleteButton.forEach(element => {
        
        element.addEventListener('click' , function (e) {

        const id = element.getAttribute('data-id');

        e.preventDefault();
        axios.delete(`category/${id}` , {
           idValue: this.value
         })
         .then(function (data) {
           console.log(data);

            window.location.href = "http://localhost:8000/menage/category"
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

