<?php

namespace App\Http\Controllers\Provider\ApprovalSystem;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Helper;
use Validator;
use App\Model\Chain_provider;
use App\Model\EmployeeUser_provider;
use App\Model\ServiceCategory_provider;
use App\Model\ServiceRequestedChain_provider; 
use App\Model\ServiceReqApprovedRecord_provider; 
use App\Model\ServiceReqApprovedAttachment_provider; 
use App\Model\PlannerRequest_provider; 
use App\Model\ServiceRequest_provider; 


class PlannerRequestController extends Controller
{
    public function index(Request $request)
    {
        $data['inputData'] = $request->all();
        
        return view('provider.ApprovalSystem.plannerRequest.list', $data);
    }
    
    public function plannerRequestListData(Request $request)
    {
        
        $data = $request->all();
        $search = $request->search;
        $employeeId = Auth::guard('provider')->user()->id;
        $ascDesc = Helper::ascDesc($data, []);
        $paginate = Helper::paginate($data);
        $data['sn'] = $paginate->serial;
        

            $data['plannerRequests'] = $plannerRequests = ServiceRequest_provider::valid()
            ->where('planner_id',$employeeId)
            ->where(function($query) use ($search)
            {
                $query->where('planner_id', 'LIKE', '%'.$search.'%');
            })
            ->orderBy($ascDesc[0], $ascDesc[1])
            ->paginate($paginate->perPage);
            
        return view('provider.ApprovalSystem.plannerRequest.listData', $data);
    }

}
