<?php $panelTitle = "Service Request Create"; ?>

@include("panelStart")

<div class="form-inline">
    <div class="row datatables_header">
        <div class="col-md-5 col-xs-12">
            <div class="input-group">
                <input name="search" event="enter" class="data-search form-control" id="search-input" value="{{@$search}}" kl_virtual_keyboard_secure_input="on" placeholder="Search">
                <span class="input-group-btn"><button name="search" event="click" valueFrom="#search-input" class="data-search btn btn-default" type="button">Go</button></span>
            </div>
        </div>
        <div class="col-md-7 col-xs-12">
            @include("perPageBox")
        </div>
    </div>
</div>
<div id=myTabContent2 class=tab-content>
    <div class="tab-pane fade active in" id=home2>
        <div class="form-inline">
            <table cellspacing="0" class="responsive table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="20%" data="1">Title</th>
                        <th width="25%" data="1">Request From</th>
                        <th width="25%" data="1">Request To</th>
                        <th width="20%" data="1">Created Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Request From</th>
                        <th>Request To</th>
                        <th>Created Time</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $serviceInfos; ?>
                @if(count($serviceInfos)>0)  
                @foreach($serviceInfos as $serviceInfo)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$serviceInfo->title}}</td>
                        <td>{{Helper::getEmployeeName($serviceInfo->req_from_employee_id)}}</td>
                        <td>{{Helper::getEmployeeName($serviceInfo->req_to_employee_id)}}</td>
                        <td>{{date('d-m-Y', strtotime($serviceInfo->created_at))}}</td>
                    </tr>
                @endforeach
                @else    
                    <tr>
                        <td colspan="9" class="emptyMessage">Empty</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    @include("pagination")
                </div>
            </div>
        </div>
    </div>
</div>

@include("panelEnd")
