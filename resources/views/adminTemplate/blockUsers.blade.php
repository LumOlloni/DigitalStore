@extends('layouts.admin')

@section('content-admin')

   <div class="container mt-4" >
      <h3 class="text-center">Block Users</h3>
      @if ($message = Session::get('successBlock'))
         <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
         </div>
      @endif
      @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
         </div>
      @endif
      @if ($message = Session::get('successUblock'))
         <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
         </div>
      @endif
      @foreach ($user as $u)
         <div class="card mb-3 mx-auto" style="max-width: 540px;">
               <div class="row no-gutters">
                 <div class="col-md-5">
                   <img style="height: 100%;" src="/images/imgUsers/{{$u->image}}" class="card-img" alt="...">
                 </div>
                 <div class="col-md-7">
                   <div class="card-body">
                     <h5 class="card-title">Name: {{$u->name}}</h5>
                     <p class="card-title">Email: {{$u->email}}</p>
                     <p class="card-title">Member since: {{$u->created_at}}</p>
                     @if (!now()->lessThan($u->banned_until))
                     <p class="card-title"> Choose Date</p>
                     <select  date-id ="{{$u->id}}" class="form-control selectList" >     <option selected disabled>Select date to block user</option>
                        @for ($i = $startTime; $i < $endTime; $i = $i + 86400)
                           <option  value = '{{date("Y-m-d", $i)}}'>{{date("M d", $i)}}</option>
                        @endfor
                     </select>
                     <br>
                     <p class="card-text"><a href="#"  style="background-color: #f4623a;
                        color: #fff;" class="btn bg-color deleteUser btn-block rounded-0 py-2">Block User</a></p>
                     @else 
                        <p class="card-title">UnBlock User</p>
                        <p class="card-text"><a href="#" style="background-color: #f4623a;
                           color: #fff;" date-id ="{{$u->id}}"   class="btn unBlockUser bg-color  btn-block rounded-0 py-2">Unblock User</a></p>
                     @endif
                        
                    
                   </div>
                 </div>
            </div>
         </div>
         @endforeach
      <br><br>
 
   </div>

@endsection
@section('scripts')
   <script src="{{ asset('js/app.js')}}"></script> 
    <script>
       
       const button = document.querySelectorAll('.deleteUser');

      
      function functioOption() {
         const e = document.querySelectorAll('.selectList');
       
         e.forEach(element => {
         const id = element.getAttribute('date-id');
         element.addEventListener('click' , function (param) {
            option = element.options[element.selectedIndex].value;
            
         
             localStorage.setItem('id' , id);
             localStorage.setItem('dataTime' , option);
        })
      
       });

      }

      functioOption();
     
       button.forEach(element => {
         element.addEventListener('click' , function (e){
           
            let id = localStorage.getItem('id');
            let number = localStorage.getItem('dataTime');
            axios.post(`blockUsers/${id}` , {
               id:id,
               number:number
            }).then( data => {

               console.log(data);
               localStorage.removeItem('id');
               localStorage.removeItem('dataTime');
               window.location.href = "http://localhost:8000/menage/blockUsers";
            })
            .catch (err => {
         
               window.location.href = "http://localhost:8000/menage/blockUsers";
               console.log(err);
            });
            e.preventDefault();
         });
       })

      //  Remove Ban From User

       const unblock = document.querySelectorAll('.unBlockUser');

       unblock.forEach(element => {
          const id = element.getAttribute('date-id');
            element.addEventListener('click' , function (param) {
               axios.post(`unBlockUser/${id}` , {
                  id:id
               })
               .then(data => {
                  console.log(data);
                  window.location.href = "http://localhost:8000/menage/blockUsers";
               })
               .catch(err => {
                  console.log(err);
               })
         })
       });


    </script>


@endsection