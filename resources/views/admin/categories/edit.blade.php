@extends('layouts.app')



@section('content')

   <div class="container">

   <div class="panel panel-defalut">

      <div class="panel-heading">  
         <h2 class="text-center">Edit category name </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{ route('category.update',['id'=> $id->id]) }}" >

           {{ csrf_field() }}

           <div class="form-group">
           <label for="name">Edit</label>
                 <input type="text" name="name" class="form-control" value="{{$id->name}} ">
           </div>

           

            <div class="form-group">
               <div class="text-center">
                     <button type="submit" class="btn btn-success">Update</button>
               </div>
               
            </div>
         </form>   
      </div>
   </div>

   </div>
</div>


  

@endsection  