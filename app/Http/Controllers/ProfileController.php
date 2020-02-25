<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function initialize() {

        if (auth()->user()->profile()->where('user_id', auth()->user()->id)->withCount('user')->get()->count() == 1)
        {

            return redirect('/home');

        }

        return view('initialize');
    }

    public function create(Request $request) {
        $validatedData = $request->validate([
            'jobTitle' => 'required',
            'employeenumber' => 'required|unique:profiles',
            'address' => 'required',
            'gender' => 'required',
            'mobilenumber' => 'required',
            'officenumber' => 'required',
            'location' => 'required',
            'supervisor' => '',
            'authorisations' => 'required',
        ]);

      auth()->user()->profile()->create($validatedData);

      return redirect('/home');
    }

    public function storeUpdate(Request $request){

        $validatedData = $request->validate([
            'jobTitle' => 'required',
            'employeenumber' => 'required|unique:profiles',
            'address' => 'required',
            'gender' => 'required',
            'mobilenumber' => 'required',
            'officenumber' => 'required',
            'location' => 'required',
            'supervisor' => '',
            'authorisations' => 'required',
        ]);
        $profile = auth()->user()->profile;
        $profile->update($validatedData);
        return redirect('/home');
    }

    public function update(){
        $profile = auth()->user()->profile;
        return view('profile', compact("profile"));
    }

}
