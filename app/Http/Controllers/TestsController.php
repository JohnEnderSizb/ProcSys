<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function ajaxTest(){
        return response()->json(array('msg'=> "Today, tomorrow and every single day after that."), 200);
    }
}
