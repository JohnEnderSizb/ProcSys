<?php

namespace App\Http\Controllers;

use App\Deed;
use App\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AssetsController extends Controller
{
    public function index() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 0)
            ->where('ready_for_collection', '=', 0)
            ->where('collected', '=', 0)
            ->get();
        notify()->success('Laravel Notify is awesome!');
        return view('assets.index', compact('specifications'));
    }

    public function declined() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', -1)
            ->get();
        return view('assets.declined', compact('specifications'));
    }

    public function collection() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 1)
            ->where('ready_for_collection', '=', 1)
            ->where('collected', '=', 0)
            ->get();
        return view('assets.collection', compact('specifications'));
    }

    public function collected() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 1)
            ->where('ready_for_collection', '=', 1)
            ->where('collected', '=', 1)
            ->get();
        return view('assets.collected', compact('specifications'));
    }

    public function notAvail() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 1)
            ->where('ready_for_collection', '=', 0)
            ->where('collected', '=', 0)
            ->get();
        return view('assets.notAvail', compact('specifications'));
    }

    public function manageShow(Request $request) {
        $specification = Specification::find($request->theID);
        session(['currentQR' => $specification->id]);
        $userName = $specification->user->name;
        $jobTitle = $specification->user->profile->jobTitle;
        return response()->json(['specification' => $specification, 'userName' => $userName, 'jobTitle' => $jobTitle]);
    }

    public function approve(Request $request){
        $specification = Specification::find($request->theID);
        $specification->authorised_by_assets = True;
        $specification->ready_for_collection = True;
        $specification->save();
        return response()->json(['status' => 'done']);
    }

    public function decline(Request $request){
        $specification = Specification::find($request->theID);
        $specification->authorised_by_assets = -1;
        $specification->ready_for_collection = False;
        $specification->reason_for_decline = $request->reason;
        $specification->save();
        return response()->json(['status' => 'done']);
    }

    public function notAvailable(Request $request){
        $specification = Specification::find($request->theID);
        $specification->authorised_by_assets = 1;
        $specification->ready_for_collection = False;
        $specification->save();
        return response()->json(['status' => 'done']);
    }

    public function markForCollection(Request $request){
        $specification = Specification::find($request->theID);
        $specification->ready_for_collection = True;
        $specification->save();
        return response()->json(['status' => 'done']);
    }

    public function collectApp(Request $request) {
        error_log($request->qrCode);
        $result = DB::table('specifications')->where('id', $request['qrCode'])->value('id');
        if ($result) {
            $specification = Specification::find($result);
            if ($specification->user->email == $request->email) {
                $specification->collected = True;
                $specification->save();
                return response()->json(['outcome' => 'success']);
            }
        }
        return response()->json(['outcome' => 'none']);
    }

    public function appLogin(Request $request) {
        $email = $request->email;
        $password = DB::table('users')->where('email', $email)->value('password');
        if(!$password){
            return response()->json(['outcome' => 'none']);
        }
        if (Hash::check($request->password, $password)) {
            return response()->json(['outcome' => 'success']);
        }
        else {
            return response()->json(['outcome' => 'none']);
        }

    }

    public function collectPaper(Request $request) {
        $specification = Specification::find($request->theID);
        error_log($specification);
        if ($specification) {
            if (Hash::check($request->password, $specification->user->password)) {
                $specification->collected = True;
                $specification->save();
                return response()->json(['outcome' => 'success']);
            }
        }
        return response()->json(['outcome' => 'none']);
    }

    public function collectAppCheck(Request $request) {
        error_log("Checking if phone has scanned...");
        $specification = Specification::find($request->theID);
        if ($specification->collected == True) {
            return response()->json(['outcome' => 'success']);
        }
        return response()->json(['outcome' => 'none']);
    }
}
