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
         <h2 class="text-center">Create category name </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{route('category.store')}}" >

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" class="form-control">
           </div>

           

            <div class="form-group">
               <div class="text-center">
                     <button type="submit" class="btn btn-success">Store</button>
               </div>
               
            </div>
         </form>   
      </div>
   </div>

   </div>
</div>


  

@endsection  
