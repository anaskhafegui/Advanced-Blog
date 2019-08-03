<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.posts.index')->with('categories', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all(); 


        $categories = Category::all();

        if ($categories->count() == 0 || $tags->count() ==0) {

            

            Session::flash('info','Your must have some categories and Tags.');

            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)->with('tags', Tag::all());
    }
    
    public function trash()
    {
        $posts =Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts', $posts);

    }
    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();

        $posts->forceDelete();

        return back();

    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();

        $posts->restore();

        return redirect()->route('post.index');

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    
        $this->validate($request,[

            'title'       => 'required',

            'featured'    => 'required|image',

            'content'     => 'required',

            'category_id' => 'required',

            'tags'        => 'required'
 
           
        ]);

        $featured              = $request->featured;

        $featured_new_name     = time().$featured->getClientOriginalName();

        $featured ->move('uploads/posts',$featured_new_name );

        $post = Post::create([

        'title'   => $request->title,
        'content' => $request->content,
        'featured'=> 'uploads/posts/'.$featured_new_name,
        'category_id' => $request->category_id,
        'slug' => str_slug($request->title)

        ]);

        $post->tags()->attach($request->tags);

        
      
      
        return redirect()->route('post.index');
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
    public function edit(Post $id)

    {
        return view('admin.posts.edit',compact('id'))->with('categories',Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $id)
    {

        
       $this->validate($request ,[

        'title'       => 'required',

        'featured'    => 'required|image',

        'content'     => 'required',

        'category_id' => 'required',

        'tags'        => 'required'

       ]);

       $post = Post::find($id);

       if($request->hasFile('featured'))
       {
           $featured = $request->featured;
           $featured_new_name= time().$featured->getClientOriginalName();
           $featured ->move('uploads/posts',$featured_new_name);

           $id->featured =  'uploads/posts/'.$featured_new_name;

       }

       $id->title          =  $request->title;
       $id->content        =  $request->content;
       $id->category_id    =  $request->category_id;

       $id->save();
      
       Session::flash('success','Your post was updated .');

       
       return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $id->delete();

        Session::flash('success','Your post was deleted .');

        return back();
    }
}
