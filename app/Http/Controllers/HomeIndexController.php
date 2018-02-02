<?php

namespace App\Http\Controllers;
use App\imageId;
use DB;
use App\User;
use Illuminate\Http\Request;

class HomeIndexController extends Controller
{
    public function homeIndex(){
        return view('frontEnd.home.HomeIndex');
    }public function signInOut(){
        return view('frontEnd.home.login');
    }
    public function search(Request $request ){
        $term=$request->term;
        $users=User::where('name','LIKE','%'.$term.'%')->orWhere('email','LIKE','%'.$term.'%')->get();
        if(count($users)==0){
            $searchItem[]='No item found';
        }else{
            foreach ($users as $key=>$value){
                $searchItem[]=$value->name;
            }
        }
        return $searchItem;
    }
    public function searchResult(Request $request){
        $searchKey=$request->searchItem;
        $users=User::where('name','LIKE','%'.$searchKey.'%')->orWhere('email','LIKE','%'.$searchKey.'%')->get();
        //$users[]='No item found';
       //return $users->all();
        return view('frontEnd.home.searchList', ['usersall' => $users]);

    }
    public function PostById($id){
        $responseObj = DB::table('responses')
            ->join('users', 'responses.user_id', '=', 'users.id')
            ->select('responses.*','users.name','users.proPic')
            ->where('responses.post_id',$id)
            ->orderBy('id', 'desc')
            ->get();
       // $imageid=imageId::where('id','2')->first();
        $imageid=imageId::all();
        //return $imageid->imageId;
        $statusData = DB::table('users')
            ->join('statas_posts', 'users.id', '=', 'statas_posts.user_id')
            ->select('statas_posts.*', 'users.name','users.proPic', 'users.email')
            ->where('statas_posts.id',$id)
            ->first();

        return view('frontEnd.home.PostById', ['statusDataAll' => $statusData,'imageid' => $imageid,'responseId' => $responseObj]);
    }
    public function allPostById($id){
        $responseObj = DB::table('responses')
            ->join('users', 'responses.user_id', '=', 'users.id')
            ->select('responses.*','users.name','users.proPic')
            ->orderBy('id', 'desc')
            ->get();

        $imageid=imageId::all();
        //return $imageid->imageId;
        $statusData = DB::table('users')
            ->join('statas_posts', 'users.id', '=', 'statas_posts.user_id')
            ->select('statas_posts.*', 'users.name','users.proPic', 'users.email')
            ->where('user_id',$id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('frontEnd.home.allPostById', ['statusDataAlls' => $statusData,'imageid' => $imageid,'responseId' => $responseObj]);


    }
}
