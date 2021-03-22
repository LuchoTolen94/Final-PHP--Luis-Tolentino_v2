<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperar el listado de los posts
        $posts = Post::all();
        //pasar informacion recuperada a la vista
        return view('posts.index',compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required', 'category'=>'required', 'description'=>'required','country'=>'required']);
        $post = new Post(['name'=>  $request->get('name'),
                          'category'=>  $request->get('category'),
                          'description'=>  $request->get('description'),
                           'country'=>  $request->get('name')
                ]
                );
        $post->save();
        return redirect('/posts')->with('success','Post saved');
        
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
        $post = Post::find($id);        
        return view('posts.edit', compact('post'));
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
        $request->validate(['name'=>'required', 'category'=>'required', 'description'=>'required','country'=>'required']);
        
        $post = Post::find($id);
        $post->name=$request->get('name');
        $post->category=$request->get('category');
        $post->description=$request->get('description');
        $post->country=$request->get('country');
        
        $post->save();
        
        return redirect ('/posts')->with('succees','Post updated');
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);        
        $post->delete();        
        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
