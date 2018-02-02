<?php

namespace App\Http\Controllers;

use App\Admin;
use App\BasicUp;
use App\CategoryList;
use App\EduUp;
use App\imageId;
use App\Response;
use App\role_admin;
use App\StatasPost;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class AdminController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminObj = DB::table('admins')
            ->join('role_admins', 'role_admins.admin_id', '=', 'admins.id')
            ->select('admins.*')
            ->where('role_id',2)
            ->get();


        //$adminObj=Admin::all();

        return view('admin.home',['adminAll' => $adminObj]);
    }
    public function addAdmin(Request $request){
        $objAdmin = new Admin();
        $objAdmin->name=$request->name;
        $objAdmin->phone=$request->phone;
        $objAdmin->email= $request->email;
        $objAdmin->password=bcrypt($request->password);
        $objAdmin->statusVerify=1;
        $objAdmin->save();
        $objAdmin1 = Admin::where('email',$request->email)->first();

        $roleObj = new role_admin();
        $roleObj->role_id=2;
        $roleObj->admin_id=$objAdmin1->id;
        $roleObj->save();
        return 'Done';

    }
    public function deleteAdmin(Request $request){
        Admin::where('id',$request->id)->delete();
        role_admin::where('admin_id',$request->id)->delete();

    }
    public function updateAdmin(Request $request){
        $adminObj = Admin::find($request->id);
        $adminObj->name=$request->name;
        $adminObj->email=$request->email;
        $adminObj->phone=$request->phone;;
        $adminObj->save();
    }

}
