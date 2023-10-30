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
                        <th width="5%" data="1">No.</th>
                        <th width="35%">Title</th>
                        <th width="25%" data="2">Request From</th>
                        <th width="15%">Note</th>
                        <th width="10%">Feedback</th>
                        <th width="10%">Accept</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Request From</th>
                        <th>Note</th>
                        <th>Feedback</th>
                        <th>Accept</th>
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
                            <td>
                                <button url="viewRequestedNote?infoId={{ $serviceInfo->id }}" 
                                    class="add-btn btn btn-info btn-xs" 
                                    view-type="modal" 
                                    modal-size="medium" 
                                    type="button">
                                        <i class="glyphicon glyphicon-eye-open mr5"></i> 
                                        View Note
                                </button>
                            </td>
                            <td class="show_feedback">
                            @if( $serviceInfo->seen_status == 1)
                                <button url="info-feedback?infoId={{ $serviceInfo->id }}" 
                                    class="add-btn btn btn-info btn-xs feedback_btn" 
                                    view-type="modal" 
                                    modal-size="large" 
                                    type="button">
                                        <i class="glyphicon glyphicon-pencil mr5"></i> 
                                        Feedback
                                </button>
                            @endif
                            </td>
                            <td>
                                <button class="btn-xs btn @if( $serviceInfo->seen_status != 1) btn-warning @else btn-success @endif accept"  value="{{$serviceInfo->id }}" @if( $serviceInfo->seen_status != 1) '' @else disabled @endif> 
                                    @if( $serviceInfo->seen_status == 0)
                                        <i class="icon mr5 glyphicon glyphicon-remove"></i> Accept
                                    @else
                                        <i class="icon mr5 glyphicon glyphicon-ok"></i> Accepted
                                    @endif
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else    
                    <tr>
                        <td colspan="6" class="emptyMessage">Empty</td>
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
        $(".accept").click(function(){
            var id = $(this).attr('value');
            //$(this).closest('tr').find('td').val('hello');
            var $selector = $(this);
            let parentTr = $selector.closest('tr');
            parentTr.find('.accept').attr('disabled',true);
            parentTr.find('.accept').removeClass('btn-warning');
            parentTr.find('.accept').addClass('btn-success');
            parentTr.find('.accept').html(`
                <i class="icon mr5 glyphicon glyphicon-ok"></i> Accepted
            `);

            $.ajax({
                url: "{{route('provider.approvalSystem.infoAcceptStatus')}}",
                type: "GET",
                data: {id:id},
                success: function (data) {
                    parentTr.find(".show_feedback").html(`
                        <button url="info-feedback?infoId=${id}" 
                            class="add-btn btn btn-info pull-left btn-xs feedback_btn" 
                            view-type="modal" 
                            modal-size="large" 
                            type="button">
                                <i class="glyphicon glyphicon-pencil mr5"></i> 
                                Feedback
                        </button>
                    `);
                }
            });

        });

    });
</script>
