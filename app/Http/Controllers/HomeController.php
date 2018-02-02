<?php

namespace App\Http\Controllers;

use App\NotificationModel;
use App\Response;
use Auth;
use DB;
use App\imageId;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $notificationObj=NotificationModel::all();


       // $responseObj=Response::all();
        $responseObj = DB::table('responses')
            ->join('users', 'responses.user_id', '=', 'users.id')
            ->select('responses.*','users.name','users.proPic')
            ->orderBy('id', 'desc')
            ->get();

        //return $responseObj;
        /*$userObject=User::where('id',$id)->first();
        return view('frontEnd.update.loginUpdate',['userInfoById'=>$userObject]);*/
        /*
         *  echo '<pre>';
         print_r();
         exit();
        */
        //$imageid=DB::table('image_ids')
            /*->get();*/
        $imageid=imageId::where('id','2')->first();
        $imageid=imageId::all();
        //return $imageid->imageId;
        $statusData = DB::table('users')
            ->join('statas_posts', 'users.id', '=', 'statas_posts.user_id')
            ->select('statas_posts.*', 'users.name','users.proPic', 'users.email')
            /*->where('id',$id)
                ->first()*/
            ->orderBy('id', 'desc')
            ->paginate(10);
           /* ->get();*/

        /* echo '<pre>';
         print_r($statusData);
         exit();*/
        //return $statusData;
        return view('home', ['statusDataAlls' => $statusData,'imageid' => $imageid,'responseId' => $responseObj]);
    }
}
