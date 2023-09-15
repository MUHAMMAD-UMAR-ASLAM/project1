<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\post;
use App\Models\comments;



use Illuminate\Http\Request;

class CommentController extends Controller
{
 
  public function addComment(Request $request)
  {
    $data = Session::get('user',NULL);
    if ($data==NULL)
    {
        return "Login First";
    }
 
    $id=$data['id'];
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
    return 'Comment Add Successfully';

  }

  public function RemoveComment(Reques $request){
    $post_id=$request->input("post_id");
    comments::where('user_id',$request->input("id"))->where('post_id',$post_id)->where('body',$request->input('body'))->delete();

  }
}
