<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype'=>'required|string|max:255|',
            'password' => 'required',

        ];

        // Validate the request data
        $request->validate($rules);
    
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
             'usertype'=>$request->input("usertype"),
            'password' => $request->input('password'),
        ]);
        $user->save();
        
        
      
        
        return "Sucess";
    
}
public function LogIn(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
  
 

  $data=  User::where('email', $credentials['email'])->where('password', $credentials['password'])->first();

    if (!empty($data)) {
        // Authentication passed
        $request->session()->put("user",$data);
        return 'Sucess'; // Redirect to a protected page
    }
    else 
    {
        return "Invalid Credentials";
    }


}
public function admin_read(Request $request)
{
    $data = Session::get('user');
  
    $usertype=$data['usertype'];
    if($usertype=='Admin')
    {
    $results=User::Select('name','email','password','usertype','body','title')->join('posts','users.id','posts.user_id')->join('comments','posts.id','comments.post_id')->get();
    return $results;
    }
    else
    {
        return "Only Admin reads";
    }
  
}
public function delete(Request $request)
{
    $data = Session::get('user');
    $id=$data['id'];
    $usertype=$data['usertype'];
    if($usertype!='guest'){
        if($usertype=='user')
        {
            if($request->input("type")=='post')
            {
            return redirect()->route('/post_delete')->with($request->input('title'));
            }
            else
            {
               return Route::redirect('/comment_delete')->with($request->input("title")->with($request->input('comment'))->with($id));   
            }
        }
        else if ($usertype=='Admin') {
            if($request->input("type")=='user')
            {
                User::where('email',$request->input("email"))->delete();
            }
            if($request->input("type")=='post')
            {
                
            return redirect('/post_delete')->with('title',$request->input('title'));
            }
            else
            {
               return Route::redirect('/comment_delete')->with($request->input("title")->with($request->input('comment'))->with($id));   
            }

        }

    }
    
 
}
}