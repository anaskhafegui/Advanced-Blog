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
         <h2 class="text-center">Edit BLog  </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{route('blog.update')}} ">

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="title">Site name</label>
                 <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
           </div>

           <div class="form-group">
               <label for="featured">Address</label>
               <input type="text" name="address" class="form-control" value="{{$setting->address}}">
           </div>


            <div class="form-group">
                  <label for="title">Contact Phone</label>
                  <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}"> 
            </div>

            <div class="form-group">
                  <label for="title">Contact Email</label>
            <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}">  
            </div>
            

            <div class="form-group">
               <div class="text-center">
                     <button type="submit" class="btn btn-success">Update Site Settings</button>
               </div>
            </div>
         </form>   
      </div>
   </div>

   </div>
</div>


  

@endsection  
