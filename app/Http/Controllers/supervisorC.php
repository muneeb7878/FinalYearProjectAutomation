<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\post;
use App\Models\rpool;
use App\Models\pending;

use function PHPUnit\Framework\isNull;

class supervisorC extends Controller
{
    function request()
    {
        $id = session()->get("loggeduser")->id;
        $from_id = rpool::where("to_id", "=", $id)
            ->pluck("from_id")
            ->toArray();
        $users = User::whereIn("id", $from_id)->get();
        return view("supervisor.suprequest", compact("users"));
    }

    function accept(request $req)
    {
        $f_id = $req->id;
        $t_id = session()->get("loggeduser")->id;
        $check = pending::where("to_id", $t_id)->value("id");
        if ($check == null) {
            $pending = new pending();
            $pending->to_id = $t_id;
            $pending->from_id = $f_id;
            $pending->save();
            DB::table("rpools")
                ->where([["from_id", "=", $f_id], ["to_id", "=", $t_id]])
                ->delete();
            return back()->with(
                "transfered",
                "Request is transfered to comittee for aprovals"
            );
        } elseif ($check != null) {
            return back()->with(
                "wait",
                "Wait for the approval/rejection of previous request"
            );
        }
    }
    function reject(request $req)
    {
        DB::table("rpools")
            ->where("from_id", $req->id)
            ->delete();
        return redirect("reasonpage");
    }
    function reasonpage()
    {
        return view("supervisor.reason");
    }
    function reason(request $req)
    {
        $id = session()->get("loggeduser")->id;
        $post = new post();
        $post->content = $req->content;
        $post->nature = "reason";
        $post->sup_id = $id;
        $post->save();
        return redirect('suprequest')->with("rejected", "Request rejected successfully");
    }
}
