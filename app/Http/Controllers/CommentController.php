<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

class CommentController extends Controller
{
    public function postcomment(Request $request, $id)
    {
        // dd($request->all());
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();
        return redirect('/post/'.$id)->with('berhasil', 'Komentar Berhasil di Post!');
        // return redirect('/post/{$id}')->with('sukses', 'Komentar Berhasil di Post');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/post/'.$id)->with('berhasil', 'Komentar Berhasil Di Hapus!');
    }
}
