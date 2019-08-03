@extends('layouts.app')



@section('content')

   <div class="container">

   <div class="panel panel-defalut">

      <div class="panel-heading">  
         <h2 class="text-center">Edit tag name </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{ route('tag.update',['id'=> $id->id]) }}" >

           {{ csrf_field() }}

           <div class="form-group">
           <label for="tag">Edit</label>
                 <input type="text" name="tag" class="form-control" value="{{$id->tag}}">
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