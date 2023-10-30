<?php $panelTitle = "Service Request Create"; ?>
@include("panelStart")
<form type="create" id="serviceRequestForm" panelTitle="{{$panelTitle}}" callback="serviceRequestContent" class="form-load form-horizontal group-border stripped" data-fv-excluded="">
    {{csrf_field()}}
    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required">Category</label>
        <div class="col-lg-6 col-md-5">
            <select required name="service_category_id" id="service_category_id" data-fv-icon="false" class="select2 form-control ml0">
                <option value="">Select One</option>
                @foreach ($serviceCategories as $serviceCategory)
                    <option value="{{$serviceCategory->id}}">{{$serviceCategory->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group" style="display: none;" id="approvar_div">
        <label class="col-lg-2 col-md-3 control-label">Approvar</label>
        <div class="col-lg-6 col-md-5" id="request_approvar_div">

        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Title</label>
        <div class="col-lg-6 col-md-5">
            <input required name="title" placeholder="Service Title" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Details</label>
        <div class="col-lg-6 col-md-5">
            <textarea required id="details" name="details" rows="5" class="form-control"></textarea>
        </div>
    </div>

    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required" for="">Approximate Date</label>
        <div class="col-lg-1 col-md-1">
            <div class="toggle-custom toggle-inline">
                <label class=toggle data-on=Yes data-off=No>
                    <input type=checkbox id="is_approx_date" name="is_approx_date" value="1"> <span class=button-checkbox></span>
                </label>
            </div>
        </div>
        <div class="col-lg-5 col-md-4">
            <div class=input-group>
                <span class="input-group-addon"></span>
                <input type="date" name="approximate_date" id="approximate_date" placeholder="Approximate Date" class="form-control" readonly >
            </div>
        </div>
    </div>

    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required" for="is_approx_amount">Approximate Amount</label>
        <div class="col-lg-1 col-md-1">
            <div class="toggle-custom toggle-inline">
                <label class=toggle data-on=Yes data-off=No>
                    <input type=checkbox id="is_approx_amount" name="is_approx_amount" value="1"> <span class=button-checkbox></span>
                </label>
            </div>
        </div>
        <div class="col-lg-5 col-md-4">
            <div class=input-group>
                <span class="input-group-addon">&#2547;</span>
                <input id="approximate_amount" name="approximate_amount"  placeholder="Approximate Amount" class="form-control" kl_virtual_keyboard_secure_input="on" data-fv-regexp="true"
                 data-fv-regexp-regexp="^[0-9+\s\.]+$"  data-fv-regexp-message="Price can consist of number only" readonly>
            </div>
        </div>
    </div>
    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label">File</label>
        <div class="col-lg-6 col-md-5 row" id="file_attachment">
            <div class="col-lg-10 col-md-9">
                <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/service_request" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
                <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
            </div>
            <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
                <div id="attachment_area_file_attachment_upload" class="attachment_area"></div>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Create</button>
        </div>
    </div>
</form>

<script>
    multipleFileUpload("file_attachment_upload", "fl");

    $(document).ready(function() {        
        $(".select2").select2({
            placeholder: "Select"
        });
        $("#details").summernote({
            height: 150
        });

        $("#is_approx_date").change(function(){
            if($(this).is(":checked")) {
                $("#approximate_date").removeAttr("readonly", "readonly");
                // $('#serviceRequestForm').formValidation('removeField', $("#approximate_date"));

            } else {
                $("#approximate_date").val("").attr("readonly", "readonly");
                // $('#serviceRequestForm').formValidation('addField', $("#approximate_date"));
            }
        });
        $("#is_approx_amount").change(function(){
            if($(this).is(":checked")) {
                $("#approximate_amount").removeAttr("readonly", "readonly");
                // $('#serviceRequestForm').formValidation('removeField', $("#approximate_amount"));
            } else {
                $("#approximate_amount").val("").attr("readonly", "readonly");
                // $('#serviceRequestForm').formValidation('addField', $("#approximate_amount"));
            }
        });

        $("#service_category_id").change(function(){
            var service_category_id = $(this).val();
            if(service_category_id){
                $.ajax({
                    url: "{{route('provider.approvalSystem.serviceCategoryChain')}}",
                    type: "GET",
                    data: {service_category_id:service_category_id},
                    success: function (data) {
                        if (data.length > 1) {
                            $("#approvar_div").show();
                            $("#request_approvar_div").html(data);
                            $("#employee_id").select2({placeholder:"Select Employee"});
                        } else {
                            // $('#serviceRequestForm').formValidation('removeField', $("#employee_id"));
                            $("#approvar_div").hide();
                        }
                    }
                });
            }
        });
    });
    function serviceRequestContent(data) {
        bootbox.hideAll();
        $("#attachment_area_file_attachment_upload").html('');
    }
</script>

@include("panelEnd")