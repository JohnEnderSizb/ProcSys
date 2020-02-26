<?php

namespace App\Http\Controllers;

use App\Specification;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index() {
        $specifications = Specification::where('authorisations', '=', 0)
            ->where('authorised_by_assets', '=', 0)
            ->where('ready_for_collection', '=', 0)
            ->where('collected', '=', 0)
            ->get();
        return view('assets', compact('specifications'));
    }

    public function manageShow(Request $request) {
        $specification = Specification::find($request->theID);
        $userName = $specification->user->name;
        $jobTitle = $specification->user->profile->jobTitle;
        return response()->json(['specification' => $specification, 'userName' => $userName, 'jobTitle' => $jobTitle]);
    }

    public function approve(Request $request){
        return response()->json(['status' => 'done']);
    }

    public function decline(Request $request){
        return response()->json(['status' => 'done']);
    }

    public function notAvailable(Request $request){
        return response()->json(['status' => 'done']);
    }
}
