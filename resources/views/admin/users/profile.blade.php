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
         <h2 class="text-center">Create New User </h2>
      </div>

      <div class="panel-body">

         <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data" >

           {{ csrf_field() }}

           <div class="form-group">
                 <label for="name">Username</label>
                 <input type="text" name="name" class="form-control" value="{{ $user->name }}">
           </div>

           <div class="form-group">
               <label for="name">Email</label>
               <input type="email" name="email" class="form-control" value="{{ $user->email }}">
           </div>

           <div class="form-group">
                <label for="name">New Password</label>
           <input type="password" name="password" class="form-control" >
            </div>

            <div class="form-group">
                    <label for="name">Upload New Avatar</label>
                    <input type="file" name="avatar" class="form-control" value="{{ $user->profile->avatar}}">
                </div>

           <div class="form-group">
                <label for="name">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
            </div>

            <div class="form-group">
                    <label for="name">youtube profile</label>
                    <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
            </div>
            <div class="form-group">
                    <label for="name">About You</label>
                    <input type="text" name="about" class="form-control" value="{{ $user->profile->about }}">
            </div>

            <div class="form-group">
               <div class="text-center">
                     <button type="submit" class="btn btn-success">Update Your Profile</button>
               </div>
            </div>
         </form>   
      </div>
   </div>

   </div>
</div>


  

@endsection  
