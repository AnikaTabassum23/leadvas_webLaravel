<?php $panelTitle = "Product Create"; ?>
@include("panelStart")
<style>
    .vew_scrl{
      width: 257px;
      margin-top: 10px;
    }
    .cropit-preview {
      background-color: #f8f8f8;
      background-size: cover;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-top: 7px;
      width: 257px;
      height: 293px;
    }
    .cropit-preview-image-container {
      cursor: move;
    }
    .image-size-label {
      margin-top: 10px;
    }
    .export {
      display: block;
      cursor: pointer;
    }
    .button_style {
        /*background-color: #f1f1f1;*/
        color: black;
        text-decoration: none;
        display: inline-block;
        padding: 0px 10px;
        font-size: 18px;
        border: 2px solid #A97C50;
        color: #A97C50;
        /*margin-left: 20px;*/
    }
    .button_style:hover {
        background-color: #ddd;
        color: black;
    }

</style>
<form type="create" id="deProductForm" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Product Code</label>
        <div class="col-lg-10 col-md-9">
           <input autofocus required name="product_code" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Name</label>
        <div class="col-lg-10 col-md-9">
            <input autofocus required name="name" placeholder="Product Name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label">Descriprion</label>
        <div class="col-lg-10 col-md-9">
            <textarea autofocus name="description" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <label class="col-lg-2 col-md-3 control-label required">Image</label>
        <div class="image-editor col-lg-3 col-md-3">
            <input type="file" class="cropit-image-input" required>
            <div class="cropit-preview"></div>
            <div class="image-size-label">
                Resize image
            </div>
            <div class="vew_scrl">
                <input type="range" class="cropit-image-zoom-input">
            </div>
            <span class="export button_style"><i class="fa fa-crop">Crop</i></span>
            <span id="ready_msg"></span>
            <input class="form-control"  type="hidden" id="thumbnail" name="thumbnail">
            <input class="form-control"  type="hidden" id="real_image" name="real_image">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Create</button>
        </div>
    </div>
</form>
@include("panelEnd")

<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Select"
        });

        $('.image-editor').cropit({
            imageState: {
                src: 'http://lorempixel.com/500/400/',
            },
        });
        $(".image-editor").change(function(){
            $('#deProductForm #real_image').val('');
            $('#deProductForm #thumbnail').val('');
            $('#specialCourseForm #ready_msg').text('Please crop for save');
        });

        $('.rotate-cw').click(function() {
            $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
            $('.image-editor').cropit('rotateCCW');
        });

        $('.export').click(function() {
            var imageData = $('.image-editor').cropit('export');
            var real_image=$(".cropit-preview-image").attr('src');
            
            $('#deProductForm #real_image').val(real_image);
            $('#deProductForm #thumbnail').val(imageData);
            console.log($("#thumbnail").val()!="");
            if($("#thumbnail").val()!=""){
                $('#deProductForm #ready_msg').text('Ready for save');
            }else{
                $('#deProductForm #ready_msg').text('Please crop for save');
            }
            // if (typeof imageData === "undefined") {
            //    $(':input[type="submit"]').prop('disabled', true);
            //  }else{
            //  $('#deProductForm #thumbnail').val(imageData);
            //  $(':input[type="submit"]').prop('disabled', false);
            //console.log(imageData);
            // }
            //  if($("#thumbnail").val()!=""){
            //   $('#specialCourseForm #ready_msg').text('Ready for save');
            // }else{
            //   $('#specialCourseForm #ready_msg').text('Please crop for save');
            // }
        });
        $("#deProductForm").submit(function( event ) {
            if($("#thumbnail").val()!=""){
                $(".cropit-preview-image").attr('src', '');
            }
        });
    
    });
</script>