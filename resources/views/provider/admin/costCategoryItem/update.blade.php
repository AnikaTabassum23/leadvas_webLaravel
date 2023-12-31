<?php $panelTitle = "Cost Calculation Update"; ?>
<form type="update" panelTitle="{{$panelTitle}}" class="form-load form-horizontal group-border stripped">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-lg-2 col-md-3 control-label required">Cost Category Name</label>
        <div class="col-lg-10 col-md-9">
            <input autofocus required name="name" placeholder="Cost Category Name" class="form-control" value="{{$costCategoryItem->name}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2">
            <button type="submit" class="btn btn-default ml15">Update Cost Category</button>
        </div>
    </div>
</form>