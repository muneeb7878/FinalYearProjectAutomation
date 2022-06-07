<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class admincontroller extends Controller
{
    function create()
    {
        $check = User::where("role_id", "=", 2)->first();

        return view("admin.create", compact("check"));
    }
    function createcomiittee(Request $req)//upload commiittee  data into database
    {
        switch ($req->input("action")) {
            case "makehead": //If make committee head is pressed
                $req->validate([
                    "email" => "unique:users",
                ]);
                $user = new User();
                $user->name = $req->name;
                $user->email = $req->email;
                $pass = Str::random(8); //To genrate randon password of length 8
                $user->password = $pass;
                //$user->password = Hash::make($pass);    //To make password hashed use Hash::make();    (Curentiy this feature is disable for testing purposes)
                $user->role_id = "2";
                $user->save();
                //Email Data
                $email_data = [
                    "name" => $req["name"],
                    "email" => $req["email"],
                    "password" => $pass,
                ];
                // send email with the template
                // Mail::send("email", $email_data, function ($message) use (
                //     $email_data
                // ) {
                //     $message
                //         ->to($email_data["email"], $email_data["name"])
                //         ->subject("Password For FYPA");
                // });

                return back()->with(
                    "success",
                    "Committee head created succefully"
                );
                break;

            case "makemember": //If make committee member is presses
                $req->validate([
                    "email" => "unique:users",
                ]);
                $user = new User();
                $user->name = $req->name;
                $user->email = $req->email;
                $pass = Str::random(8);
                $user->password = $pass;
                //$user->password = Hash::make($pass);
                $user->role_id = "3";
                $user->save();
                //Email Data
                $email_data = [
                    "name" => $req["name"],
                    "email" => $req["email"],
                    "password" => $pass,
                ];
                // send email with the template
                // Mail::send("email", $email_data, function ($message) use (
                //     $email_data
                // ) {
                //     $message
                //         ->to($email_data["email"], $email_data["name"])
                //         ->subject("Password For FYPA");
                // });
                return back()->with(
                    "success",
                    "Committee Member created succefully"
                );

                break;
        }
    }
    function detail()
    {
        $users = User::get();
        return view("admin.cdetails", compact("users"));
        // return User::find(1)->role;
    }
}
