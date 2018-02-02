<?php

namespace App\Http\Controllers;

use App\CategoryList;
use App\imageId;
use App\NotificationModel;
use App\Response;
use App\User;
use Auth;
use DB;
use App\StatasPost;
use Illuminate\Http\Request;

class Status_postController extends Controller
{


    public function statusUp(Request $request)
    {
        $i=substr(md5(time()), 0, 11);

       // return $request->all();

        $this->validate($request, [
            'upload_photo.*' => 'image|max:1024',
            //'status'=>'required',
        ]);


        if($request->hasFile('upload_photo'))
        {

            foreach ($request->upload_photo as $file){
                 $filename=$file->getClientOriginalName();
                 print_r($filename.'<br>');
                $name = $file->getClientOriginalName();
                $uploadPath = 'User/image/';
                $file->move($uploadPath, $name);
                $imageUrl = $uploadPath . $name;
                //$this->saveFunction($request, $imageUrl);

                $imageIdObj=new imageId();
                //$statusObj->imageId = $i;
                $imageIdObj->upload_photo=$imageUrl;
                $imageIdObj->imageId=$i;
                $imageIdObj->save();
            }
            $statusObj = new StatasPost();
            $statusObj->user_id = Auth::user()->id;
            $statusObj->status = $request->status;
            $statusObj->whoSee = $request->whoSee;
            $statusObj->option = $request->option;
            $statusObj->upload_photo = '';
            $statusObj->anonymous = $request->anonymous;
            $statusObj->post_time = date("Y-m-d (h:i:sa)");
            $statusObj->imageId = $i;
            $statusObj->save();

            $categoryListAddByuser = new CategoryList();
            $categoryListAddByuser->user_id = Auth::user()->id;
            $categoryListAddByuser->Category_name = $request->option;
            $categoryListAddByuser->save();


            $notificationObj=new NotificationModel();
            //$uObj=User::find( Auth::user()->id )->first();
            $uObj= DB::table('users')
                ->where('id', '=',Auth::user()->id)
                ->select('users.*')
                ->first();

            $sPObj= DB::table('statas_posts')
                ->where('user_id', '=',Auth::user()->id)
                ->where('status', '=',$request->status)
                ->where('post_time', '=',$statusObj->post_time)
                ->select('statas_posts.*')
                ->first();


            $notificationObj->user_id=Auth::user()->id;
            $notificationObj->user_name=$uObj->name;
            $notificationObj->message=' update a status ';
            $notificationObj->link_id=$sPObj->id;
            $notificationObj->anonymous=$request->anonymous;
            $notificationObj->time=$statusObj->post_time;
            $notificationObj->save();

            return redirect('/home');




        }
        else{

            $imageUrl = '';
            /*$this->saveFunction($request, $imageUrl);*/
            $statusObj = new StatasPost();
            $imageIdObj=new imageId();

            $statusObj->user_id = Auth::user()->id;
            $statusObj->status = $request->status;
            $statusObj->whoSee = $request->whoSee;
            $statusObj->option = $request->option;
            $statusObj->upload_photo = $imageUrl;
            $statusObj->anonymous = $request->anonymous;
            $statusObj->post_time = date("Y-m-d (h:i:sa)");
            //$statusObj->imageId = substr(md5(time()), 0, 11);
            $statusObj->imageId =$i;
            $imageIdObj->upload_photo=$statusObj->upload_photo;
            $imageIdObj->imageId=$statusObj->imageId;
            $statusObj->save();
            $imageIdObj->save();

            $categoryListAddByuser = new CategoryList();
            $categoryListAddByuser->user_id = Auth::user()->id;
            $categoryListAddByuser->Category_name = $request->option;
            $categoryListAddByuser->save();
            $notificationObj=new NotificationModel();
            $uObj= DB::table('users')
                ->where('id', '=',Auth::user()->id)
                ->select('users.*')
                ->first();

            $sPObj= DB::table('statas_posts')
                ->where('user_id', '=',Auth::user()->id)
                ->where('status', '=',$request->status)
                ->where('post_time', '=',$statusObj->post_time)
                ->select('statas_posts.*')
                ->first();


            $notificationObj->user_id=Auth::user()->id;
            $notificationObj->user_name=$uObj->name;
            $notificationObj->message=' update a status ';
            $notificationObj->link_id=$sPObj->id;
            $notificationObj->anonymous=$request->anonymous;
            $notificationObj->time=$statusObj->post_time;
            $notificationObj->save();

            return redirect('/home');

         }

        /*$image = $request->file('upload_photo');
        if ($image == null) {
            $imageUrl = '';
        } else {
            $name = $image->getClientOriginalName();
            $uploadPath = 'User/image/';
            $image->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        }*/





    }

    /*protected function saveFunction($request, $imageUrl)
    {

        $statusObj = new StatasPost();
        $imageIdObj=new imageId();
        $statusObj->user_id = Auth::user()->id;
        $statusObj->status = $request->status;
        $statusObj->whoSee = $request->whoSee;
        $statusObj->option = $request->option;
        $statusObj->upload_photo = $imageUrl;
        $statusObj->anonymous = $request->anonymous;
        $statusObj->post_time = date("Y-m-d (h:i:sa)");
        //$statusObj->imageId = substr(md5(time()), 0, 11);
        $statusObj->imageId = $i;
        $imageIdObj->upload_photo=$statusObj->upload_photo;
        $imageIdObj->imageId=$statusObj->imageId;
        $statusObj->save();
        $imageIdObj->save();

    }*/

    public function statusDelete($id)
    {

        $statusObj = StatasPost::find($id);
        $statusById1 = StatasPost::where('id',$id)->first();
        $ImageId = $statusById1->imageId;
        $imageidObj = imageId::where('imageId',$ImageId)->get();
        $theDefaults = array();
        foreach($imageidObj as $v) {
            $theDefaults[$v->id] = $v->upload_photo;
        }
        //return $theDefaults;
       /* print_r($theDefaults);
        exit();*/
        //$oldImageUrl1 = $statusById1->upload_photo;
        if($imageidObj !=null){
            try{
                foreach ($theDefaults as $imageid ){
                    unlink($imageid);
                }
            }catch (\Exception $e){
                $statusObj->delete();
                imageId::where('imageId', $ImageId)->delete();
                return redirect('/home');
            }
        }

        /*if($oldImageUrl1 !=null){
            try{
                unlink($oldImageUrl1);
            }catch (\Exception $e){
                $statusObj->delete();
                return redirect('/home');
            }

        }*/
        imageId::where('imageId', $ImageId)->delete();
        $statusObj->delete();
        return redirect('/home');
    }

    public function statusEdit($id)
    {

        $statusObj = StatasPost::where('id', $id)->first();
        $userId = $statusObj->user_id;
        $imageId = $statusObj->	imageId;
        $userObj = User::where('id', $userId)->first();
        $imageObject = imageId::where('imageId', $imageId)->get();
        /*echo '<pre>';
        print_r($statusObj);
        exit();*/
        return view('frontEnd.home.statusEdit', ['StatusById' => $statusObj, 'StatusByUser' => $userObj, 'StatusByImage' => $imageObject,]);
    }

    public function statusUpdate(Request $request)
    {
        if($request->hasFile('upload_photo'))
        {
            $statusById = StatasPost::where('id', $request->Statusid)->first();
            $i=substr(md5(time()), 0, 11);
            $this->validate($request, [
                'upload_photo.*' => 'image|max:1024',
                //'status'=>'required',
            ]);

            $ImageId=$statusById->imageId;
            $imageidObj = imageId::where('imageId',$ImageId)->get();
            $theDefaults = array();
            foreach($imageidObj as $v) {
                $theDefaults[$v->id] = $v->upload_photo;
            }
            if($imageidObj !=null){
                try{
                    foreach ($theDefaults as $imageid ){
                        unlink($imageid);
                    }
                    imageId::where('imageId', $ImageId)->delete();
                }catch (\Exception $e){
                    imageId::where('imageId', $ImageId)->delete();
                }
            }


            foreach ($request->upload_photo as $file){
                $name = $file->getClientOriginalName();
                $uploadPath = 'User/image/';
                $file->move($uploadPath, $name);
                $imageUrl = $uploadPath . $name;
                $imageIdObj=new imageId();
                $imageIdObj->upload_photo=$imageUrl;
                $imageIdObj->imageId=$i;
                $imageIdObj->save();
            }
            $statusObj=StatasPost::find($request->Statusid);
            $statusObj->user_id = $request->userId;
            $statusObj->status = $request->status;
            $statusObj->whoSee = $request->whoSee;
            $statusObj->option = $request->option1;
            $statusObj->imageId = $i;
            $statusObj->anonymous = $request->anonymous;
            $statusObj->post_time = date("Y-m-d (h:i:sa)");
            $statusObj->save();




            return redirect('/home');
        }
        else{
            $statusObj=StatasPost::find($request->Statusid);
            $statusObj->user_id = $request->userId;
            $statusObj->status = $request->status;
            $statusObj->whoSee = $request->whoSee;
            $statusObj->option = $request->option1;
            $statusObj->anonymous = $request->anonymous;
            $statusObj->post_time = date("Y-m-d (h:i:sa)");
            $statusObj->save();




            return redirect('/home');
        }

       // $imageUrl = $this->imageExistStatus($request);


    }

    private function imageExistStatus($request)
    {/*


        if ($statusImage) {
            $oldImageUrl = $statusById->upload_photo;
            unlink($oldImageUrl);
            $name = $statusImage->getClientOriginalName();
            $uploadPath = 'User/image/';
            $statusImage->move($uploadPath, $name);

            $imageUrl = $uploadPath . $name;
        } else {
            $imageUrl = $statusById->upload_photo;
        }
        return $imageUrl;*/
    }

    public function responseCreate(Request $request){
        $responseObj=new Response();
        $responseObj->user_id=$request->user_id;
        $responseObj->post_id=$request->post_id;
        $responseObj->post_time=date("Y-m-d (h:i:sa)");
        $responseObj->Response=$request->text;
        $responseObj->anonymous=$request->responseAnonymous;
        $responseObj->save();


        $notificationObj=new NotificationModel();
        //$statusPostObj=StatasPost::find($request->post_id)->first();
        $statusPostObj= DB::table('statas_posts')
            ->where('id', '=',$request->post_id)
            ->select('statas_posts.*')
            ->first();


        $uObj= DB::table('users')
            ->where('id', '=',$request->user_id)
            ->select('users.*')
            ->first();


        $notificationObj->user_id=$request->user_id;
        $notificationObj->user_name=$uObj->name;
        $notificationObj->message=' update a response ';
        $notificationObj->link_id=$request->post_id;
        $notificationObj->anonymous=$request->responseAnonymous;
        $notificationObj->time=$responseObj->post_time;

        $notificationObj->form=$statusPostObj->user_id;
        $notificationObj->save();


        //return $request->all();
        return 'Done';
    }
    public function responseUpdate(Request $request){

        $responseObj=Response::find($request->id);
        $responseObj->Response=$request->value;
        $responseObj->post_time=date("Y-m-d (h:i:sa)");
        $responseObj->anonymous=$request->responseAnonymous;
        $responseObj->save();
       // return 'Done';
    }

    public function responseDelete(Request $request){
        Response::where('id',$request->id)->delete();
    }
}
