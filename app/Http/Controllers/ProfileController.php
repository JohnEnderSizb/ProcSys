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
            'supervisor' => 'required',
            'authorisations' => 'required',
        ]);

      auth()->user()->profile()->create($validatedData);

      return redirect('/home');
    }
}
