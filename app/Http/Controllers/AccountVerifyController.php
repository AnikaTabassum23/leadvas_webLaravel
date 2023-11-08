<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\RegistrationInfo;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use DateTime;
use Redirect;
use Helper;
use Auth;
use DB;
use Hash;

class AccountVerifyController extends Controller{
    
    public function accountVerification(Request $request)
    {
    	$data['title'] = 'Email Verification';
    	$token = $request->user_token;
		$user = RegistrationInfo::where('remember_token', $token)->where('valid', 1)->first();
		if(!empty($user)) {
			//Set Pass
			$data['token'] = $token;
			$data['user'] = $user;
			$data['errorMsg'] = $request->session()->get('errorMsg');
			return view('web.emails.accountVerify', $data);
		} else {
			//Unauthorize Token
			$data['msgTitle'] = "Unauthorized Token!";
			$data['msgDetails'] = "Token is wrong or expired. Please sign up again or contact to administrator.";
            return view('web.emails.errorMessage', $data);
		}
    }

    public function accountVerificationAction(Request $request) {
		// DB::connection()->getPdo();
    	$curDate = new DateTime();
		$curDate = $curDate->format('Y-m-d H:i:s');
    	// $data['title'] = 'Email Verification';
    	$token = $request->user_token;
		$user = User::where('remember_token', $token)->where('valid', 1)->first();

		if(!empty($user)) {
			$validator = Validator::make($request->all(), [
				'password' => 'required|confirmed|min:6'
			]);
			if ($validator->passes()) {
				DB::connection('mysql2')->table("users")->where('id', $user->id)->update([
					'email_verified' => 1,
					'password'       => Hash::make($request->password),
					'updated_at'     => $curDate,
                	"status"           => 'Active',
				]);
				// if (Auth::guard('web')->attempt(['email' => $user->email,'password' => $request->password,])){
					$reg_status=1;


        		if ($reg_status==1){
					$token = JWTAuth::fromUser($user);
					$mainDomainUrl = Helper::mainDomain();
					return redirect($mainDomainUrl.'apps?token='.$token);
				}
			} else {
				return redirect()->route('accountVerification', [$token])->with('errorMsg', 'Password is required and atlist 6 character');
			}
		} else {
			return redirect()->route('accountVerification', [$token])->with('errorMsg', 'Your Token is wrong or expired. Please sign up again or contact to administrator.');
		}
    }

    public function accountVerify()
    {
        $data['title'] = 'Account Verify';
        
        return view('web.accountVerify', $data);
    }


}
