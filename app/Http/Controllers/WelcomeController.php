<?php

namespace App\Http\Controllers;

use App\OthersComment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        return view('frontEnd.home.welcome');
    }
    public function OutCustomar(Request $request){

        $othersObj=new OthersComment();
        $othersObj->name=$request->name;
        $othersObj->email=$request->email;
        $othersObj->comment=$request->comment;
        $othersObj->save();
    }
}
