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

<div class="tabs mb20">
    <ul class="nav nav-tabs" id="profileTab">
       <li class="active"><a data-toggle="tab" href="#previous_summery" aria-expanded="true">Previous Summery</a></li>
       <li><a data-toggle="tab" href="#attachments">Attachments</a></li>
       <li><a data-toggle="tab" href="#approval_form">Approval</a></li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div id="previous_summery" class="tab-pane fade active in">
            <div class="panel-body">
                <div class="bs-callout bs-callout-info fade in">
                    <h4>Success</h4>
                    Content will be loaded one time via jQuery's load method and injected into the .modal-content div. If you're using the data-api, you may alternatively use the href attribute to specify the remote source
                </div>
                <div class="bs-callout bs-callout-success fade in">
                    <h4>Success</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, explicabo, doloremque, ullam neque veritatis quasi hic excepturi eum laborum sunt nisi libero natus ab eos autem voluptatum non numquam fuga!</p>
                </div>
                <div class="bs-callout bs-callout-danger fade in">
                    <h4>Success</h4>
                    Content will be loaded one time via jQuery's load method and injected into the .modal-content div. If you're using the data-api, you may alternatively use the href attribute to specify the remote source
                </div>
            </div>
            <a class="btn btn-default btn-sm ajax-link mt15" href="request-approved" type="button">Back to List</a>
        </div>
        <div id="attachments" class="tab-pane fade pb0 mb15">
            <div class="panel-body">
                <div class="bs-callout bs-callout-info fade in">
                    <h4>Success</h4>
                    Content will be loaded one time via jQuery's load method and injected into the .modal-content div. If you're using the data-api, you may alternatively use the href attribute to specify the remote source
                </div>
                <div class="bs-callout bs-callout-success fade in">
                    <h4>Success</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, explicabo, doloremque, ullam neque veritatis quasi hic excepturi eum laborum sunt nisi libero natus ab eos autem voluptatum non numquam fuga!</p>
                </div>
                <div class="bs-callout bs-callout-danger fade in">
                    <h4>Success</h4>
                    Content will be loaded one time via jQuery's load method and injected into the .modal-content div. If you're using the data-api, you may alternatively use the href attribute to specify the remote source
                </div>
            </div>
            <a class="btn btn-default btn-sm ajax-link mt15" href="request-approved" type="button">Back to List</a>
        </div>
        <div id="approval_form" class="tab-pane fade pb0 mb15">
            <form type="update" action="{{route('provider.approvalSystem.requestAprrovedStatusAction')}}" method="POST" data-fv-excluded="" callback="serviceRequestContent" class="form-load form-horizontal group-border stripped">
                @method('PUT')
                @csrf
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
                        <a class="btn btn-default btn-sm ajax-link" href="request-approved" type="button">Back to List</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

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