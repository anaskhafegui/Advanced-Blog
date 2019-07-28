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
                    restore
                </th>
           <th>
                Destroy
            </th>
            <tbody>
                @forelse ($posts as $cat)

                <tr> 
                        <td><img src="{{ $cat->featured }}" alt="" width="50px" height="50px"></td>
    
                            <td> {{ $cat->title }} </td>
                            <td> <a href="{{ route('post.edit',['id'=> $cat->id]) }}"><button class="btn btn-primary">Edit</button></a></td>
                            <td> <a href="{{ route('post.restore',['id'=> $cat->id]) }}"><button class="btn btn-success">restore</button></a> </td>
                            <td> <a href="{{ route('post.kill',['id'=> $cat->id]) }}"><button class="btn btn-danger">Force Delete</button></a> </td>
                </tr>
                    
                @empty 

                <tr>
                <th colspan="5" class="text-center">No Trashed Post</th>
                </tr>               
                    
                @endforelse 
                    
               
            </tbody>
       </thead>
   </table>

</div>

    
@endsection