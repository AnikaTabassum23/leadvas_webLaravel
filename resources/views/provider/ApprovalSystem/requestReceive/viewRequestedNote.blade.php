<style>
	.modal-footer .btn-success{
		display: none;
	}
	.file-ul {
		list-style: none;
		padding-left: 10px;
	}
	.file-ul .file-list {
		display: inline-block;
		padding: 6px 14px;
		background-color: #f4f7f7;
		border: 1px solid #cdd0d7;
		border-radius: 14px;
		cursor: pointer;
	}
	.file-ul .file-list a {
		text-decoration: none;
		padding: 2px;
	}
	.file-ul .file-list a .attachment-img {
		float: left;
	}
	.file-ul .file-list a .attachment-img img {
		height: 19px;
		width: 20px;
	}
	.file-ul .file-list a span {
		margin-left: 3px;
		padding: 2px;
	}
</style>

	<div class="row">
		<div class="col-md-2 text-left">
			@if($service_request_Info->image)
				<img src="{{asset('public/uploads/provider_user_images')}}/{{$service_request_Info->image}}"/>
			@else
				<img src="{{asset('public/img/avatar.jpg')}}" height="80" width="80" />
			@endif
		</div>
		<div class="col-md-10">
			<b>Name:</b> {{$service_request_Info->userName}}</br>
			<b>Designetion:</b> {{$service_request_Info->designation_name}}</br>
			<b>Depertment:</b> {{$service_request_Info->department_name}}</br>
			<b>Created Time:</b> {{date('d-m-Y', strtotime($service_request_Info->created_at))}}</br>
		</div>
		<div class="col-md-12">
			<hr>
			{!!$service_request_Info->note!!}
		</div>
		<div class="col-md-12">
			@if (count($request_send_attatchments)>=1)
			<hr>
			<div class="attatchment">
				<div class="bs-callout bs-callout-info fade in">
					<ul class="file-ul">
						@foreach ($request_send_attatchments as $attachment)
							<li class="file-list">
								<a href="#" data-src="{{url('public/uploads/requestSendAttachment/'.$attachment->attachment_name)}}" class="documentModal">
									<div class="attachment-img">
										<img src="{{ Helper::getFileThumb($attachment->attachment_name) }}" alt="">
									</div>
									<span class="attachment-title">{{ $attachment->attachment_name }}</span>
								</a>
							</li>
						@endforeach
					</ul>
					{{-- <ul class="file-ul">
						<li class="file-list">
							<a href="#" data-src="http://server/ApprovalSystem/public/uploads/request_approved/1612084058.jpeg" class="documentModal">
								<div class="attachment-img">
									<img src="http://server/ApprovalSystem/public/file_icon/png.png" alt="">
								</div>
								<span class="attachment-title">1612084058.jpeg</span>
							</a>
						</li>
					</ul> --}}
				</div>
            </div>
			@endif
		</div>
	</div>
