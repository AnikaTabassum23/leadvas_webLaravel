
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
                        <th width="5%">Type</th>
                        <th width="10%" data="1">Emoloyee Name</th>
                        <th width="25%" data="2">Title</th>
                        <th width="15%" >Details</th>
                        <th width="10%" data="3">Approximate Date</th>
                        <th width="10%" data="4">Amount</th>
                        <th width="10%" data="5">Request Date</th>
                        <th width="5%">Action</th>
                        <th width="5%">Accept</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>type</th>
                        <th>Emoloyee Name</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Approximate Date</th>
                        <th>Amount</th>
                        <th>Request Date</th>
                        <th>Action</th>
                        <th>Accept</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $serviceAprrovedInfos; ?>
                @if(count($serviceAprrovedInfos)>0)  
                @foreach($serviceAprrovedInfos as $serviceAprrovedInfo)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>
                            {{-- @if ($serviceAprrovedInfo->reques_for==1)
                            <span class="label label-success">menual</span>
                            @else 
                            <span class="label label-danger">Chain</span>
                            @endif --}}
                        </td>
                        <td>{{$serviceAprrovedInfo->employee_name}}</td>
                        <td>{{$serviceAprrovedInfo->title}}</td>
                        <td>{{strip_tags($serviceAprrovedInfo->details)}}</td>
                        <td>{{$serviceAprrovedInfo->approximate_date}}</td>
                        <td>{{$serviceAprrovedInfo->approximate_amount}}</td>
                        <td>
                            {{date('d-m-Y', strtotime($serviceAprrovedInfo->request_date))}}
                        </td>
                        <td style="text-align:center" class="show_approved">
                            @if( $serviceAprrovedInfo->receive_status == 1)
                                @if($serviceAprrovedInfo->approve_status==1) 
                                    <a href="requestAprrovedStatus?req_chain_id={{$serviceAprrovedInfo->id}}" panel-title="Service Aprroved" class="btn btn-info pull-right btn-xs ajax-link" style="float: left !important;"><i class="glyphicon glyphicon-eye-open mr5"></i>
                                    Aprroved</a>
                                @else
                                    <a href="requestAprrovedStatus?req_chain_id={{$serviceAprrovedInfo->id}}" panel-title="Service Aprroved" class="btn btn-success pull-right btn-xs ajax-link" disable style="float: left !important;"> Aprrove </a>
                                    @if($serviceAprrovedInfo->approve_status==2)
                                        <span class="text-danger">!You Allready Decline this</span>
                                    @endif
                                @endif
                            @endif
                        </td>
                        <td>
                            <button class="btn-xs btn @if( $serviceAprrovedInfo->receive_status != 1) btn-warning @else btn-success @endif receive"  value="{{$serviceAprrovedInfo->id }}" @if( $serviceAprrovedInfo->receive_status != 1) '' @else disabled @endif> 
                                @if( $serviceAprrovedInfo->receive_status == 0)
                                    <i class="icon mr5 glyphicon glyphicon-remove"></i> Receive
                                @else
                                    <i class="icon mr5 glyphicon glyphicon-ok"></i> Received
                                @endif
                            </button>
                        </td>
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

<script type="text/javascript">
    $(document).ready(function() { 
        $(".receive").click(function(){
            var id = $(this).attr('value');
            var $selector = $(this);
            let parentTr = $selector.closest('tr');
            parentTr.find('.receive').attr('disabled',true);
            parentTr.find('.receive').removeClass('btn-warning');
            parentTr.find('.receive').addClass('btn-success');
            parentTr.find('.receive').html(`
                <i class="icon mr5 glyphicon glyphicon-ok"></i> Received
            `);

            $.ajax({
                url: "{{route('provider.approvalSystem.requestReceiveAcceptStatus')}}",
                type: "GET",
                data: {id:id},
                success: function (data) {
                    parentTr.find(".show_approved").html(`
                        <a href="requestAprrovedStatus?req_chain_id=${id}" panel-title="Service Aprroved" class="btn btn-success pull-right btn-xs ajax-link" disable style="float: left !important;"> Aprrove </a>
                    `);
                }
            });

        });

    });
</script>

