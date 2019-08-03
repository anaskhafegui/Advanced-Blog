@extends('layouts.app')



@section('content')


  <ul class="list-group">

        @forelse ($errors->all() as $error)
            
         <li class="list-group-item text-danger">
           {{ $error }}
         </li>
        @empty

            
            
        @endforelse
     </ul>

   <div class="container">

   <div class="panel panel-defalut">

      <div class="panel-heading">  
         <h2 class="text-center">Create New User </h2>
      </div>

      <div class="panel-body">

         <form method="POST" action="{{route('user.store')}}" >

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="name">User</label>
                 <input type="text" name="name" class="form-control">
           </div>

           <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" class="form-control">
           </div>

            <div class="form-group">
               <div class="text-center">
                     <button type="submit" class="btn btn-success">Add a user</button>
               </div>
            </div>
         </form>   
      </div>
   </div>

   </div>
</div>


  

@endsection  
