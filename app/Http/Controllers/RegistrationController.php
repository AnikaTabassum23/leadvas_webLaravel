<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Helper;
use Validator;
use Mail;

use Illuminate\Http\Request;
use App\Model\RegistrationInfo;
use App\User;


use Tymon\JWTAuth\Facades\JWTAuth;

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
        if ($validator->passes()) {
                $existingUser = RegistrationInfo::where('email', $request->email)->first();
            
            if ($existingUser) {
                return redirect()->back()->with('error', 'Email address already exists.');
            } else {
                $user = new RegistrationInfo();
                $user->name  = $request->name;
                $user->email = $request->email;
                $user->company = $request->company;
                $user->job_title = $request->job_title;
                $user->employee_range = $request->employee_range;
                $user->mobile = $request->mobile;
                $user->country = $request->country;
                $user->timezone = $request->timezone;
                $user->currency = $request->currency;
                $user->status = 1; // 'demo' = 1; 'crm' = 2
                $user->valid = 1;
                $token = md5(rand(1, 10) . microtime());
                $user->remember_token = $token;
                $user->save();
        
                $demoUserInfo = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "remember_token" => $token,
                    "timezone_id" => $request->timezone,
                    "registration_id" => $user->id,
                    "email_verified" => 0,
                    "status" => 'Deactive',
                    "valid" => 1
                ]);
            }
            $new_user_info = RegistrationInfo::where('valid', 1)->find($user->id);

            Helper::mailConfig();
            if (!empty($new_user_info)) {
                $email_data['link'] = url('accountVerification', ['token'=>$new_user_info->remember_token]);
            }
            $email_data['data'] = [
                'name'              =>  $request->name,
                'email'             =>  $request->email,
            ];
            Mail::send('web.emails.email_verification', $email_data, function($message) use ($request)
            {
                $message->subject('Welcome to Leadvas. Please confirm your email');
                $message->to($request->email, $request->name);
            });
            DB::commit();
            $output['messege'] = 'Account Create Successful! You will get email after approved!';
            $output['msgType'] = 'success';
            return redirect()->route('demo')
            ->with('success', 'Account created successfully! You will receive an email after approval.');
        } else {
            // Validation failed, return errors
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }
    }
}
