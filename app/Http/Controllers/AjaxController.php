<?php

namespace App\Http\Controllers;

use App\Notifications\Approved;
use App\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function approve(Request $request) {
        $specificationID = $request->specificationID;
        $specification = Specification::find($specificationID);
        $number_of_authorisors = $specification->authorisations;
        if ($number_of_authorisors > 0){
            $number_of_authorisors = $number_of_authorisors - 1;
            $specificationID = $request->specificationID;
            $specification = Specification::find($specificationID);
            if($number_of_authorisors > 0) {
                $supervisor = auth()->user()->profile->supervisor;
                $specification->authorisor = $supervisor;
                $supervisorName = DB::table('users')->where('email', $supervisor)->value('name');
                if ($supervisorName) $specification->status = "Pending authorisation by ". $supervisorName;
                else $specification->status = "Pending authorisation by ". $supervisor;
            }
            else if($number_of_authorisors == 0){
                $specification->status = "Approved by supervisors. Pending authorisation by Assets";

            }
            $specification->authorisations = $number_of_authorisors;
            $specification->save();
            try {
                $specification->user->notify(new Approved($specification->name, auth()->user()->name));
            } catch (Exception $e) {
                //echo 'Caught exception: ',  $e->getMessage(), "\n";
                ;
            }


            auth()->user()->adminActions()->create(
                [
                    "authorisor" => auth()->user()->email,
                    "name" => $specification->name,
                    "description" => $specification->description,
                    "authorised" => True,
                    "employee" => $specification->user->name,
                ]
            );

        }
        return response()->json(['status' => 'done']);
    }

    public function approvet(Request $request) {
        $specificationID = 4;
        $specification = Specification::find($specificationID);
        $supervisor = auth()->user()->profile->supervisor;
        //dd($supervisor);
        $specification->authorisor = $supervisor;
        $specification->save();
        return response()->json(array('msg'=> $specification), 200);
    }

    public function decline(Request $request) {
        $specificationID = $request->specificationID;
        $specification = Specification::find($specificationID);
        $number_of_authorisors = $specification->authorisations;
        if ($number_of_authorisors > 0){
            $specificationID = $request->specificationID;
            $specification = Specification::find($specificationID);
            $supervisor = auth()->user()->profile->supervisor;
            $supervisorName = DB::table('users')->where('email', $supervisor)->value('name');
            if ($supervisorName) $specification->status = "Rejected by ". $supervisorName;
            else $specification->status = "Declined by ". $supervisor;
            $specification->authorisations = (-1);
            $specification->save();

            auth()->user()->adminActions()->create(
                [
                    "authorisor" => auth()->user()->email,
                    "name" => $specification->name,
                    "description" => $specification->description,
                    "authorised" => False,
                    "employee" => $specification->user->name,
                ]
            );
        }
        return response()->json(['status' => 'done']);
    }

    public function updateProfile(Request $request){

    }
}
