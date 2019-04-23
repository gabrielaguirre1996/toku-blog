<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Post;
use App\User;

class PostController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        $user_id = auth()->user()->id;
        $users = User::find($user_id);
        return view('index', compact('posts'));

        //return view('index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($post = new Post) {

    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->image != null) {
        $path = Storage::putFile('public', $request->file('image'));
        $url = Storage::url($path);
        $post->image = $url;
      }

        $post->user_id = auth()->user()->id;

        $post->save();
        $request->session()->flash('status', 'Post was successfully created!');
        return redirect()->route('home');

      } else {
            $request->session()->flash('status', 'Error creating post!');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', ['post' => $post]);
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
        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->content;

        $post->update();

        return redirect()->route('home', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('home');
    }
}
