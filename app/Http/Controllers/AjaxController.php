<?php

namespace App\Http\Controllers;

use App\Specification;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function approve(Request $request) {
        $specificationID = $request->specificationID;
        $specification = Specification::find($specificationID);
        return response()->json(array('msg'=> $specification), 200);
    }

    public function decline() {

    }
}
