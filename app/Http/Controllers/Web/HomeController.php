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
use App\User;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;




class HomeController extends Controller {

    public function index() {

       return view("web.home.home");
	}

    public function demo(Request $request)
    {
        $data['inputData'] = $request->all();
        $data['designations'] = DB::table('designation')
        ->orderBy('designation_name', 'asc')
        ->get();
        $data['employees_range'] = DB::table('employees_range')->get();
        $data['countries'] = DB::table('crm_country')
        ->orderBy('name', 'asc')
        ->get();
        $data['timezones'] = DB::table('timezones')
        ->orderBy('name', 'asc')
        ->get();
        $data['currencies'] = DB::table('crm_currency')->get();
        return view('web.home.baner', $data);
    }
    public function getLogin(Request $request)
    {
        $data['inputData'] = $request->all();
        // $mainDomainUrl = Helper::mainDomain();
        // return redirect()->away($mainDomainUrl);
        return view('web.home.login');
    }
    public function loginAction(Request $request)
    {
        $email = $request->input('email');
        $data = array(
            'email'             => $request->input('email'),
            'password'          => $request->input('password'),
            'email_verified'    => 1,
            'status'            => 'Active',
            'valid'             => 1
        );
        $reg_status=1;
        if ($reg_status==1){
            $user = User::where('email', $email)
                                ->where('valid', 1)
                                ->first();
            $token = JWTAuth::fromUser($user);
            $mainDomainUrl = Helper::mainDomain();
            return redirect($mainDomainUrl.'apps?token='.$token);
        }
        // Using the config function
        // $customGuard = config('auth.guards.custom.driver');
        // OR
        // Using the Auth facade
        // $customGuard = Auth::guard('second_web')->getName();
        // echo "<pre>";
        // print_r ($customGuard);
        // exit();
        // if (Auth::guard('second_web')->attempt($data)) {
        //     $user = User::where('email', $email)
        //                         ->where('valid', 1)
        //                         ->first();
        //     $token = JWTAuth::fromUser($user);
        //     return redirect()->back();
        //     // $mainDomainUrl = Helper::mainDomain();
        //     // return redirect($mainDomainUrl.'login?token='.$token);
        // } else {
        //     return redirect('login')->with('errorMsg', 'Email or Password is wrong');
        // }
    }

}
