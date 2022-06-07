<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class userController extends Controller
{
    function login(Request $req)
    {
        $req->validate([
            "password" => "min:5 | max:9",
        ]);
        
        try {
            $info = User::with("group")
                ->where("email", $req->email)
                ->first();
            //NOW EMAIL VERIFICATION
            if (!$info) {
                return back()->with("fail", "We do not recognize your Email");
            } else {
                //CHECK PASSWORD
                if ($req->password === $info->password) {
                    $req->session()->put("loggeduser", $info);
                    return redirect("/feed");
                    
                } else {
                    return back()->with("fail", "Incorrect password");
                }
            }
        } catch (\Exception $exception) {
            // dd($exception->getMessage());     //To get message of exception
            // dd(get_class($exception));   //To get class of exception
            return view("errors.tablenotfound");
        }
    }
    function feed()
    {
        $posts = post::where("nature", "post")->get();
        return view("feed", compact("posts"));

    }
    function postupload(request $req)
    {
        $id = session()->get("loggeduser")->id;
        $post = new post();
        $post->content = $req->idea;
        $post->nature = "post";
        $post->sup_id = $id;
        $post->save();
        return back();
    }
    //Logout
    function logout()
    {
        if (session()->has("loggeduser")) {
            session()->forget("loggeduser");
            return redirect("index");
        }
    }
}
