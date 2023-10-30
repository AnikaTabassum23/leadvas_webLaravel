
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
                    <tr>
                        <td colspan="9" class="emptyMessage">Empty</td>
                    </tr>
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


