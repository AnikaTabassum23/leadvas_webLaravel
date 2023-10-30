<?php $panelTitle = "Request Approved"; ?>
@include("panelStart")

<style type="text/css">
    .dd{
        padding: 5px;
    }
    .handle-right{
        right: 0;
        color: red;
        left: auto;
        background: red;
        cursor: pointer;
    }
    .handle-right:hover{
        background: red;
    }
</style>

<form type="update" panelTitle="{{$panelTitle}}" action="{{route('provider.approvalSystem.requestAprrovedStatusAction')}}" method="POST" class="form-load form-horizontal group-border stripped" callback="serviceRequestContent"  data-fv-excluded="">
    @method('PUT')
    {{csrf_field()}}
        <input type="hidden" value="{{$req_chain_id}}" name="req_chain_id">
        <input type="hidden" value="{{$service_req_info->service_req_id}}" name="service_req_id">
        <input type="hidden" value="{{$service_req_info->employee_id}}" name="employee_id">
        <div class="form-group">
            <label class="col-lg-2 col-md-3 control-label required">Approved</label>
            <div class="col-lg-6 col-md-6">
                <select data-fv-icon="false" name="request_status" class="select2 form-control ml0">
                    <option value="1" @if(@$service_req_info->approve_status == 1) selected  @endif>Aprrove</option>
                    <option value="2" @if(@$service_req_info->approve_status == 2) selected  @endif>Decline</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-md-3 control-label required">Note</label>
            <div class="col-lg-6 col-md-5">
                <textarea required id="details" name="note" rows="5" class="form-control">{{@$apprevedReacordInfo->note}}</textarea>
            </div>
        </div>

        <div class=form-group>
            <label class="col-lg-2 col-md-3 control-label">File</label>
            <div class="col-lg-10 col-md-9 row" id="file_attachment">
                <div class="col-lg-10 col-md-9">
                    <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/request_approved" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
                    <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
                </div>
                <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
                    <div id="attachment_area_file_attachment_upload" class="attachment_area">
                        @foreach($approvedRecordAttachment as $mdlFile)
                        <div class="attachment-item clearfix image">
                            <input name="fau_attachment_id[]" value="{{$mdlFile->id}}" type="hidden"/>
                            @if(!empty($mdlFile->attachment))
                                <div class="attachment-img" style="background-image: url({{Helper::getFileThumb($mdlFile->attachment, 'public/uploads/request_approved')}})"></div>
                                @endif
                                <div class="attachment-content">
                                    <div class="close_x"><span class="fa fa-close remove_files" file_name="{{$mdlFile->attachment}}" filepath="public/uploads/request_approved" auto-remove="false"></span></div>
                                    <div class="attachment-title">
                                        <a class="igniterImg" href="{{url('public/uploads/request_approved/'.$mdlFile->attachment)}}" target="_blank">{{$mdlFile->attachment_real_name}}</a>
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
            <div class="col-lg-6">
                <button type="submit" class="btn btn-default ml15" style="float: right">Save It</button>
            </div>
            <div class="col-lg-6">
                    <a class="btn btn-default btn-sm ajax-link" href="request-approved" type="button" >Back to List</a>
            </div>
        </div>

    
</form>
<script type="text/javascript">
    multipleFileUpload("file_attachment_upload", "fl");
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Select"
        });

        $("#details").summernote({
                height: 150
        });

    });

    function serviceRequestContent(data) {
        bootbox.hideAll();
        $("#attachment_area_file_attachment_upload").html('');
    }
</script>
@include("panelEnd")