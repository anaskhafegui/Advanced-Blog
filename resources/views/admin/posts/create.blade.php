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
         <h2 class="text-center">Create New Post </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{route('post.store')}} " enctype="multipart/form-data">

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="title">Title</label>
                 <input type="text" name="title" class="form-control">
           </div>

           <div class="form-group">
               <label for="featured">Featured Image</label>
               <input type="file" name="featured" class="form-control">
           </div>


            <div class="form-group">
                  <label for="title">Contant</label>
                  <textarea type="text" name="content" cols="5" rows="5" class="form-control"> </textarea>
            </div>

            <div class="form-group">
                  <label for="category_id">Select a Category</label>
                  <select name="category_id"  class="form-control">
                     @foreach ($categories as $n)

                  <option value="{{ $n->id}}"> {{ $n->name }} </option>
                         
                     @endforeach
                  </select>
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
