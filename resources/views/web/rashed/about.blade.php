@extends('web.layouts.default')
@section('content')
<style type="text/css">

.about-text {
   
    margin-top: 10px!important;
  
}
.about-pic {
    margin: 0 0 10px;
}
.videobg {
  position: relative;
  width: 100%; /* Set video container element width here */
  height: 420px; /* Set video container element height here */
  overflow: hidden;
  background: #111; /* bg color, if video is not high enough */
  z-index: -1
}

/* horizontally center the video */
.videobg-width {
  position: absolute;
  width: 100%; /* Change width value to cover more area*/
  height: 100%;
  left: -9999px;
  right: -9999px;
  margin: auto;
}

/* set video aspect ratio and vertically center */
.videobg-aspect {
  position: absolute;
  width: 100%;
  height: 0;
  top: -9999px;
  bottom: -9999px;
  margin: auto;
  padding-bottom: 56.25%; /* 16:9 ratio */
  overflow: hidden;
  
}

.videobg-make-height {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
}

.videobg-hide-controls {
  box-sizing: content-box;
  position: relative;
  height: 100%;
  width: 100%;
  /* Vimeo timeline and play button are ~55px high */
  padding: 55px 97.7777px; /* 16:9 ratio */
  top: -55px; 
  left: -97.7777px; /* 16:9 ratio */
}

.videobg iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  border: 0 none;
} 


	</style>
	<section>
		<div class="centered-container">
			
			@if ($about->ext_status==1)
				<div class="about-pic">
					
					<img src="{{url('public/uploads/about/'.$about->image)}}" alt="image" />
					

				</div>	
				
				
			@else
				
					@if ($about->media_id==1)
					<div class="about-pic">
						 <div class="videobg">
							  <div class="videobg-width">
							    <div class="videobg-aspect">
							      <div class="videobg-make-height">
							        <div class="videobg-hide-controls">
							             <iframe src="https://player.vimeo.com/video/434485409?autoplay=1&loop=1&muted=0" frameborder=“0” allowfullscreen allow=autoplay></iframe>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>

					</div>	
				    @elseif  ($about->media_id==2)
				    <div class="about-pic">
						 <div class="videobg">
							  <div class="videobg-width">
							    <div class="videobg-aspect">
							      <div class="videobg-make-height">
							        <div class="videobg-hide-controls">
							            <iframe   frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player"  src="https://www.youtube.com/embed/{{$about->video_id}}?playlist2djh7Pfkf0M&autoplay=1&autohide=0&disablekb=1&controls=0&showinfo=0&modestbranding=1&loop=1&fs=0&rel=0&enablejsapi=1&widgetid=1"></iframe>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>

			  		@endif
			  
			  	

            @endif	
           <div class="about-text">{!!$about->content!!} </div> 
      


            <div class="socialLinkLogo" style="margin-top: 45px; text-align: center;">
            
	            @foreach($sl as $value)
	            	@if ($value->id == 1 || $value->id == 4 || $value->id == 6)
	                	<a href="{{$value->social_link}}" target="_blank" style="padding:0 3px;"><img class="morph" width="30" src="{{url('public/uploads/social_logo/'.$value->social_logo)}}" alt="image" /></a>
	            	@endif
	            @endforeach
	             <a href="{{url('public/uploads/updateCv/'.$cv->attachment)}}" target="_blank" style="padding:0 3px;"><img class="morph" width="30" src="{{url('public/uploads/updateCv/'.$cv->cv_icon)}}" alt="image" /></a>
	      	</div>

         

		</div>
		
		<div class="clr"></div>
	</section>
@stop

	<!-- <script type="text/javascript">
    var timeoutId;
var $videoBgAspect = $(".videobg-aspect");
var $videoBgWidth = $(".videobg-width");
var videoAspect = $videoBgAspect.outerHeight() / $videoBgAspect.outerWidth();

function videobgEnlarge() {
  console.log('resize');
  windowAspect = ($(window).height() / $(window).width());
  if (windowAspect > videoAspect) {
    $videoBgWidth.width((windowAspect / videoAspect) * 100 + '%');
  } else {
    $videoBgWidth.width(100 + "%")
  }
}

$(window).resize(function() {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(videobgEnlarge, 100);
});

$(function() {
  videobgEnlarge();
});
</script> -->

