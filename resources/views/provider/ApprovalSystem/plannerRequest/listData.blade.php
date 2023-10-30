
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
                        <th width="30%">title</th>
                        <th width="45%" data="1">Details</th>
                        <th width="20%" data="2">Approved Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Approved Date</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $paginate = $plannerRequests; ?>
                @if(count($plannerRequests)>0)  
                @foreach($plannerRequests as $plannerRequest)
                    <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$plannerRequest->title}}</td>
                        <td>{!!$plannerRequest->details!!}</td>
                        <td>{{date('d-m-Y', strtotime($plannerRequest->final_approved_date))}}</td>
                    </tr>
                @endforeach
                @else    
                    <tr>
                        <td colspan="5" class="emptyMessage">Empty</td>
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

