@extends('layouts.app')

@section('content')


<div class="panel default">
   <table class="table table-hover">
       <thead>
           <th>
               Tag name
           </th>
           <th>
               Editing
           </th>
           <th>
                Delete
            </th>
            <tbody>
                @forelse ($tags as $cat)
                    <tr> 
                        <td> {{ $cat->tag }} </td>
                        <td> <a href="{{ route('tag.edit',['id'=> $cat->id]) }}"><button class="btn btn-primary">Edit </button></a></td>
                    <td> <a href="{{ route('tag.delete',['id'=> $cat->id]) }}"><button class="btn btn-danger">Delete </button></a> </td>
                    </tr>
                    @empty
                    <tr>
                            <th colspan="5" class="text-center">No Tags</th>
                    </tr>  
                @endforelse
            </tbody>
       </thead>
   </table>

</div>

    
@endsection