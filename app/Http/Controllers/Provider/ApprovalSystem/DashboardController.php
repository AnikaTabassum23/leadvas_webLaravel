<?php

namespace App\Http\Controllers\Provider\ApprovalSystem;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    //dashboard
    public function index() {

        return view('provider.ApprovalSystem.welcome');
    }
    
    
    
}
