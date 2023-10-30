<?php $panelTitle = "Service Request Progress"; ?>
@include("panelStart")

<style>
    /*Start vertical Wizard*/

    .verticalwiz {
        display: block;
        list-style: none;
        position: relative;
        width: 100%
    }

    .verticalwiz a:hover,.verticalwiz a:active,.verticalwiz a:focus {
        text-decoration: none
    }

    .verticalwiz li {
        display: block;
        height: 100%;
        min-height: 90px;
        max-width: 215px;
        width: 100%;
    }

    .verticalwiz li:before {
        border-top: 3px solid #55606E;
        content: "";
        display: block;
        font-size: 0;
        overflow: auto;
        position: relative;
        top: 10px;
        right: 0;
        width: 100%;
        z-index: 1;
        transform: rotate(90deg) translateY(87px);
        left: 0;
        max-width: 50%;
        margin: 0 auto;
        text-align: center;
    }
    .verticalwiz li.complete .step {
        background: #0aa66e;
        padding: 1px 6px;
        border: 3px solid #55606E
    }

    .verticalwiz li .step i {
        font-size: 10px;
        font-weight: 400;
        position: relative;
        top: -1.5px
    }

    .verticalwiz li .step {
        background: #B2B5B9;
        color: #fff;
        display: inline;
        font-size: 15px;
        font-weight: 700;
        line-height: 12px;
        padding: 7px 13px;
        border: 3px solid transparent;
        border-radius: 50%;
        line-height: normal;
        position: relative;
        text-align: center;
        z-index: 2;
        transition: all .1s linear 0s
    }

    .verticalwiz li.active .step,.verticalwiz li.active.complete .step {
        background: #0bb94e;
        color: #fff;
        font-weight: 700;
        padding: 7px 13px;
        font-size: 15px;
        border-radius: 50%;
        border: 3px solid #7fe583
    }
    .verticalwiz li.deactive .step,.verticalwiz li.deactive.complete .step {
        background: #c00606;
        color: #fff;
        font-weight: 700;
        padding: 7px 13px;
        font-size: 15px;
        border-radius: 50%;
        border: 3px solid #ce4e4e
    }
    .verticalwiz li.pending .step,.verticalwiz li.pending.complete .step {
        background: #c05a06;
        color: #fff;
        font-weight: 700;
        padding: 7px 13px;
        font-size: 15px;
        border-radius: 50%;
        border: 3px solid #ce4e4ecc
    }

    .verticalwiz li.complete .title,.verticalwiz li.active .title {
        color: #2B3D53
    }

    .verticalwiz li .title {
        display: inline;
        font-size: 13px;
        position: relative;
        top: 0;
    }

    .rightab {
        border: 1px solid #dedede;
        border-radius: 3px;
        padding: 30px;
        box-shadow: 1px 1px 11px #ccc;
        min-height: 450px;
        overflow: scroll;
    }

    .vrtwiz{
        width: 300px;
        height: 450px;
        overflow: scroll;
    }
    /* .chainDetails{
        height: 450px;
        overflow: scroll;
    } */
    .verticalwiz{
        margin-top: 40px;
    }

    @media  (min-width: 992px) and (max-width: 1199px){
        .verticalwiz li:before{    
            transform: rotate(90deg) translateY(65px);
            max-width: 60%;
        }
    }
    @media (max-width: 991px){
        .verticalwiz li{
            float: left;
            width: 25%;
            height: auto;
            min-height: inherit;
            margin-bottom: 20px;
            max-width: inherit;
            text-align: center;
        }
        .verticalwiz li:before{
                transform: none;
                max-width: inherit;
                position: absolute;
        }
        .verticalwiz li .title{
            margin-top: 10px;
            text-align: center;
            display: block;
        }
        
    }
    /*End vertical Wizard*/
</style>

<article  style="margin-top: 1em;">
    <div class="widget-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12 col-md-3">
                    <div class="vrtwiz">
                        <ul class="verticalwiz">
                            @if ($serviceRequestedChains)
                                @foreach ($serviceRequestedChains as $key => $serviceRequestedChain)
                                    <li class="@if($serviceRequestedChain->approve_status == 1) active @elseif($serviceRequestedChain->approve_status == 2) deactive @elseif($serviceRequestedChain->active_chain_req == 1 && $serviceRequestedChain->approve_status == 0) pending @endif" data-target="#step{{$key+1}}">
                                        @if($serviceRequestedChain->approve_status != 0) 
                                            <a href="#tab{{$key+1}}" 
                                            data-toggle="tab" 
                                            url="{{ route('provider.approvalSystem.provider.approvalSystem.requestProgressDetails', ['id'=>$serviceRequestedChain->id, 'service_req_id'=>$serviceRequestedChain->service_req_id]) }}" id="{{$serviceRequestedChain->id}}" 
                                            class="active sidebarEmployee" 
                                            data-toggle="tooltip" 
                                            data-placement="top"
                                            @if ($serviceRequestedChain->approve_status == 1)
                                            title="Request Approved"
                                            @else
                                            title="Request Decline"
                                            @endif
                                            > 
                                                <span class="step">{{$key+1}}</span> 
                                                <span class="title">{{$serviceRequestedChain->employee_name}}</span> 
                                            </a>
                                        @else
                                            <a data-toggle="tooltip" 
                                            data-placement="top" 
                                            @if ($serviceRequestedChain->active_chain_req == 1 && $serviceRequestedChain->approve_status == 0)
                                                title="Request Pending"
                                            @endif
                                            > 
                                                <span class="step">{{$key+1}}</span> 
                                                <span class="title" style="color: gray;">{{$serviceRequestedChain->employee_name}}</span> 
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="rightab">
                        <div class="tab-content" id="chainDetails">
                            
                            <div class="attatchment">
                                @if (!empty($approve_all_records))
                                    @foreach ($approve_all_records as $attachment)
                                        <div class="bs-callout bs-callout-info fade in">
                                            <h4>{{ $attachment->employee_name }}</h4>
                                            {!! $attachment->note !!}
                                            <ul class="file-ul">
                                                    {{-- {{dd($attachment->attachment_name)}} --}}
                                                <li class="file-list">
                                                    <a href="#" data-src="{{url('public/uploads/request_approved/'.$attachment->attachment_name)}}" class="documentModal">
                                                        <div class="attachment-img">
                                                            {{-- {{dd(Helper::getFileThumb($attachment->attachment_name))}} --}}
                                                            <img src="{{ Helper::getFileThumb($attachment->attachment_name) }}" alt="">
                                                        </div>
                                                        <span class="attachment-title">{{ $attachment->attachment_name }}</span>
                                                    </a>
                                                </li>
                                                    
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif
                                
                                <a class="btn btn-default btn-sm ajax-link mt15" href="serviceRequest" type="button">Back to List</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
    
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();   
        $('.sidebarEmployee').on('click', function (e){
            e.preventDefault();

            let route = $(this).attr('url');

            $.ajax({
                url: route,
                type: 'get', 
                success: function(result) {
                    $('#chainDetails').html(result);
                }
            });

        });
    });
</script>

@include("panelEnd")