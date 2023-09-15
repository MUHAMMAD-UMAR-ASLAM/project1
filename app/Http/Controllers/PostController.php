<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
public function create(Request $request){
    $data = Session::get('user');
 
    $post = Post::create([
        'user_id'=>$data['id'],
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);
    $post->save();
    return 'Sucess';
} 

public function delete(Request $request){
    $data = Session::get('user');
    $id=$data['id'];
     return $request->input('title');
    $post=Post::where('user_id',$id)->where('title',$request('title'))->delete();
    return $post;

    return 'sucess';

}
public function read(Request $request){
    $data = Session::get('user');
    $id=$data['id'];
    $result=Post::Select('posts.title','comments.body')->join('comments','posts.id','comments.post_id')->where('posts.user_id',$id)->get();
    return $result;


}
}