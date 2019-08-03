@extends('layouts.app')

@section('content')


<div class="panel default">
   <table class="table table-hover">
       <thead>
           <th>
               image
           </th>
           <th>
               name
           </th>
           <th>
                permissions
            </th>
           <th>
                Delete
            </th>
            <tbody>
                @forelse ($users as $user)
                    <tr> 
                    <td>
                        <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%;"></td>

                        <td> {{ $user->name }} </td>
                        
                        <td>
                    @if($user->admin)
                    
                        
                        <a href=" {{ route('user.not-admin',['id'=> $user->id]) }}" class="btn btn-xs btn-success"> Remove Permissions</a>
                    @else 

                        <a href=" {{ route('user.admin',['id'=> $user->id]) }}" class="btn btn-xs btn-success"> make admin</a>
                    
                    @endif

                </td>
                    
            </td>
      

                            <th >
                                
                                @if (Auth::id() !== $user->id)

                                <a href=" {{ route('user.delete',['id'=> $user->id]) }}" class="btn btn-xs btn-danger">Delete</a></th>
                                @endif
                        </tr>
                
                    @empty
                    <tr>
                            <th colspan="5" class="text-center">No Users</th>
                    </tr>  
                   
                @endforelse
            </tbody>
       </thead>
   </table>

</div>

    
@endsection