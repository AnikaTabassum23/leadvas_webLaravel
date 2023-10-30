<?php

namespace App\Http\Controllers\Provider\Admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use Helper;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\AdminDesignation;
use App\Model\ServiceCategory_provider;
use App\Model\EmployeeUser_provider;
use App\Model\ActionPlanners_provider;
use App\Model\DeProduct;
use App\Model\costCalculationItem;
use App\Model\ProductWiseCostMaster;
use App\Model\ProductWiseCostDetails;
use App\Model\TargetPercentage;
use App\Model\CategoryItem;

class deProductController extends Controller
{
    public function index(Request $request)
    {
        $data['inputData'] = $request->all();
        
        return view('provider.admin.deProduct.list', $data);
    }

    public function deProductListData(Request $request) {
        $data = $request->all();
        $search = $request->search;
        $data['access'] = Helper::providerUserPageAccess($request);
        $ascDesc = Helper::ascDesc($data, []);
        $paginate = Helper::paginate($data);
        $data['sn'] = $paginate->serial;

        $data['deProducts'] = DeProduct::valid()
            ->where(function($query) use ($search)
            {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orderBy($ascDesc[0], $ascDesc[1])
            ->paginate($paginate->perPage);

        return view('provider.admin.deProduct.listData', $data);
    }

    public function create(Request $request)
    {
        $data['inputData'] = $request->all();
        return view('provider.admin.deProduct.create', $data);
    }


    public function store(Request $request)
    {
        $output = array();
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        
        $imageData = $request->thumbnail;
        
        if ($imageData != "") {
            //------------------Thumb Upload-------------------
            $image_name=time().'.png';
            $path='/uploads/deProduct/';
            $crop_image_data=$request->thumbnail;
            $real_image_data=$request->real_image;
            
            Helper::ThumbcropWithRealImage($image_name,$path,$crop_image_data,$real_image_data);
            //------------------End Thumb Upload-------------------

            if ($validator->passes()) {
                DeProduct::create([
                    "image"             => $image_name,
                    'thumbnail'         => $image_name,
                    'name'              => $request->name,
                    'description'       => $request->description,
                    'de_product_code'       => $request->product_code
                    //'de_product_code'   => Helper::getProductCode('de_product')
                ]);
                $output['messege'] = 'Product has been created';
                $output['msgType'] = 'success';
            } else {
                $output = Helper::vError($validator);
            }
        }else{
            $output['messege'] = 'Image is empty';
            $output['msgType'] = 'danger'; 
        }

        echo json_encode($output);
    }

    public function edit($id)
    {
        $data['employees'] = EmployeeUser_provider::valid()->get();
        $data['deProduct'] = DeProduct::valid()->find($id);
        return view('provider.admin.deProduct.update', $data);
    }

    public function update(Request $request, $id)
    {
        $output = array();
        $input = $request->all();
        $New_employee_arr = $request->employee_id;
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);

        $imageData = $request->thumbnail;

        if ($imageData != "") {
            //------------------Thumb Upload-------------------
            $image_name=time().'.png';
            $path='/uploads/deProduct/';
            $crop_image_data=$request->thumbnail;
            $real_image_data=$request->real_image;
            
            Helper::ThumbcropWithRealImage($image_name,$path,$crop_image_data,$real_image_data);
            //------------------End Thumb Upload-------------------

            if ($validator->passes()) {
                DeProduct::valid()->find($id)->update([
                    "image"       =>$image_name,
                    'thumbnail'   =>$image_name,
                    'name'        => $request->name,
                    'description' => $request->description
                ]);
                $output['messege'] = 'Product has been updated';
                $output['msgType'] = 'success';
            } else {
                $output = Helper::vError($validator);
            }
        }else{
            $output['messege'] = 'Image is empty';
            $output['msgType'] = 'danger'; 
        }
        
        echo json_encode($output);
    }

    public function destroy($id)
    {
        DeProduct::valid()->find($id)->delete();
    }

    public function addCostCreate(Request $request)
    {
        $data['costCalculationItems'] = costCalculationItem::valid()
            ->get();
        $data['costCategoryItems'] = CategoryItem::valid()
            ->get();
        $data['product_id'] = $request->cost_id;
        $data['targetPercentage'] = TargetPercentage::valid()->first();
        $data['deProduct'] = DeProduct::valid()->find($request->cost_id);
        $productWiseCostMaster = ProductWiseCostMaster::valid()->where('product_id',$request->cost_id)->first();
        
        if(!empty($productWiseCostMaster)){

          

            $sql='SELECT a.id,a.total_price,b.quantity,c.name as item_name,b.price,b.product_subtotal_price,b.remarks,b.item,b.category as category_item,c.unit
            FROM `product_wise_costing_master` as a,product_wise_costing_details as b,cost_calculation_item c
            where a.id=b.product_wise_costing_master_id and b.item=c.id and a.valid=1 and b.valid=1 and b.product_wise_costing_master_id='.$productWiseCostMaster->id;

            $data['productWiseCostMaster'] = $productWiseCostMaster = DB::select($sql);
           
   

            // $data['productWiseCostMaster']= $productWiseCostMaster = ProductWiseCostMaster::join('cost_calculation_item','cost_calculation_item.id','=','product_wise_costing_master.item')
            // ->join('product_wise_costing_details','product_wise_costing_details.product_wise_costing_master_id','=','product_wise_costing_master.id')
            // ->select('product_wise_costing_master.id','product_wise_costing_master.total_price as total_price','product_wise_costing_details.quantity','cost_calculation_item.name as item_name', 'product_wise_costing_details.price', 'product_wise_costing_details.product_subtotal_price','product_wise_costing_details.remarks','product_wise_costing_details.item','product_wise_costing_details.category as category_item','cost_calculation_item.unit','product_wise_costing_details.product_subtotal_price')
            // ->where('product_wise_costing_details.product_wise_costing_master_id',$productWiseCostMaster->id)
            // ->where('product_wise_costing_details.valid',1)
            // ->where('product_wise_costing_master.valid',1)
            // ->get();

            return view('provider.admin.deProduct.addCostUpdate', $data);
        }else{
            return view('provider.admin.deProduct.addCostCreate', $data);
        }
    }
    public function addCostCreateAction(Request $request)
    {
        $output = array();
        $input =  $request->all();
        $items   = array_filter($request->item);
        $quantity     = $request->quantity;
        $category     = $request->category;
        $price        = $request->purchase_price;
        $remarks        = $request->remarks;
        $product_id        = $request->product_id;
        $validator = [
            'product_id' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
        ];
        $validator = Validator::make($input, $validator);
            if ($validator->passes()) {
                DB::beginTransaction();

                $product_wise_costing_master = [
                    'product_id'                => $request->product_id,
                ];
                
                $product_wise_costing_master_id = ProductWiseCostMaster::create($product_wise_costing_master);
                $total_amount = 0;
                foreach($items as $key=>$item) {
                    $costing_details = [
                        'product_wise_costing_master_id' => $product_wise_costing_master_id->id,
                        'item'                           => $item,
                        'category'                       => $category[$key],
                        'quantity'                       => $quantity[$key],
                        'price'                          => $price[$key],
                        'remarks'                        => $remarks[$key]
                    ];

                    $total_amount += ($price[$key] * $quantity[$key]);
                    $amount = [
                        'product_subtotal_price' => ($price[$key] * $quantity[$key]),
                    ];
                    $product_wise_costing_details =  array_merge($costing_details,$amount);
            
                    ProductWiseCostDetails::create($product_wise_costing_details);
                }
                ProductWiseCostMaster::valid()->find($product_wise_costing_master_id->id)->update([
                    'total_price' => $total_amount,
                ]);
                DeProduct::find($product_id)->update([
                    'costing_status' => 1,
                    'net_cost'         => $total_amount,
                    'target_profit'    => $request->target_profit,
                    'target_mrp'       => $request->target_mrp,
                    'total_mrp'        => $request->total_mrp,
                    'profitPercentage' => $request->profitPercentage,
                ]);
                $output['messege'] = 'Costing  has been created';
                $output['msgType'] = 'success'; 
                DB::commit();

            } else {
                $output = Helper::vError($validator);
            }
        echo json_encode($output); 
    }
    public function addCostUpadteAction(Request $request)
    {
        $output = array();
        $input =  $request->all();
        $items   = array_filter($request->item);
        $quantity     = $request->quantity;
        $category     = $request->category;
        $price        = $request->purchase_price;
        $remarks        = $request->remarks;
        $product_id        = $request->product_id;
        $validator = [
            'product_id' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
        ];
        $validator = Validator::make($input, $validator);
        if ($validator->passes()) {
            DB::beginTransaction();
            $productWiseCostMaster = ProductWiseCostMaster::valid()->where('product_id',$product_id)->first();
            ProductWiseCostMaster::find($productWiseCostMaster->id)->forceDelete();

            $existing_item = ProductWiseCostDetails::valid()
                    ->where('product_wise_costing_master_id',$productWiseCostMaster->id)
                    ->get()
                    ->pluck('id');
            foreach($existing_item as $key => $item){
                ProductWiseCostDetails::find($item)->forceDelete();
            }
            $product_wise_costing_master = [
                'product_id'                => $request->product_id,
            ];
            
            $product_wise_costing_master_id = ProductWiseCostMaster::create($product_wise_costing_master);
            $total_amount = 0;
            foreach($items as $key=>$item) {
                $costing_details = [
                    'product_wise_costing_master_id' => $product_wise_costing_master_id->id,
                    'item'                           => $item,
                    'category'                       => $category[$key],
                    'quantity'                       => $quantity[$key],
                    'price'                          => $price[$key],
                    'remarks'                        => $remarks[$key]
                ];

                $total_amount += ($price[$key] * $quantity[$key]);
                $amount = [
                    'product_subtotal_price' => ($price[$key] * $quantity[$key]),
                ];
                $product_wise_costing_details =  array_merge($costing_details,$amount);
        
                ProductWiseCostDetails::create($product_wise_costing_details);
            }
            ProductWiseCostMaster::valid()->find($product_wise_costing_master_id->id)->update([
                'total_price' => $total_amount,
            ]);
            DeProduct::find($product_id)->update([
                'costing_status' => 1,
                'net_cost'         => $total_amount,
                'target_profit'    => $request->target_profit,
                'target_mrp'       => $request->target_mrp,
                'total_mrp'        => $request->total_mrp,
                'profitPercentage' => $request->profitPercentage,
            ]);
            $output['messege'] = 'Costing  has been created';
            $output['msgType'] = 'success'; 
            DB::commit();

        } else {
            $output = Helper::vError($validator);
        }
        echo json_encode($output);
    }
}
