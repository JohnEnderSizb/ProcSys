<?php

namespace App\Http\Controllers;

use App\AdminAction;
use App\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
    public function index() { //pending
        $specifications = auth()->user()->specifications()
            ->where('authorisations', '>=', 0)
            ->where('authorised_by_assets', '=', 0)
            ->where('ready_for_collection', '=', 0)
            ->where('collected', '=', 0)
            ->paginate(15);
        return view('home.pending',compact('specifications'));
    }

    public function approved() {
        $specifications = auth()->user()->specifications()
            ->where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 1)
            ->where('ready_for_collection', '=', 1)
            ->where('collected', '=', 0)
            ->paginate(15);
        return view('home.approved',compact('specifications'));
    }

    public function collected() {
        $specifications = auth()->user()->specifications()->where('authorisations', '>=', 0)->paginate(15);
        return view('home.collected',compact('specifications'));
    }

    public function rejected() {
        $specifications = auth()->user()->specifications()
            ->where('authorisations', '=', -1)
            ->paginate(15);
        return view('home.rejected',compact('specifications'));
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
        return view('create');
    }

    public function initialize()
    {
        return view('initialize');
    }


    public function store(Request $request)
    {
        $supervisorEmail = DB::table('profiles')->where('user_id', auth()->user()->id)->value('supervisor');
        $supervisorName = DB::table('users')->where('email', $supervisorEmail)->value('name');
        $authorisations = DB::table('profiles')->where('user_id', auth()->user()->id)->value('authorisations');
        if ($supervisorName) $status = "Pending authorisation by ". $supervisorName;
        else $status = "Pending authorisation by ". $supervisorEmail;

        $qr_code = rand(1000000000000000,9999999999999999);
        $qr_code = $qr_code . rand(1000,9999);

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

    public function adminPending()
    {
        $specifications = Specification::where('authorisor', auth()->user()->email)
            ->where('authorisations', '>', 0)
            ->get();
        return view('admin.pending', compact('specifications'));
    }
    public function adminApproved()
    {
        $approvals = AdminAction::where('user_id', auth()->user()->id)
            ->where('authorised', '=', 1)
            ->get();
        return view('admin.approved', compact('approvals'));
    }
    public function adminRejected()
    {
        $approvals = AdminAction::where('user_id', auth()->user()->id)
            ->where('authorised', '=', 0)
            ->get();
        return view('admin.rejected', compact('approvals'));
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
