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
use Str;
use Exception;

class JwtTokenInfoController extends Controller{
    
    public function jwtTokenToUserInfo(Request $request)
    {
		if(empty(request()->bearerToken())){
			return $this->checkAuthGuard($request, $next);
		}
		
        try {	
			$user = JWTAuth::parseToken()->authenticate();	
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
 
        return response()->json(['status' => 1, 'user' => $user]);
    }
	

}
