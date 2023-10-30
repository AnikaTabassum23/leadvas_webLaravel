<?php $panelTitle = "Cost Calculation Create"; ?>
@include("panelStart")
<form type="create" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Cost Category Name</label>
        <div class="col-lg-10 col-md-9">
            <input autofocus required name="name" placeholder="Cost Category Name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Create Cost Category</button>
        </div>
    </div>
</form>
@include("panelEnd")