<?php $panelTitle = "Product Update"; ?>
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
<form type="update" id="deProductForm" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <input type="hidden" name="service_category_id" value={{$deProduct->id}}>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label ">Product Code</label>
        <div class="col-lg-10 col-md-9">
            <input autofocus placeholder="Product Name" class="form-control" value="{{$deProduct->de_product_code}}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Product Name</label>
        <div class="col-lg-10 col-md-9">
            <input autofocus required name="name" placeholder="Product Name" class="form-control" value="{{$deProduct->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label">Descriprion</label>
        <div class="col-lg-10 col-md-9">
            <textarea autofocus name="description" rows="5" class="form-control">{{$deProduct->description}}</textarea>
        </div>
    </div>
    <?php
        $path ='public/uploads/deProduct/thumb/'.$deProduct->thumbnail;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>

    <div class="form-group col-lg-12 col-md-12 col-xs-12">
        <label class="col-lg-2 col-md-3 control-label required">Image</label>
        <div class="image-editor col-lg-3 col-md-3">
            <input type="file" class="cropit-image-input">
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
            <input class="form-control"  type="hidden" id="real_image" name="real_image" value="{{$base64}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Update</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Select"
        });
        //IMAGE UPLOAD
        $('.image-editor').cropit({
            imageState: {
                src: "{{url('public/uploads/deProduct/'.$deProduct->image)}}",
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
        });
    });
</script>