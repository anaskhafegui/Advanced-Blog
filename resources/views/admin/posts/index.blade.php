@extends('layouts.app')

@section('content')


<div class="panel default">
   <table class="table table-hover">
       <thead>
           <th>
               image
           </th>
           <th>
               title
           </th>
           <th>
                Edit
            </th>
           <th>
                Delete
            </th>
            <tbody>
                @forelse ($categories as $cat)
                    <tr> 
                    <td><img src="{{ $cat->featured }}" alt="" width="50px" height="50px"></td>

                        <td> {{ $cat->title }} </td>
                        <td> <a href="{{ route('post.edit',['id'=> $cat->id]) }}"><button class="btn btn-primary">Edit </button></a></td>
                        <td> <a href="{{ route('post.delete',['id'=> $cat->id]) }}"><button class="btn btn-xs btn-danger">Trash</button></a> </td>
                    </tr>
                    @empty
                    <tr>
                            <th colspan="5" class="text-center">No Publish Post</th>
                    </tr>  
                @endforelse
            </tbody>
       </thead>
   </table>

</div>

    
@endsection