<div class="form-inline">
    <div class="row datatables_header">
        <div class="col-md-5 col-xs-12">
            <div class="input-group">
                <input name="search" event="enter" class="data-search form-control" id="search-input" value="{{@$search}}" kl_virtual_keyboard_secure_input="on" placeholder="Search">
                <span class="input-group-btn"><button name="search" event="click" valueFrom="#search-input" class="data-search btn btn-default" type="button">Go</button></span>
            </div>
        </div>
        <div class="col-md-7 col-xs-12">
            @if($access->create)
            <button class="add-btn btn btn-default pull-right btn-sm" type="button" style="margin-left: 12px;"><i class="glyphicon glyphicon-plus mr5"></i>Add New</button>
            @endif
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
                        <th width="35%">Title</th>
                        <th width="25%" data="2">Request To</th>
                        <th width="10%">Note</th>
                        <th width="10%" data="3">Created Time</th>
                        <th width="10%">Seen Status</th>
                        @if($access->edit || $access->destroy)
                        <th width="13%">Action</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Request To</th>
                        <th>Note</th>
                        <th>Created Time</th>
                        <th>Seen Status</th>
                        @if($access->edit || $access->destroy)
                        <th>Action</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $serviceInfos; ?>
                @if(count($serviceInfos)>0)  
                @foreach($serviceInfos as $serviceInfo)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$serviceInfo->title}}</td>
                        <td>{{Helper::getEmployeeName($serviceInfo->req_to_employee_id)}}</td>
                        {{-- <td>{{strip_tags($serviceInfo->note)}}</td> --}}
                        <td>
                            <button url="viewSendedNote?id={{ $serviceInfo->id }}" 
                                class="add-btn btn btn-info btn-xs" 
                                view-type="modal" 
                                modal-size="medium" 
                                type="button">
                                    <i class="glyphicon glyphicon-eye-open mr5"></i> 
                                    View Note
                            </button>
                        </td>
                        <td>{{date('d-m-Y', strtotime($serviceInfo->created_at))}}</td>
                        <td>
                            @if($serviceInfo->seen_status==1)
                                <span class="text-success">Received</span>
                            @else
                                <span class="text-warning">Pending</span>
                            @endif
                        </td>
                        @if($access->edit || $access->destroy)
                            <td>
                                @if($serviceInfo->seen_status==0)
                                <i class="fa fa-edit" id="edit" data="{{$serviceInfo->id}}"></i>
                                <i class="fa fa-trash-o" id="delete" data="{{$serviceInfo->id}}"></i>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else    
                    <tr>
                        <td colspan="7" class="emptyMessage">Empty</td>
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
