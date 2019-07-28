@extends('layouts.app')

@section('content')


<div class="panel default">
   <table class="table table-hover">
       <thead>
           <th>
               Category name
           </th>
           <th>
               Editing
           </th>
           <th>
                Delete
            </th>
            <tbody>
                @forelse ($categories as $cat)
                    <tr> 
                        <td> {{ $cat->name }} </td>
                        <td> <a href="{{ route('category.edit',['id'=> $cat->id]) }}"><button class="btn btn-primary">Edit </button></a></td>
                    <td> <a href="{{ route('category.delete',['id'=> $cat->id]) }}"><button class="btn btn-danger">Delete </button></a> </td>
                    </tr>
                    @empty
                    <tr>
                            <th colspan="5" class="text-center">No Categories</th>
                    </tr>  
                @endforelse
            </tbody>
       </thead>
   </table>

</div>

    
@endsection