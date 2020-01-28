<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
    	// dd($request->all());
        $categories = Category::all();
    	if($request->has("search")){
    		$data_post = Post::where('title','LIKE','%'.$request->search.'%')->simplePaginate(3);
            // $data_post = Post::latest()->Paginate(3);
    	}else{
    		$data_post = Post::latest()->simplePaginate(3);
            // $data_post = Post::latest()->simplePaginate(3);
    	}
    	// dd($data_post);
    	// $data_post = \App\Post::all();
    	// return view('index', compact('data_post'));
        return view('index', [ 'data_post' => $data_post, 'categories' => $categories ]);
    }

    public function post(Post $post)
    {
        $comments = Comment::all();
    	return view('post', [ 'post' => $post, 'comments' => $comments]);
    }

    public function dashboard(Request $request)
    {
    	if($request->has("search")){
    		$data_post = Post::where('title','LIKE','%'.$request->search.'%')->simplePaginate(5);
    	} else{
    		$data_post = Post::latest()->simplePaginate(5);

    	}
    	return view('admin.dashboard',compact('data_post'));
    }

 	public function newpost()
 	{
 		$categories = Category::all();
        return view('admin.newpost', compact('categories'));

 	}

    public function edit($id)
    {
    	$post = Post::find($id);
        $categories = Category::all();
    	return view('admin.edit', [ 'post' => $post, 'categories' => $categories ] );
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $post = Post::create($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $post->image = $request->file('image')->getClientOriginalName();
            $post->save();
        }
        $post->user_id = Auth::user()->id;
        $post->save();

    	return redirect('/dashboard')->with('berhasil', 'Post Berhasil Dibuat');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
    	$post = Post::find($id);
    	$post->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $post->image = $request->file('image')->getClientOriginalName();
            $post->save();
        }

    	return redirect('/dashboard')->with('berhasil', 'Post berhasil di Update');
    }

    public function delete($id)
    {
    	$post = Post::find($id);
    	$post->delete();
    	return redirect('/dashboard')->with('berhasil', 'Post Berhasil di Hapus!');
    }
}
