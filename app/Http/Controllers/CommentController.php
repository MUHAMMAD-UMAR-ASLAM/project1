<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function create(Request $request)
  {
  
    if(Auth::user()->hasPermissionTo('add_comment'))
    {
    $id=Auth::id();
    $title=$request->input('title');
    $post_id=post::Select('id')->where('title',$title)->where('user_id',$id)->get();

    if (!$post_id){
       return "Post With this title not exist";
    }
    $comment=comments::create([
        'user_id'=>$id,
        'post_id'=>$post_id[0]['id'],
        'body'=>$request->input("body"),
    ]);
    $comment->save();
    return 1;

  }
  else
  {
    return '"Aceess Denied"';
  }
}

  public function delete(Request $request){
    if(Auth::user()->hasPermissionTo('delete_comment'))
    {
    $id=Auth::id();
    $title=$request->input('title');
    $post_id=post::Select('id')->where('title',$title)->where('user_id',$id)->get();
    $body=$request->input('body');
   
    $comment=comments::where('post_id',$post_id[0]['id'])->where('body',$body)->first();
 
    if($comment)
    {
      $comment->delete();
      return 1;
    }
    else
    {
      return 'comment not exist';
    }

    }
  else
  {
    return "Aceess Denied";
  }
  }
  public function read(Request $request)
  {
    if(Auth::user()->hasPermissionTo('read_comment'))
    {
    $id=Auth::id();
  
    return comments::where('user_id',$id)->get();

    }
  }
}
