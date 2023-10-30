<style>
    .back-btn{
        margin-top:10px;
    }
    .display_none {
        display: none;
    }
    #dtHorizontalExample_length label{
        display: none;
    }
    #dtHorizontalExample_filter label{
        display: none;
    }
    #dtHorizontalExample_info.dataTables_info{
        display: none;
    }
    #dtHorizontalExample_paginate.dataTables_paginate {
        display: none;
    }
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        /* bottom: .5em; */
        display: none; 
    }
    .glyphicon-ok{
        display: none!important;
    }
    table tbody tr td .has-feedback .form-control {
        padding-right: 15px;
    }
    </style>
    <div class="row printable" id="mainDiv">
        <div class=col-md-12>
            <form type="create" id="productInvoiceFrom" class="form-load form-horizontal mt0" action="{{route('provider.admin.provider.admin.addCostCreateAction')}}" method="POST" callback="refreshArea" autocomplete="off">
                {{csrf_field()}}
                <table id="dtHorizontalExample" class="table table-bordered table-sm input-table">
                    <thead>
                        <tr>
                            <th width="2%">SL.No.</th>
                            <th width="30%">Item Name</th>
                            <th width="20%">Category</th>
                            <th width="8%">Quantity</th>
                            <th width="8%">Unit</th>
                            <th width="10%">Price</th>
                            <th width="9%">Total Price</th>
                            <th width="15%">Remarks</th>
                            <th width="3%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="opportunity_product_plus" class="amountPurpose">
                        <tr class="new_product_row">
                            <td class="td-sn">1</td>
                            <td>
                                <input type="hidden" name="product_id" value={{$product_id}}>
                                <div id="product_src" class="row advance-search" search-url="" search-title="Product Search">
                                    <div class="form-group pl10 mb0">
                                        <div class="col-sm-11 pl15 pr5" id="product_id_view">
                                            <select required name="item[]" id="product_id" data-fv-row=".col-sm-11" data-fv-icon="false" class="product_id select2 form-control adv-search product_select append_option">
                                                <option value="">Select Item</option>
                                                @foreach ($costCalculationItems as $costCalculationItem)
                                                <option value="{{$costCalculationItem->id}}">{{$costCalculationItem->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div style="color:red;display: none;" class="fomr-control" id="hidemassge" > *Allready Selected
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="category_src" class="row advance-search" search-url="" search-title="category Search">
                                    <div class="form-group pl10 mb0">
                                        <div class="col-sm-11 pl15 pr5" id="category_id_view">
                                            <select required name="category[]" id="category_id" data-fv-row=".col-sm-11" data-fv-icon="false" class="category_id select2 form-control adv-search category_select append_option">
                                                <option value="">Select Category</option>
                                                @foreach ($costCategoryItems as $costCategoryItem)
                                                <option value="{{$costCategoryItem->id}}">{{$costCategoryItem->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td id="quantity_td">
                                <div class="form-group pl10 pr10 mb0">
                                    <input required name="quantity[]" id="quantity" class="form-control quantity" placeholder="Qty">
                                    <input type="hidden" id="total_quantity" name="total_quantity">
                                    <input type="hidden" name="product_total_price" class="product_total_price">
                                    <input type="hidden" class="product_price">
                                    <div class="qtyFeedback"></div>
                                    <div class="qtyFeedbackStatus"></div>
                                    <div class="ctn_qty_status" style="display: none;"></div>
                                    <div class="qtyFeedbackStatusvalue" style="display: none;"></div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl10 pr10 mb0">
                                    <input disabled name="unit[]" id="unit" class="form-control " required>

                                </div>
                            </td>
                            <td id="ctn_qty_td">
                                <div class="form-group pl10 pr10 mb0">
                                    <input type="text" name="purchase_price[]" id="purchase_price" placeholder=" Price" class="form-control purchase_price" title="Purchase Price" required data-fv-regexp="true" data-fv-regexp-regexp="^[0-9+\s\.]+$" data-fv-regexp-message="Purchase price can consist of number only">
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl10 pr10 mb0">
                                    <input disabled name="per_product_total[]" placeholder="Total" class="form-control per_product_total" id="per_product_total">
                                    <input type="hidden" class="single_product_total_amount custon_single_p_amount" name="single_product_total_amount[]" id="single_product_total_amount" value="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl10 pr10 mb0">
                                    <textarea name="remarks[]" class="form-control" placeholder="Enter Remarks" rows="1">N/A</textarea>
                                </div>
                            </td>
                            <td class="pub-plus-minus first_plus">
                                <i class="fa fa-plus-square hand pub-plus"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row purchase_bottom">
                    <div class="row">
                        <div class="col-md-7 col-lg-7">
                            <div class="form-group col-lg-12 col-md-12 mt10 pull-right" id="less_box">
                                <label class="col-lg-4 col-md-4 control-label" for="transport_cost">Target Profit %</label>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" id="targetProfit" name="target_profit" placeholder="Transport Cost" kl_virtual_keyboard_secure_input="on" data-fv-regexp="true" data-fv-regexp-regexp="^[0-9+\s\.]+$" data-fv-regexp-message="Amount can consist of number only" value="{{$targetPercentage->percentage}}" readonly>
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-group col-lg-12 col-md-12 mt10 pull-right" id="less_box">
                                <label class="col-lg-4 col-md-4 control-label" for="target_mrp">Target MRP</label>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" id="target_mrp" name="target_mrp" placeholder="Less Amount" kl_virtual_keyboard_secure_input="on" data-fv-regexp="true" data-fv-regexp-regexp="^[0-9+\s\.]+$" data-fv-regexp-message="Amount can consist of number only" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group col-lg-12 col-md-12 mt10 pull-right" id="less_box">
                                <label class="col-lg-4 col-md-4 control-label" for="total_mrp">Total MRP</label>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control total_mrp" id="total_mrp" name="total_mrp" placeholder="Less Amount" kl_virtual_keyboard_secure_input="on" data-fv-regexp="true" data-fv-regexp-regexp="^[0-9+\s\.]+$" data-fv-regexp-message="Amount can consist of number only" value="0">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group col-lg-12 col-md-12 mt10 pull-right" id="less_box">
                                <label class="col-lg-4 col-md-4 control-label" for="profitPercentage">Profit Percentage</label>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" id="profitPercentage" name="profitPercentage" placeholder="Less Amount" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="form-group col-md-6 col-lg-6">
                                <h4 style="font-size: 15px">Total Price:</h4>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <div class="form-group col-md-12 col-lg-12" style="text-align: right;">
                                    <h4 style="font-weight: 300 !important; font-size: 14px;">
                                        <span class="color" id="subTotalAmount" class="subTotalAmount">00</span><span>(Tk)</span>
                                        <input type="hidden" name="product_subtotal_price" class="product_subtotal_price">
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    
                <div style="display:inline-block;" class="pull-left">
                    <button type="submit" class="btn btn-success mt10 pl20 pr20 submitbutton" data="0">Save</button>
                    {{-- <button type="submit" class="btn btn-primary mt10 submitbutton" data="1">Save & Print</button> --}}
                    <a class="btn btn-primary mt10 pl20 pr20 submitbutton ajax-link" href="deProduct" type="button" >Back to List</a>
                </div>
            </form>
    
            {{-- Clone Table --}}
            <table style="display:none;">
                <tbody id="opportunity_product_plus_clone" class="amountPurpose">
                    <tr class="new_product_row">
                        <td class="td-sn">1</td>
                        <td>
                            <div id="product_src" class="row advance-search" search-url="" search-title="Product Search">
                                <div class="form-group pl10 mb0">
                                    <div class="col-sm-11 pl15 pr5" id="product_id_view">
                                        <select required name="item[]" id="product_id" data-fv-row=".col-sm-11" data-fv-icon="false" class="select2 clone form-control adv-search product_select remove_option product_id">
                                        <option value="">Select Item</option>
                                        @foreach ($costCalculationItems as $costCalculationItem)
                                        <option value="{{$costCalculationItem->id}}">{{$costCalculationItem->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div style="color:red;display: none;" class="fomr-control" id="hidemassge" >
                                    *Allready Selected
                                </div>
                            </div>
                        </td>
                        <td>
                            <div id="cat" class="row advance-search" search-url="" search-title="category Search">
                                <div class="form-group pl10 mb0">
                                    <div class="col-sm-11 pl15 pr5" id="cate_id_view">
                                        <select required name="category[]" id="cat_id" data-fv-row=".col-sm-11" data-fv-icon="false" class="cate_id form-control adv-search category_select append_option">
                                            <option value="">Select Category</option>
                                            @foreach ($costCategoryItems as $costCategoryItem)
                                            <option value="{{$costCategoryItem->id}}">{{$costCategoryItem->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td id="quantity_td">
                            <div class="form-group pl10 pr10 mb0">
                                <input required name="quantity[]" id="quantity" class="form-control quantity" placeholder="Qty">
                                <input type="hidden" id="total_quantity" name="total_quantity">
                                <input type="hidden" name="product_total_price" class="product_total_price">
                                <input type="hidden" class="product_price">
                                <div class="qtyFeedback"></div>
                                <div class="qtyFeedbackStatus"></div>
                                <div class="ctn_qty_status" style="display: none;"></div>
                                <div class="qtyFeedbackStatusvalue" style="display: none;"></div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group pl10 pr10 mb0">
                                <input disabled name="unit[]" id="unit" class="form-control " required>

                            </div>
                        </td>
                        <td id="ctn_qty_td">
                            <div class="form-group pl10 pr10 mb0">
                                <input type="text" name="purchase_price[]" id="purchase_price" placeholder=" Price" class="form-control purchase_price" title="Purchase Price" required data-fv-regexp="true" data-fv-regexp-regexp="^[0-9+\s\.]+$" data-fv-regexp-message="Purchase price can consist of number only">
                            </div>
                        </td>
                        <td>
                            <div class="form-group pl10 pr10 mb0">
                                <input disabled name="per_product_total[]" placeholder="Total" class="form-control per_product_total" id="per_product_total">
                                <input type="hidden" class="single_product_total_amount custon_single_p_amount" name="single_product_total_amount[]" id="single_product_total_amount" value="">
                            </div>
                        </td>
                        <td>
                            <div class="form-group pl10 pr10 mb0">
                                <textarea name="remarks[]" class="form-control" placeholder="Enter Remarks" rows="1">N/A</textarea>
                            </div>
                        </td>
                        <td class="pub-plus-minus">
                            <i class="fa fa-minus-square hand pub-minus"></i>
                            <i class="fa fa-plus-square hand pub-plus"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class=clearfix></div>
        </div>
    </div>
            
    <script type="text/javascript">
        $(document).ready(function() {
            //scrollable table start
            var x = window.matchMedia("(max-width: 800px)")
            mediaQuery(x) // Call listener function at run time
            x.addListener(mediaQuery) // Attach listener function on state changes
            $('#productInvoiceFrom').formValidation('addField', $("#customer_id"));
            //scrollable table end

            $("select.select2").not(".clone, .pro").select2({
                placeholder: "Select"
            });
    
            $('#opportunity_product_plus').on('click', '.pub-plus', function(){
                productTrAdd('opportunity_product_plus'); 
            });
            $('#opportunity_product_plus').on('click', '.pub-minus', function(){
                productTrRemove('opportunity_product_plus', $(this));
            });
    
            //duplicate product
             function countInArray(array, what) {
                var count = 0;
                for (var i = 0; i < array.length; i++) {
                    if (array[i] === what) {
                        count++;
                    }
                }
                return count;
            }

            var subTotalAmount = $('#subTotalAmount').text();
            var target_profit ={{$targetPercentage->percentage}};
            console.log(subTotalAmount);
            // Product's Details
            $("#productInvoiceFrom").on('change', '.product_select', function(e) {
                var sales_status = $('#sales_status').val();
                var business_type = $('#business_type').val();
    
                var branch_id                 = $('#productInvoiceFrom #branch_id').val();
                var productId                 = $(this).children("option:selected").val();
                var customer_id               = $('#customer_id').val();
                var $selector                 = $(this).closest(".new_product_row");
                var quantity                  = $selector.find("input[name='quantity[]']");
                var product_sn                = $selector.find("input[name='product_sn[]']");
                var ctn_qty_selector          = $selector.find("input[name='ctn_qty[]']");
                var unit_selector             = $selector.find("input[name='unit[]']");
                var perProTotalPriceShowField = $selector.find("input[name='per_product_total[]']");
                var qtyFeedback               = $selector.find("div.qtyFeedback");
                var qtyFeedbackStatus         = $selector.find("div.qtyFeedbackStatus");
                var qtyFeedbackStatusvalue    = $selector.find("div.qtyFeedbackStatusvalue");
                var productPrice              = $selector.find(".product_price");
                var productTotalPrice         = $selector.find(".product_total_price");
                var per_product_total         = $selector.find("#per_product_total");
                var purchase_price            = $selector.find("#purchase_price");
                var singleProTotalPriceInpField  = $selector.find("input[name='single_product_total_amount[]']");
                var productSn = $selector.find("input[name='product_sn[]']");
                $selector.find("select[name='size[]']").html(" ");
    
                var stored  = [];
                $('#productInvoiceFrom #product_id').each(function(index) {
                    var value = $(this).val();
                    stored.push(value);
                });

                $('.quantity').on('keyup', function(){
                    var price = $(this).closest("tr").find('.purchase_price').val(); 
                    ctn = (Number($(this).val())*price);
                    $(this).closest("tr").find('#per_product_total').val(ctn);
                    $(this).closest("tr").find('.single_product_total_amount').val(ctn);
                });


                $('.purchase_price').on('keyup', function(){
                    var quantity = $(this).closest("tr").find('.quantity').val(); 
                    ctn = (Number($(this).val())*quantity);


                    $(this).closest("tr").find('#per_product_total').val(ctn);
                    $(this).closest("tr").find('.single_product_total_amount').val(ctn);
                    
                    // alert($('.per_product_total_amount').val());

                }); 

                var times = countInArray(stored, productId);
    
                if(times > 1)
                {
                    $.ajax({
                            url: '{{route("provider.admin.provider.admin.getUserItems")}}',
                            data: {productId:productId},
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                unit_selector.val(data.productSearch.unit);
                                qtyFeedbackStatusvalue.text(data.quantity);
                                quantity.val(0);
                                per_product_total.val(0);
                                purchase_price.val(0);
                            },
                        });
    
                    return false;
                }
                else{
                    if (productId ==0 || productId == '') {
                        product_sn.val('');
                        quantity.val('');
                        perProTotalPriceShowField.val(0);
                        perProTotalPriceInpField.val(0);
                        qtyFeedback.hide();
                        qtyFeedbackStatus.hide();
                        grandTotalProductsPrice(); 
                    }
                    else{
                        $.ajax({
                            url: '{{route("provider.admin.provider.admin.getUserItems")}}',
                            data: {productId:productId},
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                unit_selector.val(data.productSearch.unit);
                                qtyFeedbackStatusvalue.text(data.quantity);
                                quantity.val(0);
                                per_product_total.val(0);
                                purchase_price.val(0);
                            },
                        });
                    }
                }
            });

            


            $('#productInvoiceFrom').on("keyup", ".purchase_price", function (e) {
                var netTotalAmount = 0;
                $('.custon_single_p_amount').each(function(){
                    var value = Number($(this).val());
                    netTotalAmount += value;
                });

                $('#subTotalAmount').text(netTotalAmount.toFixed(2));
                var subTotalAmount = $('#subTotalAmount').text();
                var target_profit ={{$targetPercentage->percentage}};
                var target_profit_per =(subTotalAmount*target_profit)/100;
                var target_mrp = Number(subTotalAmount) + Number(target_profit_per);
                $('#target_mrp').val(target_mrp.toFixed(2));

            }); 
            $('#productInvoiceFrom').on("keyup", ".quantity", function (e) {
                var price = $(this).closest("tr").find('.purchase_price').val(); 
                ctn = (Number($(this).val())*price);
                $(this).closest("tr").find('#per_product_total').val(ctn);
                $(this).closest("tr").find('.custon_single_p_amount').val(ctn);

                var customNetTotalAmounttr = 0;
                $('.custon_single_p_amount').each(function(){
                    var value = Number($(this).val());
                    customNetTotalAmounttr += value;
                });
                $('#subTotalAmount').text(customNetTotalAmounttr.toFixed(2));
                var subTotalAmount = $('#subTotalAmount').text();
                var target_profit ={{$targetPercentage->percentage}};
                var target_profit_per =(subTotalAmount*target_profit)/100;
                var target_mrp = Number(subTotalAmount) + Number(target_profit_per);
                $('#target_mrp').val(target_mrp.toFixed(2));             
            });
            $('#productInvoiceFrom').on("keyup", ".total_mrp", function (e) {
                var total_mrp = $(this).val();
                var subTotalAmount = $('#subTotalAmount').text();
                var profit_pre = Number(total_mrp) - Number(subTotalAmount);
                console.log(profit_pre);
                var profit_percentage = Math.round((profit_pre*100)/subTotalAmount);
                $('#profitPercentage').val(profit_percentage);

            }); 

            $("#productInvoiceFrom").on('change', '#transaction_by', function(e) {
                var transaction_by=parseInt($(this).val());
                if(bankList.indexOf(transaction_by)>=0) {
                    if($("#cheque_no_view").is(":hidden")) {
                        $('#productInvoiceFrom').formValidation('addField', $('#cheque_no'));
                        $('#productInvoiceFrom').formValidation('addField', $('#cheque_date'));
                        $("#cheque_no_view").show();
                        $("#cheque_date_view").show();
                    }
                } else {
                    if(!($("#cheque_no_view").is(":hidden"))) {
                        $('#productInvoiceFrom').formValidation('removeField', $('#cheque_no'));
                        $('#productInvoiceFrom').formValidation('removeField', $('#cheque_date'));
                        $("#cheque_no_view").hide();
                        $("#cheque_date_view").hide();
                    }
                }
            }); 
        });
    
        function mediaQuery(x) {
            if (x.matches) { // If media query matches
                $('#dtHorizontalExample').DataTable({
                    "scrollX": true
                });
                $('.dataTables_length').addClass('bs-select');
            }
        }
    
        function selectBranch (x) {
            var branch_id = x.value;
            var businessType = $('#business_type').val();
            var customer_id  = $('#customer_id').val();
            userProducts(businessType, customer_id, branch_id, '', '', 1);
        }
    

    
        function productTrAdd(selector) {
            var sn = parseInt($('#'+selector).find('.td-sn').last().html())+1;
            $('#'+selector).append($('#'+selector+'_clone').html());
            var $lastChild = $('#'+selector).find('tr').last();
            $lastChild.find("select.select2").select2({placeholder: "Select"});
            $lastChild.find("#color").select2({placeholder: "Select Color"});
            $lastChild.find("#size").select2({placeholder: "Select Size"});
            $lastChild.find(".dtpicker").datepicker({format: 'dd/mm/yyyy'});
            advanceSearch($lastChild.find("#product_src"));
            $lastChild.find("#cate_id_view #cat_id").select2({placeholder:"Select"});

            
            //FV
            $('#productInvoiceFrom').formValidation('addField', $lastChild.find("#product_id"));
            $('#productInvoiceFrom').formValidation('addField', $lastChild.find("#product_sn"));
            $('#productInvoiceFrom').formValidation('addField', $lastChild.find("#quantity"));
            $('#productInvoiceFrom').formValidation('addField', $lastChild.find("#ctn_qty"));
            $('#'+selector).find('.pub-plus').not($('#'+selector+' .pub-plus').last()).remove();
            $('#'+selector).find('.td-sn').last().html(sn);
    
            var businessType = $('#business_type').val();
            var branch_id = $('#branch_id').val();
            var customer_id = $('#customer_id').val();
    
            userProducts(businessType, customer_id, branch_id, '', '', 2);
        }
    
        function productTrRemove(selector, $that) {
            var $row = $that.parents('tr');
            var subTotalAmount = 0;
            $row.remove();
            if($('#'+selector+' .pub-plus-minus').length==1) {
                $('#'+selector+' .pub-plus-minus').html('<i class="fa fa-plus-square hand pub-plus"></i>');
            } else {
                $('#'+selector+' .pub-plus-minus').last().html('<i class="fa fa-minus-square hand pub-minus"></i> <i class="fa fa-plus-square hand pub-plus"></i>');
            }
            //Serial
            $('#'+selector).find('.td-sn').each(function(index){ $(this).html(index+1); });

            var netTotalAmount = 0;
            $('.custon_single_p_amount').each(function(){
                var value = Number($(this).val());
                netTotalAmount += value;
            });

            $('#subTotalAmount').text(netTotalAmount.toFixed(2));
            var subTotalAmount = $('#subTotalAmount').text();
            var target_profit ={{$targetPercentage->percentage}};
            var target_profit_per =(subTotalAmount*target_profit)/100;
            var target_mrp = Number(subTotalAmount) + Number(target_profit_per);
            $('#target_mrp').val(target_mrp.toFixed(2));

        }
    
    
        function allRawRemoveWithDataEmpty() {
            $('.input-table').find("tr:gt(1)").remove();
            if($('.input-table .pub-plus-minus').length==1) {
            $('.input-table .pub-plus-minus').html('<i class="fa fa-plus-square hand pub-plus"></i>');
            } else {
            $('.input-table .pub-plus-minus').last().html('<i class="fa fa-minus-square hand pub-minus"></i> <i class="fa fa-plus-square hand pub-plus"></i>');
            }
    
            //Data Empty for first row
            $('#productInvoiceFrom').find('.product_select').attr('selected', '');
            $('#productInvoiceFrom').find(".total_net_receivable_value").text('00');
            $('#productInvoiceFrom').find("#product_sn").val('');
            $('#productInvoiceFrom').find("#quantity").val('');
            $('#productInvoiceFrom').find("#qty_details").val('');
            //Footer calculation 
    
            
        }
    
        function userProducts(businessType, customer_id, branch_id, pro_row_type=false){
            //PRODUCTS
            $.ajax({
                url: appUrl.baseUrl('/provider/admin/get-user-item'),
                type: "GET",
                success: function (data) {
                    dataFilter(data);
                    if (pro_row_type==1) {
                        
                        $('#opportunity_product_plus tr').each(function(index){
                            var $parentTr = $(this).first();
                            $parentTr.find("#product_id_view").html(data);
                            $parentTr.find("#quantity").val('');
                            $parentTr.find("#qty_details").val('');
                            $parentTr.find(".per_product_total_amount").val('');
                            $parentTr.find("#product_id").select2({placeholder:"Select Product"});
                            refreshArea();
                        });
    
                        $('#productInvoiceFrom').formValidation('addField', $("#product_id"));
                    }
                    else if(pro_row_type ==2) // for clone
                    {
                        var length = $('#opportunity_product_plus tr').length;
                        $('#opportunity_product_plus tr').each(function(index){
                            if (index === (length - 1)) {
                                var $parentTr = $(this).first();
                                $parentTr.find("#product_id_view").html(data);
                                $parentTr.find("#product_id").select2({placeholder:"Select Product"});
                            }
                            else
                            {
    
                            }
                            
                        });
    
                        $('#productInvoiceFrom').formValidation('addField', $("#product_id"));
                        
                    }
                }
            });
        }
    
        function refreshArea() {
            $('.panel-refresh').trigger('click');
        }
    </script>