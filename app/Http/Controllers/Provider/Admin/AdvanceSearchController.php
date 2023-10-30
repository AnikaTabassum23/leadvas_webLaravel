<?php

namespace App\Http\Controllers\Provider\Admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use Helper;
use Validator;
use DateTime;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\costCalculationItem;


class AdvanceSearchController extends Controller
{
    public function getUserItems(Request $request){
        $data = $request->all();
        $productId = $request->productId;
        $mode = $request->mode;
        $search = $request->search;
        $user_type = Auth::guard('provider')->user()->user_type;
        $data['productSearch'] = costCalculationItem::valid()->where('id',$productId)->first();
        return Response::json($data);
        //return view('provider.admin.deProduct.productSearch', $data);

    }
    public function getUserItemsSameProduct(Request $request){
        $data = $request->all();
        $productId = $request->productId;
        $mode = $request->mode;
        $search = $request->search;
        $user_type = Auth::guard('provider')->user()->user_type;
        $data['productSearch'] = costCalculationItem::valid()->get();
        return view('provider.admin.deProduct.productSearch', $data);

    }


}
