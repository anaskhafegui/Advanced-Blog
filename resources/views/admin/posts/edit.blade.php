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
         <h2 class="text-center">Edit  Post </h2>
      </div>

      <div class="panel-body">
         <form method="POST" action="{{route('post.update',['id'=> $id->id]) }} " enctype="multipart/form-data">

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="title">Title</label>
           <input type="text" name="title" class="form-control" value="{{$id->title}} " >
           </div>

           <div class="form-group">
               <label for="featured">Featured Image</label>
               <input type="file" name="featured" class="form-control" >
           </div>


            <div class="form-group">
                  <label for="content">Contant</label>
                  <textarea type="text" name="content" cols="5" rows="5" class="form-control">{{$id->content}} </textarea>
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

               <label for="tags">Select Tag </label>
         @foreach ($tags as $tag)
             
        
            <div class="checkbox">
            <label><input type="checkbox" value="{{ $tag->id}}" name="tags[]"
               
               @foreach ($id->tags as $t)

               @if($tag->id == $t->id)
                        
                checked

               @endif
                   
               @endforeach
               
               >{{ $tag->tag}}</label>
        </div>
        @endforeach
               </label>
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
