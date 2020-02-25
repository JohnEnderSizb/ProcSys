<?php

namespace App\Http\Controllers;

use App\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
    public function index() {
        $specifications = auth()->user()->specifications()->where('authorisations', '>=', 0)->paginate(15);
        return view('index',compact('specifications'));
    }

    public function view()
    {
        $specifications = auth()->user()->specifications()->where('id', 1)->get();;
        return view('view',compact('specifications'));
    }

    public function viewOne($theID)
    {
        $specifications = auth()->user()->specifications()->where('id', $theID)->get();
        return view('view',compact('specifications'));
    }

    public function test()
    {
        return view('test');
    }

    public function create()
    {
        //dd(auth()->user()->specifications());
        return view('create');
    }

    public function initialize()
    {
        //dd(auth()->user()->specifications());
        return view('initialize');
    }


    public function store(Request $request)
    {
        $supervisorEmail = DB::table('profiles')->where('user_id', auth()->user()->id)->value('supervisor');
        $supervisorName = DB::table('users')->where('email', $supervisorEmail)->value('name');
        $authorisations = DB::table('profiles')->where('user_id', auth()->user()->id)->value('authorisations');
        if ($supervisorName) $status = "Pending authorisation by ". $supervisorName;
        else $status = "Pending authorisation by ". $supervisorEmail;

        auth()->user()->specifications()->create(
            [
                "name" => $request->has('other-toggle') ? $request['other'] : $request['hardcoded'],
                "description" => $request['description'],
                "priority" => $request['priority'],
                "due_date" => $request['due_date'],
                "authorisor" => $supervisorEmail,
                "status" => $status,
                "authorisations" => $authorisations,
                "authorised_by_assets" => False,
                "ready_for_collection" => False,
                "collected" => False,
            ]
        );

        /*
        //$specification = DB::table("specifications")->find($theId->id);
        $specification = Specification::find($theId->id);
        //dd(gettype($specification));

        $specification->authentications()->create(
            [
                "authoriser" => $specification->authoriser,
                "level" => $level,
                "status" => "0",
            ]
        );
        */

        return redirect('/home');
    }


    public function links()
    {
        return view('links');
    }

    public function profile()
    {
        return view('profile');
    }

    public function settings()
    {
        return view('settings');
    }

    public function helpCenter()
    {
        return view('helpCenter');
    }

    public function mail()
    {
        return view('messages');
    }

    public function admin()
    {
        $specifications = Specification::where('authorisor', auth()->user()->email)->where('authorisations', '>', 0)->get();
        return view('admin', compact('specifications'));
    }

    public function statistics()
    {
        return view('statistics');
    }

    public function accountSettings() {
        return view('settings');
    }

}
//Chigadzi
//Policy
/*
 */
