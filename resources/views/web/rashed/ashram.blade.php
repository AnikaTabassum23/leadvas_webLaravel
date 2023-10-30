
@extends('web.layouts.default')
@section('css')
<style>
	@media (max-width: 480px) {
		.centered-container{
			margin-top: 0px!important;
		}
	}
</style>
@stop
@section('content')


        <section>
		<div class="centered-container" style="margin-top:-325px;">
			<div class="video-container">
                <div class='embed-container'>
                    <iframe src='http://player.vimeo.com/video/{{$ashram_home->video_id}}' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
			</div>

			<div class="asram-description" style="margin-top: 1.9%;">
				{!!$ashram_home->content!!}
			</div>
			{{-- 
			<div class="demoreel fr" style="margin-top: 0px">
				{{$demo->title}}
			</div> --}}
		@if ($ashram_albam!=null)
				<div class="ashram-btn">
					{{-- <a href="https://www.flickr.com/photos/rasheddop/sets/72157679122238808/" target="_blank" class="btn">
						SANDBAG PICTURE ALBUM
					</a>
					--}}



					{{--<a href="{{ route('ashramPhotography') }}" class="btn">--}}

					

					<a href="{{ route('ashramGallery',['id' => $ashram_albam->id, 'albumName' => $ashram_albam->gallery_name]) }}" class="btn">	
						SANDBAG PICTURE ALBUM
					</a> 
					
				</div>
		@endif
		</div>
		
		<div class="clr"></div>
	</section>

@stop