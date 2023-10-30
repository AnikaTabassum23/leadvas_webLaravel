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
use App\Http\Controllers\Controller;
use redirect;
use App\User;




class PlaceOrderController extends Controller {

    public function index() {

       return view("web.placeorder.placeorder");
	}


   

}


