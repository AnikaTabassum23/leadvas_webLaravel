<?php $panelTitle = "Request Update"; ?>
<form type="update" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
          
    <div class="form-group">
        <label class="col-lg-3 col-md-3 control-label required">Note</label>
        <div class="col-lg-8 col-md-9">
            <textarea required id="details" name="note" rows="5" class="form-control">{{$service_request_send->note}}</textarea>
        </div>
    </div>
    <div class=form-group>
        <label class="col-lg-3 col-md-3 control-label">File</label>
        <div class="col-lg-9 col-md-9 row" id="file_attachment">
            <div class="col-lg-11 col-md-9">
                <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/requestSendAttachment" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
                <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
            </div>
            <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
                <div id="attachment_area_file_attachment_upload" class="attachment_area">
                    @foreach($requestAttFiles as $mdlFile)
                    <div class="attachment-item clearfix image">
                        <input name="fau_attachment_id[]" value="{{$mdlFile->id}}" type="hidden"/>
                        @if(!empty($mdlFile->attachment))
                        <div class="attachment-img" style="background-image: url({{Helper::getFileThumb($mdlFile->attachment, 'public/uploads/requestSendAttachment')}})"></div>
                        @endif
                        <div class="attachment-content">
                            <div class="close_x"><span class="fa fa-close remove_files" file_name="{{$mdlFile->attachment}}" filepath="public/uploads/requestSendAttachment" auto-remove="false"></span></div>
                            <div class="attachment-title">
                                <a class="igniterImg" href="{{url('public/uploads/requestSendAttachment/'.$mdlFile->attachment)}}" target="_blank">{{$mdlFile->attachment_real_name}}</a>
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
        <div class="col-lg-offset-5">
            <button type="submit" class="btn btn-default ml15">Update Note</button>
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