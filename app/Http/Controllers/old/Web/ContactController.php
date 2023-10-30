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



class ContactController extends Controller {

    public function index() {

       return view("web.contact.contact");
	}



}
