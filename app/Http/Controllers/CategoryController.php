<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::latest()->simplePaginate(3);
    	return view('admin.category', compact('categories'));;
    }

    public function add(Request $request)
    {
        // dd($request->all());
    	Category::create($request->all());

    	return redirect('/dashboard/category')->with('berhasil', 'Berhasil Menambahkan Kategori!');
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('/dashboard/category')->with('Hapus', 'Kategori Berhasil di Hapus!');
    }

    public function show($id)
    {

        $category = Category::findOrFail($id);
        $categories = Category::all();
        if($category){
            $data_post = Post::where('Category_id',$id)->simplePaginate(3);

    }
        return view('index', [ 'data_post' => $data_post, 'categories' => $categories ]);
    }
}
