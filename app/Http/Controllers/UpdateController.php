<?php

namespace App\Http\Controllers;
use App\CategoryList;
use App\NotificationModel;
use App\Response;
use App\StatasPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BasicUp;
use App\User;
use App\EduUp;
use App\Notifications;
use DB;
class UpdateController extends Controller
{
    public function upLogin($id){
       // return $email;
        $userObject=User::where('id',$id)->first();
        //$userObject=User::where('id',$id)->get();
//        return $userObject;
       return view('frontEnd.update.loginUpdate',['userInfoById'=>$userObject]);
    }
    public function upBasic($id){
        $BasicObject=BasicUp::where('id',$id)->first();
        if( $BasicObject==null){
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
            return view('frontEnd.update.basicUpdate',['BasicObject'=>$basicObj]);
        }
        return view('frontEnd.update.basicUpdate',['BasicObject'=>$BasicObject]);
    }
    public function upEducation($id){
        $EduObject=EduUp::where('id',$id)->first();
        if( $EduObject==null){
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
            return view('frontEnd.update.eduUpdate',['userInfoById'=>$EduObj]);
        }
    return view('frontEnd.update.eduUpdate',['userInfoById'=>$EduObject]);
    }
    public function upBasicSave(Request $request){
       // return $request->all();
    //return view('frontEnd.update.eduUpdate');
      //  $basicUpObject=new BasicUp();
        $basicUpObject=BasicUp::find($request->id);
    $basicUpObject->livingIn = $request->livingIn;
    $basicUpObject->language = $request->language;
    $basicUpObject->birthdayPlace = $request->birthdayPlace;
    $basicUpObject->status = $request->status;
    $basicUpObject->religion = $request->religion;
    $basicUpObject->bloodGroup = $request->bloodGroup;
    $basicUpObject->socialNetwork = $request->socialNetwork;
    $basicUpObject->address = $request->address;
    $basicUpObject->save();

        $notificationObj=new NotificationModel();
        //$uObj=User::find(Auth::user()->id)->first();
        $uObj= DB::table('users')
            ->where('id', '=',Auth::user()->id)
            ->select('users.*')
            ->first();

        $notificationObj->user_id=Auth::user()->id;
        $notificationObj->user_name=$uObj->name;
        $notificationObj->message=' update profile ';
        $notificationObj->link_id=Auth::user()->id;
        $notificationObj->save();

        //return'Basic info Update successfully';
/*    return redirect('/update/basic')->with('message','Basic info Update successfully');*/
    return redirect('update/basic/'.$request->id)->with('message','Basic info Update successfully');
    }
    public function upEduSave(Request $request){
       // return $request->all();
    //return view('frontEnd.update.eduUpdate');
    //return'Basic info Update successfully';
        /*DB::table('edu_ups')->insert([
            'schools'=>$request->schools,
            'college'=>$request->college,
            'highSchools'=>$request->highSchools,
            'university'=>$request->university,
            'professionalSkills'=>$request->professionalSkills,
            'personalSkills'=>$request->personalSkills,
            'technicalSkills'=>$request->technicalSkills,
            'achievement'=>$request->achievement,
            'others'=>$request->others,
        ]);*/
        $EduBasicUp=EduUp::find($request->id);
        $EduBasicUp->schools = $request->schools;
        $EduBasicUp->college = $request->college;
        $EduBasicUp->highSchools = $request->highSchools;
        $EduBasicUp->university = $request->university;
        $EduBasicUp->professionalSkills = $request->professionalSkills;
        $EduBasicUp->personalSkills = $request->personalSkills;
        $EduBasicUp->technicalSkills = $request->technicalSkills;
        $EduBasicUp->achievement = $request->achievement;
        $EduBasicUp->others = $request->others;
        $EduBasicUp->save();
        $notificationObj=new NotificationModel();
       // $uObj=User::find(Auth::user()->id)->first();
        $uObj= DB::table('users')
            ->where('id', '=',Auth::user()->id)
            ->select('users.*')
            ->first();

        $notificationObj->user_id=Auth::user()->id;
        $notificationObj->user_name=$uObj->name;
        $notificationObj->message=' update profile ';
        $notificationObj->link_id=Auth::user()->id;
        $notificationObj->save();
/*    return redirect('/update/education')->with('message','Education info Update successfully');*/
        return redirect('/update/education/'.$request->id)->with('message','Education info Update successfully');
    }
    public function upLoginSave(Request $request){
       // return $request->all();
    //return view('frontEnd.update.eduUpdate');
    //return'Basic info Update successfully';
       /* dd($request->all());*/
        $userObject2=User::find($request->id);
        $userObject2->name = $request->name;
        $userObject2->email = $request->email;
        $userObject2->gender = $request->gender;
        $userObject2->phone = $request->phone;
        $userObject2->dateOfBirth = $request->date;
        $userObject2->password = bcrypt($request->password);
        $userObject2->save();

        $notificationObj=new NotificationModel();
        //$uObj=User::find(Auth::user()->id)->first();
        $uObj= DB::table('users')
            ->where('id', '=',Auth::user()->id)
            ->select('users.*')
            ->first();

        $notificationObj->user_id=Auth::user()->id;
        $notificationObj->user_name=$uObj->name;
        $notificationObj->message=' update profile ';
        $notificationObj->link_id=Auth::user()->id;
        $notificationObj->save();
    return redirect('/update/login/'.$request->id)->with('message','Info Update successfully');;
    }

    public function deleteUser(Request $request){

        //$imageid=StatasPost::where('user_id',$request->id)->first();
        //imageId::where('imageId',$imageid->imageId)->delete();
        BasicUp::where('id',$request->id)->delete();
        CategoryList::where('user_id',$request->id)->delete();
        EduUp::where('id',$request->id)->delete();
        Response::where('user_id',$request->id)->delete();
        StatasPost::where('user_id',$request->id)->delete();
        User::where('id',$request->id)->delete();
    }
}









