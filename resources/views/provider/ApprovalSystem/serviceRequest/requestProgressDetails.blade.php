
    @if (count($approve_records) > 0)
        
    @foreach ($approve_records as $key => $data)
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

                            @if (count($data->attachments) > 0)
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
                <a class="btn btn-default btn-sm ajax-link mt15" href="serviceRequest" type="button">Back to List</a>
            </div>
        </div> 
    @endforeach
    
    @endif