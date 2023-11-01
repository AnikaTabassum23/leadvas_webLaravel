<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Helper;
use Validator;
use Mail;

use Illuminate\Http\Request;
use App\Model\RegistrationInfo;



use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'company' => 'required',
    //         'job_title' => 'required',
    //         'employee_range' => 'required',
    //         'mobile' => 'required',
    //         'country' => 'required',
    //         'timezone' => 'required',
    //         'currency' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('demo')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }

    //     $data = $request->all();
    //     // Insert data into the 'registration_info' table
    //     RegistrationInfo::insert(array_merge($data, ['valid' => 1],));

    //     Helper::mailConfig();

    //     Mail::send('web.home.login', $data, function($message) use ($request)
    //     {
    //         $message->subject('Welcome to Leadvas. Please confirm your email');
    //         $message->to($request->email, $request->name);
    //     });
    //     return response()->json([
    //         "status" => 1,
    //         "message" => "Verification Email Sent to your Email. Please Verify to log in to our Website.",
    //     ]);

    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'job_title' => 'required',
            'employee_range' => 'required',
            'mobile' => 'required',
            'country' => 'required',
            'timezone' => 'required',
            'currency' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('demo')
                ->withInput()
                ->withErrors($validator);
        }
        $user = new RegistrationInfo();
        $user->name  = $request->name;
        $user->email     = $request->email;
        $user->company    = $request->company;
        $user->job_title    = $request->job_title;
        $user->employee_range    = $request->employee_range;
        $user->mobile    = $request->mobile;
        $user->country    = $request->country;
        $user->timezone    = $request->timezone;
        $user->currency    = $request->currency;
        $user->valid     = 1;
        $token           = md5(rand(1, 10). microtime());
        $user->remember_token = $token;
        $user->save();
        $data = [
            'token'=> $token
        ];
        Helper::mailConfig();

        Mail::send('web.home.login', $data, function($message) use ($request)
        {
            $message->subject('Welcome to Leadvas. Please confirm your email');
            $message->to($request->email, $request->name);
        });
        // return response()->json([
        //     "message" => "Verification Email Sent to your Email. Please Verify to log in to our Website.",
        // ]);
        return redirect()->route('login');

    }
    
}
