<?php $panelTitle = "Service Request Progress"; ?>
@include("panelStart")

<style>
    .timeline.timeline-icons li .timeline-icon{
        left: 15px;
        top: 1px;
    }
    .img-redius{
        border-radius: 100%;
    }
    .not-received{
        color: gray;
        text-decoration: none;
    }
    .not-received:hover{
        color: gray;
        text-decoration: none;
    }
    .deactive{
        color: gray;
        text-decoration: none;
    }
    .deactive:hover{
        text-decoration: none;
    }
    .decline{
        text-decoration: none;
    }
    .decline:hover{
        text-decoration: none;
    }
    .active{
        text-decoration: none;
    }
    .active:hover{
        text-decoration: none;
    }
</style>

<div class="row">
    <div class=col-lg-4>
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            
            <div class=panel-body>
                <ul class="timeline timeline-icons timeline-advanced">
                    @if ($serviceRequestedChains)
                        @foreach ($serviceRequestedChains as $key => $serviceRequestedChain)
                        <?php
                            $today_date= strtotime(date('Y-m-d H:i:s'));
                            $receiveDate_strtotime = strtotime($serviceRequestedChain->receive_date);
                            $str_time = $today_date - $receiveDate_strtotime;
                            //$days = $str_time/ (60 * 60 * 24);
                            
                            $dtF = new \DateTime('@0');
                            $dtT = new \DateTime("@$str_time");
                            $date_time = $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
                            
                            //$date_time = secondsToTime($str_time);
                        ?>
                        @if ($serviceRequestedChain->receive_status == 1) {{--1=received--}}
                            @if ($serviceRequestedChain->approve_status == 1) {{--//1=active--}}
                                <li>
                                    <a href="#" id="{{$serviceRequestedChain->id}}" class="active sidebarEmployee" url="{{ route('provider.approvalSystem.provider.approvalSystem.requestProgressDetails', ['id'=>$serviceRequestedChain->id, 'service_req_id'=>$serviceRequestedChain->service_req_id]) }}" data-toggle="tooltip" data-placement="left" title="Approved">
                                        <h4 class="text-success">{{$serviceRequestedChain->employee_name}}</h4>
                                    </a>
                                    <span class=timeline-subtitle><b>{{$serviceRequestedChain->designation_name}}</b></span> 
                                    <span class=timeline-icon>
                                        {{-- <i class="fa fa-comments"></i> --}}
                                        @if($serviceRequestedChain->image)
                                            <img src="{{asset('public/uploads/provider_user_images')}}/{{$serviceRequestedChain->image}}" height="30" width="30" class="img-redius"/>
                                        @else
                                            <img src="{{asset('public/img/avatar.jpg')}}" height="30" width="30" class="img-redius"  />
                                        @endif
                                    </span>

                                    <span class=timeline-subtitle>{{date('d-m-Y', strtotime($serviceRequestedChain->receive_date))}}</span>
                                    <span class=timeline-subtitle>{{$date_time}} ago</span>
                                </li>
                            @elseif ($serviceRequestedChain->approve_status == 2) {{--//2=decline--}}
                                <li>
                                    <a class="decline" data-toggle="tooltip" data-placement="left" title="Decline">
                                        <h4 class="text-denger">{{$serviceRequestedChain->employee_name}}</h4>
                                    </a>
                                    <span class=timeline-subtitle><b>{{$serviceRequestedChain->designation_name}}</b></span> 
                                    <span class=timeline-icon>
                                        {{-- <i class="fa fa-comments"></i> --}}
                                        @if($serviceRequestedChain->image)
                                            <img src="{{asset('public/uploads/provider_user_images')}}/{{$serviceRequestedChain->image}}" height="30" width="30" class="img-redius"/>
                                        @else
                                            <img src="{{asset('public/img/avatar.jpg')}}" height="30" width="30" class="img-redius"  />
                                        @endif
                                    </span>

                                    <span class=timeline-subtitle>{{date('d-m-Y', strtotime($serviceRequestedChain->receive_date))}}</span>
                                    <span class=timeline-subtitle>{{$date_time}} ago</span>
                                </li>
                            @else {{--received but waiting for approve--}}
                                <li>
                                    <a class="deactive" data-toggle="tooltip" data-placement="left" title="Received but waiting for Approve">
                                        <h4 class="text-warning">{{$serviceRequestedChain->employee_name}}</h4>
                                    </a>
                                    <span class=timeline-subtitle><b>{{$serviceRequestedChain->designation_name}}</b></span> 
                                    <span class=timeline-icon>
                                        {{-- <i class="fa fa-comments"></i> --}}
                                        @if($serviceRequestedChain->image)
                                            <img src="{{asset('public/uploads/provider_user_images')}}/{{$serviceRequestedChain->image}}" height="30" width="30" class="img-redius"/>
                                        @else
                                            <img src="{{asset('public/img/avatar.jpg')}}" height="30" width="30" class="img-redius"  />
                                        @endif
                                    </span>

                                    <span class=timeline-subtitle>{{date('d-m-Y', strtotime($serviceRequestedChain->receive_date))}}</span>
                                    <span class=timeline-subtitle>{{$date_time}} ago</span>
                                </li>
                            @endif
                        @else
                            <li>
                                <a class="not-received" data-toggle="tooltip" data-placement="left" title="Not Received">
                                    <h4>{{$serviceRequestedChain->employee_name}}</h4>
                                </a>
                                <span class=timeline-subtitle><b>{{$serviceRequestedChain->designation_name}}</b></span> 
                                <span class=timeline-icon>
                                    {{-- <i class="fa fa-comments"></i> --}}
                                    @if($serviceRequestedChain->image)
                                        <img src="{{asset('public/uploads/provider_user_images')}}/{{$serviceRequestedChain->image}}" height="30" width="30" class="img-redius"/>
                                    @else
                                        <img src="{{asset('public/img/avatar.jpg')}}" height="30" width="30" class="img-redius"  />
                                    @endif
                                </span>
                            </li>
                        @endif
                        
                        @endforeach
                    @endif
                                             
                </ul>
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            {{-- <div class=panel-heading>
                <h4 class=panel-title>Advanced timeline</h4>
            </div> --}}
            <div class="panel-body" id="chainDetails">
                @if (count($approve_all_records) > 0)
                    @foreach ($approve_all_records as $key => $data)
                        <div class="tab-pane active" id="tab{{$key+1}}">
                            <div class="record">
                                <h4><strong>{{$data->employee_name}} </strong></h4>
                                {!!$data->note!!}
                            </div>
                            <div class="attatchment">
                                {{-- <div class="tab-content" id="myTabContent">
                                    <div id="previous_summery" class="tab-pane fade active in">
                                        <div class="panel-body"> --}}
                
                                            {{-- @foreach ($approve_records as $record) --}}
                                            
                                            @if (count($data->attachments)>0)
                                                <div class="bs-callout bs-callout-info fade in">
                                                {{-- <h4>{{ $data->employee_name }}</h4>
                                                {!! $record->note !!} --}}
                                                    <ul class="file-ul">
                                                        @foreach ($data->attachments as $attachment)
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
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                
                                            {{-- @endforeach --}}
                
                                            {{-- <div class="bs-callout bs-callout-success fade in">
                                                <h4>Success</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, explicabo, doloremque, ullam neque veritatis quasi hic excepturi eum laborum sunt nisi libero natus ab eos autem voluptatum non numquam fuga!</p>
                                            </div>
                                            <div class="bs-callout bs-callout-danger fade in">
                                                <h4>Success</h4>
                                                Content will be loaded one time via jQuery's load method and injected into the .modal-content div. If you're using the data-api, you may alternatively use the href attribute to specify the remote source
                                            </div> --}}
                                        {{-- </div>
                                        <a class="btn btn-default btn-sm ajax-link mt15" href="request-approved" type="button">Back to List</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div> 
                    @endforeach
                @else
                    <h2>No Record Available</h2>
                @endif
                <a class="btn btn-default btn-sm ajax-link mt15" href="serviceRequest" type="button">Back to List</a>
            </div>
        </div>
    </div>
</div>
    
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();   
        $('.sidebarEmployee').on('click', function (e){
            e.preventDefault();

            let route = $(this).attr('url');
            console.log(route);
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