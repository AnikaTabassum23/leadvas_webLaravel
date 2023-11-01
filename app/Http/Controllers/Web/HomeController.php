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
    public function login(Request $request)
    {
        $data['inputData'] = $request->all();
        return view('web.home.login', $data);
    }

}
