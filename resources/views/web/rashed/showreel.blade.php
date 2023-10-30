@extends('web.layouts.default')
@section('content')

	
        <section>
		<div class="centered-container">
			<div class="video-container">
                                <!-- <div class='embed-container'>
                                   <iframe width="875" height="200" src="https://www.youtube.com/embed/0Jn4dJOkr-g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div> -->
                                <div class='embed-container'>

				                      @if ($demo->media_id==1)  
				                          <iframe src='http://player.vimeo.com/video/{{$demo->video}}' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				                      @elseif  ($demo->media_id==2)
				                      
											<iframe width="875" height="200" src='https://www.youtube.com/embed/{{$demo->video}}' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                
				                       @endif
								</div>
								
                                   

                                
			</div>
			
			<div class="demoreel fr">
				{{$demo->title}}
			</div>
		</div>
		
		<div class="clr"></div>
	</section>
@stop
