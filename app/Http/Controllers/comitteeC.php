<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\pending;
use App\Models\post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;

class comitteeC extends Controller
{
    function upload()
    {
        return view("committee.upload");
    }
    function supupload(Request $req)
    {
        $req->validate([
            "filename" => "required|mimes:xlsx",
        ]);

        $users = (new FastExcel())->import($req->file("filename"), function (
            $line
        ) {
            $pass = Str::random(8);
            $role = "4";
            return User::updateOrCreate(
                [
                    //This will check update user's data according to its email
                    "email" => $line["email"],
                ],
                [
                    "name" => $line["name"],
                    "email" => $line["email"],
                    "password" => $pass,
                    "role_id" => $role,
                ]
            );
            //Code for sending email
            // foreach ($line as $req) {
            //     //Email Data
            //     $email_data = [
            //         "name" => $req["name"],
            //         "email" => $req["email"],
            //         "password" => $pass,
            //     ];
            //     // send email with the template
            //     Mail::send("email", $email_data, function ($message) use (
            //         $email_data
            //     ) {
            //         $message
            //             ->to($email_data["email"], $email_data["name"])
            //             ->subject("Password For FYPA");
            //     });
            // }
        });
        return back()->with("success", "Supervisors Added Succefully");
    }
    function stdupload(Request $req)
    {
        $req->validate([
            "filename" => "required|mimes:xlsx",
        ]);

        $users = (new FastExcel())->import($req->file("filename"), function (
            $line
        ) {
            $pass = Str::random(8);
            $role = "5";
            $req_limit = "3";

            return User::updateOrCreate(
                [
                    //This will check update user's data according to its email
                    "email" => $line["email"],
                ],
                [
                    "name" => $line["name"],
                    "email" => $line["email"],
                    "grades" => $line["gpa"],
                    "password" => $pass,
                    "role_id" => $role,
                    "req_limit" => $req_limit,
                ]
            );
        });
        return back()->with("success", "Student Added Succefully");
    }
    function pending()
    {
        $user_ids = pending::pluck("to_id")->toArray();
        $users = User::whereIn("id", $user_ids)->get();
        return view("committee.pending", compact("users"));
    }
    function aprove(Request $req)
    {
        $t_id = $req->id;
        $f_id = pending::where("to_id", $t_id)->value("from_id");
        $fg_id = user::where("id", $f_id)->value("group_id");
        $update = user::where("id", $t_id)->update(["group_id" => $fg_id]);
        DB::table("pendings")
            ->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])
            ->delete();
        return back()->with("done", "Supervisor is assigen");
    }
    function decline(Request $req)
    {
        DB::table("pendings")
            ->where("to_id", $req->id)
            ->delete();
        return back()->with("rejected", "Request Rejected");
    }
    function rejected()
    {
        $posts = post::where("nature", "reason")->get();
        return view("committee.rejected", compact("posts"));
    }
}
