<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EduUp;
use App\BasicUp;
use App\User;
use DB;
class ProfileController extends Controller
{
    public function index($id){
        $userObject=User::where('id',$id)->first();
        $BasicObject=BasicUp::where('id',$id)->first();
        $EduObject=EduUp::where('id',$id)->first();
       /* $eduBasicObject = EduUp::all();
        $basicBasicObject = BasicUp::all();
        $userBasicObject = User::all();*/
        if( $BasicObject==null && $EduObject==null){
            $basicObj=new BasicUp();
            $basicObj->id = $id;
            $basicObj->livingIn = '';
            $basicObj->language = '';
            $basicObj->birthdayPlace = '';
            $basicObj->status = '';
            $basicObj->religion = '';
            $basicObj->bloodGroup = '';
            $basicObj->socialNetwork ='';
            $basicObj->address = '';
            $basicObj->save();

            $EduObj=new EduUp();
            $EduObj->id = $id;
            $EduObj->schools = '';
            $EduObj->college = '';
            $EduObj->highSchools = '';
            $EduObj->university = '';
            $EduObj->professionalSkills = '';
            $EduObj->personalSkills = '';
            $EduObj->technicalSkills ='';
            $EduObj->achievement = '';
            $EduObj->others = '';
            $EduObj->save();
            return view('frontEnd.update.profile',['eduinfo'=>$EduObj,'basicinfo'=>$basicObj,'userInfo'=>$userObject]);
        }
        elseif( $BasicObject==null && $EduObject!=null){
            $basicObj=new BasicUp();
            $basicObj->id = $id;
            $basicObj->livingIn = '';
            $basicObj->language = '';
            $basicObj->birthdayPlace = '';
            $basicObj->status = '';
            $basicObj->religion = '';
            $basicObj->bloodGroup = '';
            $basicObj->socialNetwork ='';
            $basicObj->address = '';
            $basicObj->save();
            return view('frontEnd.update.profile',['eduinfo'=>$EduObject,'basicinfo'=>$basicObj,'userInfo'=>$userObject]);
        }
        elseif( $BasicObject!=null && $EduObject==null){
            $EduObj=new EduUp();
            $EduObj->id = $id;
            $EduObj->schools = '';
            $EduObj->college = '';
            $EduObj->highSchools = '';
            $EduObj->university = '';
            $EduObj->professionalSkills = '';
            $EduObj->personalSkills = '';
            $EduObj->technicalSkills ='';
            $EduObj->achievement = '';
            $EduObj->others = '';
            $EduObj->save();
            return view('frontEnd.update.profile',['eduinfo'=>$EduObj,'basicinfo'=>$BasicObject,'userInfo'=>$userObject]);
        }
        else
            return view('frontEnd.update.profile',['eduinfo'=>$EduObject,'basicinfo'=>$BasicObject,'userInfo'=>$userObject]);


}
    public function proUp(Request $request){
        if($request->hasFile('Prophoto')){
            $userObj=User::find($request->userId);

            $name = $request->Prophoto->getClientOriginalName();
            $uploadPath = 'User/image/';
            $request->Prophoto->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
            $userObj->proPic= $imageUrl;
            $userObj->save();
            return redirect()->to('profile/'.$request->userId);
        }else{
            return redirect()->to('profile/'.$request->userId);
        }

    }
    public function gallery($id){
        $imageData = DB::table('users')
            ->join('statas_posts', 'users.id', '=', 'statas_posts.user_id')
            ->join('image_ids', 'image_ids.imageId', '=', 'statas_posts.imageId')
            ->select('image_ids.upload_photo','statas_posts.post_time','statas_posts.status')
            ->where('users.id',$id)
            ->distinct()
            ->get();
        //return  $imageData;
        return view('frontEnd.home.gallery',['imageDatas'=>$imageData]);

    }
}
