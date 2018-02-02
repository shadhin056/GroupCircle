<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\verifyEmail;
use phpDocumentor\Reflection\Types\Null_;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           /* 'name' => 'required|alpha|max:33|min:3',*/
          /*  only allows letters, hyphens and spaces explicitly*/
            'name' => 'required|max:33|min:3|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|digits_between:0001,9999999999999',
            'date' => 'required|date|before:14 years ago',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        Session::flash('status','Registered ! But verify your email to active your account');
        $user= User::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'dateOfBirth' => $data['date'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verifyToken'=> Str::random(40),
        ]);
        $thisUser=User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }
    public function sendEmail($thisUser){
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }
  /*  public function verifyEmailFirst(){
        return view('verifyEmail');
    }*/
    public function sendEmailDone($email,$verifyToken){
    $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
    if($user){
         user::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['statusVerify'=>1,'verifyToken'=>NULL]);
       // $this->guard()->login($user);
        Session::flash('status','Registered ! Successfully verified your Email');
        return redirect(route('login'));
    }else{
        Session::flash('status','Already Registered Or User Not Found');
        return redirect(route('login'));
    }

    }}
