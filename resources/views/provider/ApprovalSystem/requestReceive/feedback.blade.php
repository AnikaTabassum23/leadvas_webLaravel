<style>
	p {
		margin:0;
	}
	div:first-child .form-group {
		margin-top: 15px;
	}
	.disabled {
		pointer-events: none !important;
	}
</style>
<?php $panelTitle = "Create Feedback"; ?>

	<form id="feedbackForm" type="create" class="form-load form-horizontal" data-fv-excluded="" action="{{route('provider.approvalSystem.infoFeedbackAction')}}" callback="serviceRequestContent">
    	{{csrf_field()}}
		<input type="hidden" name="infoId" value="{{$infoId}}">
        <div class="form-group">
            <label class="col-lg-3 col-md-3 control-label required">Note</label>
            <div class="col-lg-8 col-md-9">
                <textarea required id="details" name="note" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class=form-group>
	        <label class="col-lg-3 col-md-3 control-label">File</label>
	        <div class="col-lg-9 col-md-5 row" id="file_attachment">
	            <div class="col-lg-11 col-md-9">
	                <button id="file_attachment_upload" input-prefix="fau" file-path="public/uploads/request_feedback" _token="{{ csrf_token() }}" auto-remove="true" type="button" data-loading-text="Uploading..." class="btn btn-info"> Attach Files </button>
	                <div id="status_file_attachment_upload" style="padding-top: 10px"> </div>
	            </div>
	            <div class="col-lg-10 col-md-9" style="margin-bottom: -10px;">
	                <div id="attachment_area_file_attachment_upload" class="attachment_area"></div>
	            </div>
	        </div>
    	</div>
    </form>

@include("panelEnd")

<script type="text/javascript">
	
	$(function () {
		$("#details").summernote({
            height: 150
        });
	});

	multipleFileUpload("file_attachment_upload", "fl");

	function serviceRequestContent(data) {
        bootbox.hideAll();
        $("#attachment_area_file_attachment_upload").html('');
    }
</script>