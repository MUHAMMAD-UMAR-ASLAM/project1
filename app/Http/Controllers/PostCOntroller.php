<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCOntroller extends Controller
{
    //

    public function create(Request $request)
    {

        if (Auth::user()->hasPermissionTo('create_post')) {
            $post = Post::create([
                'user_id' => Auth::id(),
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);
            $post->save();
            return 1;
        } else
            return "Aceess Denied";
    }

    public function delete(Request $request)
    {
        if (Auth::user()->hasPermissionTo('delete_post')) {
            $id = Auth::id();

            $post = Post::where('user_id', $id)->where('title', $request->input('title'))->delete();


            return 1;
        } else {
            return '"Aceess Denied"';
        }

    }
    public function read(Request $request)
    {
        if (Auth::user()->hasPermissionTo('read_post')) {

            $result = Post::Select('posts.title')->where("user_id",Auth::id())->get();
            return $result;


        } else {
            return "Aceess Denied";
        }
    }
}