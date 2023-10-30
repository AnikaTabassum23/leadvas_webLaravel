<?php $panelTitle = "Service Request Update"; ?>
<form type="update" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required">Category</label>
        <div class="col-lg-6 col-md-5">
            <select required name="service_category_id" id="service_category_id" data-fv-icon="false" class="select2 form-control ml0">
                <option value="">Select One</option>
                @foreach ($serviceCategories as $serviceCategory)
                    <option value="{{$serviceCategory->id}}" {{$serviceCategory->id == $serviceRequest->service_category_id ? 'selected' : ''}} >{{$serviceCategory->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if ($serviceRequest->employee_id == null)
        <div class="form-group" style="display: none;" id="approvar_div">
            <label class="col-lg-2 col-md-3 control-label">Approvar</label>
            <div class="col-lg-6 col-md-5" id="request_approvar_div">

            </div>
        </div>
    @else
        <div class="form-group" id="approvar_div">
            <label class="col-lg-2 col-md-3 control-label">Approvar</label>
            <div class="col-lg-6 col-md-5" id="request_approvar_div">
                @if (count($employees) > 0)
                    <select name="employee_id" id="employee_id" data-fv-icon="false" class="select2 form-control ml0">
                        <option value="">Select One</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->id}}" {{$employee->id == $serviceRequest->employee_id ? 'selected' : ''}}>{{$employee->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
    @endif
    
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Title</label>
        <div class="col-lg-6 col-md-5">
            <input autofocus required name="title" value="{{$serviceRequest->title}}" placeholder="Service Title" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Details</label>
        <div class="col-lg-6 col-md-5">
            <textarea autofocus required name="details" id="details" rows="5" class="form-control">{{$serviceRequest->details}}</textarea>
        </div>
    </div>
    
    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required" for="">Approximate Date</label>
        <div class="col-lg-1 col-md-1">
            <div class="toggle-custom toggle-inline">
                <label class=toggle data-on=Yes data-off=No>
                    <input type=checkbox id="is_approx_date" name="is_approx_date" value="1" {{$serviceRequest->is_approx_date ? 'checked' : ''}}> <span class=button-checkbox></span>
                </label>
            </div>
        </div>
        <div class="col-lg-5 col-md-4">
            <div class=input-group>
                <span class="input-group-addon"></span>
                <input type="date" name="approximate_date" id="approximate_date" placeholder="Approximate Date" class="form-control" value="{{$serviceRequest->approximate_date}}" {{$serviceRequest->approximate_date ? '' : 'readonly'}} >
            </div>
        </div>
    </div>

    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label required" for="is_approx_amount">Approximate Amount</label>
        <div class="col-lg-1 col-md-1">
            <div class="toggle-custom toggle-inline">
                <label class=toggle data-on=Yes data-off=No>
                    <input type=checkbox id="is_approx_amount" name="is_approx_amount" value="1" {{$serviceRequest->is_approx_amount ? 'checked' : ''}}> <span class=button-checkbox></span>
                </label>
            </div>
        </div>
        <div class="col-lg-5 col-md-4">
            <div class=input-group>
                <span class="input-group-addon">&#2547;</span>
                <input id="approximate_amount" name="approximate_amount"  placeholder="Approximate Amount" class="form-control" kl_virtual_keyboard_secure_input="on" data-fv-regexp="true"
                 data-fv-regexp-regexp="^[0-9+\s\.]+$"  data-fv-regexp-message="Price can consist of number only" value="{{$serviceRequest->approximate_amount}}" {{$serviceRequest->approximate_amount ? $serviceRequest->approximate_amount : 'readonly'}}>
            </div>
        </div>
    </div>

    <div class=form-group>
        <label class="col-lg-2 col-md-3 control-label">File</label>
        <div class="col-lg-10 col-md-9 row" id="file_attachment">
            <div class="col-lg-10 col-md-9">
                <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/service_request" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
                <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
            </div>
            <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
                <div id="attachment_area_file_attachment_upload" class="attachment_area">
                    @foreach($requestAttFiles as $mdlFile)
                    <div class="attachment-item clearfix image">
                        <input name="fau_attachment_id[]" value="{{$mdlFile->id}}" type="hidden"/>
                        @if(!empty($mdlFile->attachment))
                        <div class="attachment-img" style="background-image: url({{Helper::getFileThumb($mdlFile->attachment, 'public/uploads/service_request')}})"></div>
                        @endif
                        <div class="attachment-content">
                            <div class="close_x"><span class="fa fa-close remove_files" file_name="{{$mdlFile->attachment}}" filepath="public/uploads/service_request" auto-remove="false"></span></div>
                            <div class="attachment-title">
                                <a class="igniterImg" href="{{url('public/uploads/service_request/'.$mdlFile->attachment)}}" target="_blank">{{$mdlFile->attachment_real_name}}</a>
                            </div>
                            <?php
                                $d=strtotime($mdlFile->created_at);
                                $uploaded_at = "Uploaded ".date("M d, Y", $d);
                            ?>
                            <div class="attachment-date">{{$uploaded_at}}</div>
                            <div class="attachment-size">{{Helper::fileSizeConvert($mdlFile->attachment_size)}}</div>
                            <input name="fau_attachment[]" value="{{$mdlFile->attachment}}" type="hidden">
                            <input name="fau_attachment_real_name[]" value="{{$mdlFile->attachment_real_name}}" type="hidden">
                            <input name="fau_attachment_size[]" value="{{$mdlFile->attachment_size}}" type="hidden">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Update</button>
        </div>
    </div>
</form>

<script>
    multipleFileUpload("file_attachment_upload");
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