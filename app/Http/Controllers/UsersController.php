<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
        
    {

        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index')->with('users' ,User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    public function admin(User $id)
    {
        $id->admin = 1;
        $id->save();

        return back();
    }

    public function not_admin(User $id)
    {
        $id->admin = 0;
        $id->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[

            'name'      => 'required',
            'email'     => 'required|email'
             ]);

        $user = User::create([

        'name'   => $request->name,
        'email' => $request->email,
        'password'  => bcrypt('password')
        
        ]);

        $profile = Profile::create([

            'user_id' =>$user->id,
            'avatar'  =>'uploads/avatars/default.png'
        ]);

      
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    { 
        $id->profile->delete();
        $id->delete();
      
       

        return back();

        Session::flash('success','Your post was deleted .');

        return back();
    }
}
