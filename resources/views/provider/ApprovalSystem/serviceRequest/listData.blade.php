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
                        <th width="10%" data="1">Category Name</th>
                        <th width="15%" data="2">Title</th>
                        <th width="25%">Description</th>
                        <th width="12%" data="3">Approximate Date</th>
                        <th width="13%" data="4">Approximate Amount</th>
                        <th width="10%">Poke</th>
                        <th width="10%">View</th>
                        @if($access->edit || $access->destroy)
                        <th width="5%">Action</th>
                        @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Approximate Date</th>
                        <th>Approximate Amount</th>
                        <th>Poke</th>
                        <th>View</th>
                        @if($access->edit || $access->destroy)
                        <th>Action</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $serviceRequests; ?>
                @if(count($serviceRequests)>0)  
                @foreach($serviceRequests as $serviceRequest)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$serviceRequest->category_name}}</td>
                        <td>{{$serviceRequest->title}}</td>
                        <td>{!! $serviceRequest->details !!}</td>
                        <td>{{$serviceRequest->approximate_date}}</td>
                        <td>{{$serviceRequest->approximate_amount}}</td>
                        {{-- <td>
                            <a href="serviceRequestPoke?id={{$serviceRequest->id}}" panel-title="Service Request View" class="btn btn-success btn-xs ajax-link" >Poke</a>
                        </td> --}}
                        <td class="text-center">
                            <button class="btn btn-default btn-xs pokeUser" type="button" value="{{$serviceRequest->id}}">Poke</button>
                        </td>
                        <td>
                            @if ($serviceRequest->request_type == 1)
                                <a href="requestProgress?id={{$serviceRequest->id}}" panel-title="Service Request View" class="btn btn-success btn-xs ajax-link" >Request Progress</a>
                            @endif
                        </td>
                        @if($access->edit || $access->destroy)
                            <td>
                                @if($access->edit)<i class="fa fa-edit" id="edit" data="{{$serviceRequest->id}}"></i>@endif 
                                @if($access->destroy)<i class="fa fa-trash-o" id="delete" data="{{$serviceRequest->id}}"></i>@endif
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else    
                    <tr>
                        <td colspan="8" class="emptyMessage">Empty</td>
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

<script>
    $(document).ready(function() {
        $(".pokeUser").click(function(){
            var requested_chain_id = $(this).val();
            console.log(`{{route('provider.approvalSystem.provider.approvalSystem.serviceRequestPoke')}}`);

            $.ajax({
                url : `{{route('provider.approvalSystem.provider.approvalSystem.serviceRequestPoke')}}`,
                type: "GET",
                data: {"requested_chain_id":requested_chain_id},
                dataType: "json",
                success:function(data){
                    $.gritter.add({
                        // title: data.msg_title,
                        text: data.messege,
                        time: "",
                        close_icon: "entypo-icon-cancel s12",
                        // icon: data.messege_icon,
                        class_name: data.msgType
                    });
                }
            });
        });
    })
</script>