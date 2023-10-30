<style type="text/css">
    .pointer {cursor: pointer;}

</style>
<div class="form-inline">
    <div class="row datatables_header">
        <div class="col-md-5 col-xs-12">
            <div class="input-group">
                <input name="search" event="enter" class="data-search form-control" id="search-input" value="{{@$search}}" kl_virtual_keyboard_secure_input="on" placeholder="Search">
                <span class="input-group-btn"><button name="search" event="click" valueFrom="#search-input" class="data-search btn btn-default" type="button">Go</button></span>
            </div>
        </div>
        <div class="col-md-7 col-xs-12">
            @if($access->create)
            <button class="add-btn btn btn-default pull-right btn-sm" type="button" style="margin-left: 12px;"><i class="glyphicon glyphicon-plus mr5"></i>Add New</button>
            @endif
            @include("perPageBox")
        </div>
    </div>
</div>
<div id=myTabContent2 class=tab-content>
    <div class="tab-pane fade active in" id=home2>
        <div class="form-inline">
            <table cellspacing="0" class="responsive table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="10%">Image</th>
                        <th width="10%" data="2">Code</th>
                        <th width="20%" data="1">Name</th>
                        <th width="10%" >Total Cost (tk)</th>
                        <th width="10%">Total MRP (tk)</th>
                        <th width="10%">Profit %</th>
                        <th width="10%">Cost Setup</th>
                        @if($access->edit || $access->destroy)
                        <th width="5%">Action</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Total Cost (tk)</th>
                        <th>Total MRP (tk)</th>
                        <th>Profit %</th>
                        <th>Cost Setup</th>
                        @if($access->edit || $access->destroy)
                        <th>Action</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $deProducts; ?>
                @if(count($deProducts)>0)  
                @foreach($deProducts as $deProduct)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td><img src="{{asset('public/uploads/deProduct/thumb/'.$deProduct->image)}}" width="50"/></td>
                        <td>{{$deProduct->de_product_code}}</td>
                        <td>{{$deProduct->name}}</td>
                        <td>{{$deProduct->net_cost}}</td>
                        <td>{{$deProduct->total_mrp}}</td>
                        <td>{{$deProduct->profitPercentage}}</td>
                        <td>
                            <input type="hidden" class="cost_id" name="deProduct_id" value="{{$deProduct->id}}">
                            @if($deProduct->costing_status==1)
                            <button class="cost-create-btn go-btn hand btn btn-xs btn-success pl20 pr20 mt5" type="button">Add Cost</button>
                            @else
                            <button class="cost-create-btn go-btn hand btn btn-xs btn-primary pl20 pr20 mt5" type="button">Add Cost</button>
                            @endif
                        </td>

                        @if($access->edit || $access->destroy)
                        <td>@if($access->edit)<i class="fa fa-edit" id="edit" data="{{$deProduct->id}}"></i>@endif @if($access->destroy)<i class="fa fa-trash-o" id="delete" data="{{$deProduct->id}}"></i>@endif</td>
                        @endif
                    </tr>
                @endforeach
                @else    
                    <tr>
                        <td colspan="5" class="emptyMessage">Empty</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    @include("pagination")
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">   
    $(document).ready(function(){
         //details more less
         $(".cost-create-btn").on('click', function(e){
            var cost_id = $(this).closest('tr').find(".cost_id").val();
            $(this).attr('url', 'addCostCreate?cost_id='+cost_id);
        });

        var MORE = "...See More...",
        LESS = " Less...";
        $(function(){
            $("#myTabContent2 .pointer").each(function(){
    
                var $ths = $(this);
                var txt = $ths.text();
                //Clear the text
                $ths.text("");
                //First 100 chars
                var $hide = $ths.append($("<span>").text(txt.substr(0,100)));
                //The rest
                $ths.append($("<span>").text(txt.substr(100, txt.length)).hide());
                //More link
                if (txt.length>100) {
                    $ths.append(
                    $("<a>").text(MORE).click(function(){
                        var $ths = $(this);
                        if($ths.text() == MORE){
                            $ths.prev().show();
                            $ths.text(LESS);
                        }
                        else{
                            $ths.prev().hide();
                            $ths.text(MORE);
                        }
                        })
                    );
                }
                else{
    
                    }
            });
    
        });
    }); 
    
    </script>