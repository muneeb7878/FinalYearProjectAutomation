<?php

namespace App\Http\Controllers;

use App\Models\request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\rpool;
use App\Models\group;

class studentC extends Controller
{
    function sendreqi()
    {
        $id = session()->get("loggeduser")->id;
        $check = rpool::where("from_id", "=", $id)->pluck("to_id")->toArray(); 
        $users = User::where("id", "!=", $id)->whereNotIn("id", $check)->get();
        return view("student.sendreq", compact("users"));
    }
    function send(Request $req)
    {
        $f_id = session()->get("loggeduser")->id;
        $req_limit = session()->get("loggeduser")->req_limit;
        if ($req_limit > 0) {
            $update = User::where("id", $f_id)->update([
                "req_limit" => $req_limit - 1,
            ]);
            $pool = new rpool();
            $pool->to_id = $req->id;
            $pool->from_id = $f_id;
            $pool->save();
            return back()->with("requestsent", "Request has sent successfully");
        } else {
            return back()->with(
                "limitfull",
                "Cant send the request your limit is full"
            );
        }
    }
    function receivedreq()
    {
        $id = session()->get("loggeduser")->id;
        $from_id = rpool::where("to_id", "=", $id)->pluck("from_id")->toArray();
        $users = User::whereIn("id", $from_id)->get();
        return view("student.recievedreq", compact("users"));
    }
    function reject(Request $req)
    {
        DB::table("rpools") ->where("from_id", $req->id)->delete(); 
        return redirect("receivedstdreq")->with(
            "declined",
            "Request Declined sucessfully"
        );
    }
    function accept(Request $req)
    {
        $f_id = $req->id;
        $fg_id = user::where("id", $f_id)->value("group_id");
        $t_id = session()->get("loggeduser")->id;
        $tg_id = user::where("id", $t_id)->value("group_id");

        //======= IF BOTH ARE NOT IN ANY GROUP YET
        if (is_null($fg_id) && is_null($tg_id)) {
            $permitted_chars = "0123456789ABCDEFG";
            $group_name = substr(str_shuffle($permitted_chars), 0, 7);
            $group = new group();
            $group->name = $group_name;
            $group->save();
            $group_id = group::where("name", $group_name)->value("id");
            $update = user::where("id", $f_id)->orWhere("id", $t_id)->update(["group_id" => $group_id]);       
            DB::table("rpools")->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])->delete();
            return redirect("receivedstdreq")->with(
                "Accepted",
                "Request Accepted now you both are in same group!"
            );
        }

        //======= IF SENDER IS ALREADY IN THE GROUP BUT RECEIVER IS NOT
        if (!is_null($fg_id) && is_null($tg_id)) {
            $update = user::where("id", $t_id)->update(["group_id" => $fg_id]);

            DB::table("rpools")
                ->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])
                ->delete();
            return redirect("receivedstdreq")->with(
                "Accepted",
                "Request Accepted now you both are in same group!"
            );
        }
        //======= IF SENDER IS NOT IN ANY GROUP BUT RECEIVER IS
        if (!is_null($tg_id) && is_null($fg_id)) {
            $update = user::where("id", $f_id)->update(["group_id" => $tg_id]);

            DB::table("rpools")
                ->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])
                ->delete();
            return redirect("receivedstdreq")->with(
                "Accepted",
                "Request Accepted now you both are in same group!"
            );
        }
        //======= IF BOTH ARE ALREADY IN DIFFERENT GROUPS
        if (!is_null($tg_id) && !is_null($fg_id)) {
            DB::table("rpools")
                ->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])
                ->delete();
            return redirect("receivedstdreq")->with(
                "Already",
                "Grouped Already !"
            );
        }
    }
    function sendsupreq(request $req)
    {
        $std_id = session()->get("loggeduser")->id;
        $group_id = user::where("id", $std_id)->value("group_id");
        if (!is_null($group_id)) {
            $sup_id = $req->id;
            $check = user::where("id", $sup_id)->value("group_id");
            if (!is_null($check)) {
                // If supervisor is already assigned to group
                return redirect("sendreqi")->with(
                    "Assigned",
                    "Already Assigened!"
                );
            } else {
                $f_id = session()->get("loggeduser")->id;
                $pool = new rpool();
                $pool->to_id = $req->id;
                $pool->from_id = $f_id;
                $pool->save();
                return redirect("sendreqi")->with("sent", "Request Sent");
            }
        }
        if (is_null($group_id)) {
            return redirect("sendreqi")->with("gfirst", "Make a group first!");
        }
    }
    function groups()
    {
        $id = session()->get("loggeduser")->id;
        $g_id = user::where("id", $id)->value("group_id");
        $users = User::where("group_id", $g_id)->get();
        return view("group", compact("users"));
    }
}
