<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use DB;
use Auth;
use Helper;
use Hash;
use Validator;
use DateTime;
use DateInterval;
use Str;
use App\Http\Controllers\Controller;
use redirect;
use App\User;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Response;
use Mail;
use App\Mail\UserVerifyEmail;


class UserAccountController extends Controller {

    public function index() {

       return view("web.userAccount.user_account");
	}


    public function user_accountAction(Request $request) {

        // $input = $request->all();
        $user = new User();
        $user->username  = $request->name;
        $user->email     = $request->email;
        $user->mobile    = $request->mobile;
        $user->status    = "active";
        $user->valid     = 1;
        $token           = md5(rand(1, 10). microtime());
        $user->remember_token = $token;
        $user->save();

        $verificationLink = route('setPassword', ['token' => $token]);

        $email_data=[
            'verificationLink'=> $verificationLink,
            'user'=> $user,
        ];
        Helper::mailConfig();

        // Mail::send('web.userAccount.userVerifyMail', ['verificationLink' => $verificationLink,'user'=>$user], function ($message) use ($request) {
        //     $message->to($request->email)->subject('User Verification Mail');
        // });

        Mail::send('web.userAccount.userVerifyMail', $email_data, function($message) use ($request)
        {
            $message->subject('Welcome to DeMeraki. Please confirm your email');
            $message->to($request->email, $request->name);
        });

        return response()->json([
            "status"=> 1,
            "message"=> "Verification Email Sent to your Email.Please Verify to logIn our Website.",
        ]) ;

	}

    public function emailMessage(){
        return view("web.userAccount.email_message");
    }

    public function setPassword(Request $request, $token) {
        $data["token"] = $token;
        $user = User::where("remember_token", $token)->first();
        if($user){
            return view("web.userAccount.set_password",$data);
        }else{
            return "error";
        }

    }

    public function savePassword(Request $request) {

        // dd($token);
       $user = User::where("remember_token", $request->token)->first();
    //    dd($user);
       if($user){
        $user->email_verified = 1;
        $user->remember_token = null;
        $user->password = Hash::make($request->password);
        // dd($user->password);
        $user->save();
        return response()->json([
            'message'=>'Password Saved Successfully',
        ]);
       }else{
            return response()->json([
                'error'=>'User not found',
            ]);
       }



    }





}


