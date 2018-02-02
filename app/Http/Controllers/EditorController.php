<?php

namespace App\Http\Controllers;

use App\BasicUp;
use App\CategoryList;
use App\EduUp;
use App\Response;
use App\StatasPost;
use App\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{    /**
 * Create a new controller instance.
 *
 * @return void
 */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('editor',['except'=>'shareAdmin']);
    }
    public function index(){

        return view('admin.editor');
    }
    public function shareAdmin(){

        $userObj=User::all();
        return view('admin.share',['userAll'=>$userObj]);

    }


}
