@extends('web.layouts.default')
@section('content')
<style type="text/css">

.about-text {
   
    /*margin-top: 20px!important;*/
    float: left;
}
/*.about-pic{
	height: 425px!important;
}

.centered-container {
   
    margin-top: -20%!important;
}
*/
/*.vimeo-wrapper {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: -1;
   pointer-events: none;
   overflow: hidden;
}
*/

.vimeo-wrapper {
position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
	height: 435px;
	width: 100%;
	-webkit-transform-style: preserve-3d;
	overflow: hidden;
}
.vimeo-wrapper iframe {
   width: 100vw;
   height: 56.25vw; /* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
   min-height: 100vh;
   min-width: 177.77vh; /* Given a 16:9 aspect ratio, 16/9*100 = 177.77 */
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);

}

/*.about-pic .fullwidth-video {
	height: 371px!important;
}
*/

@media only screen and (max-width: 600px) {
	  .about-text {
	   
	    margin-top: -255px!important;

		}

		.about-pic{
			height: 425px!important;
		}
}



	</style>
	<section>
		<div class="centered-container about-centered">
			@if ($about->ext_status==1)
				<div class="about-pic">
					
					<img src="{{url('public/uploads/about/'.$about->image)}}" alt="image" />
					


				</div>
				 <div class="about-text">{!!$about->content!!} </div>
			@else
				<div class="about-pic" style="margin-top: -30%">
					@if ($about->media_id==1)

						<div class="vimeo-wrapper">
						   <iframe src="https://player.vimeo.com/video/{{$about->video_id}}?background=1&autoplay=1&loop=1&byline=0&title=0"
						           frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

						</div>
				    @elseif  ($about->media_id==2)
		  				<div class="vimeo-wrapper">
			  				<iframe   frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player"  src="https://www.youtube.com/embed/{{$about->video_id}}?playlist2djh7Pfkf0M&autoplay=1&autohide=0&disablekb=1&controls=0&showinfo=0&modestbranding=1&loop=1&fs=0&rel=0&enablejsapi=1&widgetid=1"></iframe>
			  			</div>
			  			 
			  		@endif
			  	</div>
			  	<div class="about-text" style="margin-top: 450px">{!!$about->content!!} </div>

            @endif	

			
           
            <!-- <div class="socialLinkLogo" style="margin-top: 45px; text-align: center;">
            	<a href="{{url('public/uploads/cv/RZ-CV.pdf')}}" target="_blank" style="padding:0 3px; font-size: 12px" ><i class="fa fa-file-pdf"></i>Curriculum Vitae<i class="fa fa-download"></i></a> 
	            
	      	</div> -->

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
<script>
var player = new Vimeo.Player('js-vimeo-video', {
    background:true
});
player.ready().then(function() {
    player.setVolume(1);
});
</script>