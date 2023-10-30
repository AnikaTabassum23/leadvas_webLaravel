<?php $panelTitle = "Request Create"; ?>
@include("panelStart")
<form type="create" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-lg-3 col-md-3 control-label required">Service Request</label>
        <div class="col-lg-8 col-md-9">
            <select required name="request_chain_id" data-fv-icon="false" class="select2   form-control ml0">
                <option value=""></option>
                @foreach($service_request_chains as $service_request_chain)
                <option value="{{$service_request_chain->id}}">{{$service_request_chain->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 col-md-3 control-label required">Employee Name</label>
        <div class="col-lg-8 col-md-9">
            <select required name="req_to_employee_id" data-fv-icon="false" add-url="requestInfoAdd" class="select2 form-control ml0">
                <option value=""></option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}">{{$employee->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-3 col-md-3 control-label required">Note</label>
        <div class="col-lg-8 col-md-9">
            <textarea required id="details" name="note" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class=form-group>
        <label class="col-lg-3 col-md-3 control-label required" for="">Do you have any attachment</label>
        <div class="col-lg-1 col-md-1">
            <div class="toggle-custom toggle-inline">
                <label class=toggle data-on=Yes data-off=No>
                    <input type=checkbox id="file_toggole" name="is_approx_date" value="1"> <span class=button-checkbox></span>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group" id="attachment_file" style="display: none">
        <label class="col-lg-3 col-md-3 control-label">File</label>
        <div class="col-lg-9 col-md-5 row" id="file_attachment">
            <div class="col-lg-11 col-md-9">
                <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/requestSendAttachment" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
                <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
            </div>
            <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
                <div id="attachment_area_file_attachment_upload" class="attachment_area"></div>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-5">
            <button type="submit" class="btn btn-default ml15">Send</button>
        </div>
    </div>

</form>
@include("panelEnd")

<script type="text/javascript">
    multipleFileUpload("file_attachment_upload", "fl");
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Select"
        });
        $("#details").summernote({
            height: 150
        });


        $("#file_toggole").change(function(){
            if($(this).is(":checked")) {
                $("#attachment_file").show();
            } else {
                $("#attachment_file").hide();
            }
        });

    });

    function serviceRequestContent(data) {
        bootbox.hideAll();
        $("#attachment_area_file_attachment_upload").html('');
    }

</script>