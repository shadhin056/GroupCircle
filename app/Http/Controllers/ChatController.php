<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\NotificationModel;
use App\PrivateChat;
use App\User;
use DB;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){

        return view('newPage.chat');
    }
    public function chat(){
        return view('newPage.chat');
    }
    /*public function send(){
        $message='ami k';
        $user =User::find(Auth::id());
        event(new ChatEvent($message,$user));
    }*/
    public function send(Request $request){
        //return $request->all();
        $user =User::find(Auth::id());
        $this->saveToSession($request);

        event(new ChatEvent($request->message,$user));
    }
    public function saveToSession(request $request)
    {
        session()->put('chat',$request->chat);
    }
    public function getOldMessage()
    {
        return session('chat');
    }
    public function privateChat($id){

            //$u= Auth::user()->id;
        //$chatData=PrivateChat::where('toId',$this->id)->get();
        //$chatData=PrivateChat::where('toId',$id)->get();
        $userName=User::where('id',$id)->first();
        $chatData= DB::table('private_chats')
            ->where('toId', '=',$id)
            ->where('FormId', '=',Auth::user()->id)
            ->orWhere('toId', '=',Auth::user()->id)
            ->Where('FormId', '=',$id)
            ->select('private_chats.*')
            ->orderBy('id', 'desc')
            ->get();
        //return $chatData->all();

        if(count($chatData)==0){
            $userObject1=User::where('id',$id)->first();
            $userObject2=User::where('id',Auth::user()->id)->first();
            $cEnter=new PrivateChat();
            $cEnter->toId=$userObject1->id;
            $cEnter->toName=$userObject1->name;
            $cEnter->FormId=$userObject2->id;
            $cEnter->FormName=$userObject2->name;
            $cEnter->txt='Welcome';
            $cEnter->time='';
            $cEnter->save();

            $chatData= DB::table('private_chats')
                ->where('toId', '=',$id)
                ->where('FormId', '=',Auth::user()->id)
                ->orWhere('toId', '=',Auth::user()->id)
                ->Where('FormId', '=',$id)
                ->select('private_chats.*')
                ->orderBy('id', 'desc')
                ->get();

            $toUser=User::where('id',$id)->first();
            $userAll=User::all();
            return view('frontEnd.home.chat',['userAll'=>$userAll,'userName'=>$userName,'toUser'=>$toUser,'chatData'=>$chatData,]);
        }
        else{
            $toUser=User::where('id',$id)->first();

            $userAll=User::all();
            return view('frontEnd.home.chat',['userAll'=>$userAll,'userName'=>$userName,'toUser'=>$toUser,'chatData'=>$chatData,]);

        }



    }
    public function pChatUp(Request $request){
        $Pchat=new PrivateChat();
        $Pchat->toId=$request->toText;
        $Pchat->toName=$request->toName;
        $Pchat->FormName=$request->FormName;
        $Pchat->FormId=$request->formText;
        $Pchat->txt=$request->pCText;
        $Pchat->time=date("Y-m-d (h:i:sa)");

        $notificationObj=new NotificationModel();
        $notificationObj->user_id=$request->toText;
        $notificationObj->user_name=$request->FormName;
        $notificationObj->message=' send you a message ';
        $notificationObj->link_id=$request->formText;
        $notificationObj->time=$Pchat->time;
        $notificationObj->save();

        $Pchat->save();

    }


}
