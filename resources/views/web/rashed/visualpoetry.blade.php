@extends('web.layouts.default')

<style>
.video-box {

    position: relative!important;
}

.video-box a{
  color: white!important;
  text-decoration: none!important;
}
.visual_name {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
  line-height: 1.2!important;
  text-align: center;
  width: 80%;
  
}

.share-button {
  position: absolute;
  bottom: 8px;
  right: 16px;
  color: white;
  display: none;
}
.share-button a{
  color: white;


  }

</style>

<script src="{!! asset('public/assets/js/html5.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery-1.10.1.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('public/fancybox/jquery.fancybox-video.js') !!}"></script>
<script src="{!! asset('public/fancybox/helpers/jquery.fancybox-media.js') !!}"></script>
<script>
     $(document).ready(function() {
            $('.fancybox-media').fancybox({
                    openEffect  : 'none',
                    closeEffect : 'none',
                    'closeBtn'  : false, 
                    autoSize    : false, 
                    helpers : {
                            title : { type : 'outside' },
                            media : {}
                    },
                    beforeShow: function(){
                        this.title = this.title + " " + $(this.element).data("caption");
                    }
            });
            $(".fancybox").fancybox({
                    'type': 'iframe',
                    'onComplete': function(){
                    setTimeout( function() {$.fancybox.close(); },1000); // 3000 = 3 secs
                }
           });
    });  
</script>

<!-- <style type="text/css">
    .fancybox-inner { 
     width: 975px;
    height: auto;
    position: fixed;
    top: 31px;
    left: 150px;
    opacity: 1;
    overflow: visible;
}
</style> -->

<!-- <style type="text/css">
* {padding:0;margin:0;box-sizing:border-box;}
#video {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    height: 0;
}
#video iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style> -->

   

@section('content')
	<section>
        @foreach($comm as $c)
            @if ($c->media_id==1)
                    <div class="video-box" id="video-box{{$c->id}}" onmouseenter="mouseEnter('{{$c->id}}')" onmouseleave="mouseLeave('{{$c->id}}')">
                        <a class="fancybox-media"  data-caption="{{$c->video_description}} "href="http://vimeo.com/{{$c->video}}"><img src="{{url('public/uploads/visualpoetry/'.$c->video_thumb)}}" alt="video" /> 

                                <span class="visual_name" id="visual_name">
                                    {{$c->video_title}}
                                    
                                </span>    


                        </a>
                    </div>
             @elseif ($c->media_id==2)

            

    
                    <div class="video-box" id="video-box{{$c->id}}" onmouseenter="mouseEnter('{{$c->id}}')" onmouseleave="mouseLeave('{{$c->id}}')" >
                        <a class="fancybox-media" data-caption="{{$c->video_description}} "href="http://youtube.com/embed/{{$c->video}}?autoplay=1"><img src="{{url('public/uploads/visualpoetry/'.$c->video_thumb)}}" alt="video" /> 

                            <span class="visual_name" id="visual_name">
                                            {{$c->video_title}}
                                            
                            </span>    

                        </a>

                    </div>
              @endif
        @endforeach
        <div class="clr"></div>
	</section>
@stop
<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-82759526-1', 'auto');
        ga('send', 'pageview');

</script>

<script type="text/javascript">
    $(document).ready(function() {
// Fit video content to display area, ignoring title text.
$('.fitVideo').fancybox({
    helpers: {

        // Enable the media helper to better handle video.
        media: true,

        // Put comments within the white border.
        title: {
            type: 'inside'
        }
    },

    // Do not use this because it tries to fit title text as well.
    fitToView: false,

    // Prevent the introduction of black bars when resized for mobile.
    aspectRatio: true,

    // Restrict content to the display dimensions.
    maxWidth: "85%",
    maxHeight: "85%",

    // Change the title keyword to 'caption' to avoid title text in tooltips.
    beforeLoad: function() {
        this.title = $(this.element).attr('caption');
    },

    // Override the default iframe dimensions with manually set dimensions.
    afterLoad: function() {
        this.width = $(this.element).data("width");
        this.height = $(this.element).data("height");
    }
});
});
</script>

<script>
    function mouseEnter(id) {
      $('#video-box'+id).find("#visual_name").css("display", "block");
      // $('#video-box'+id).find("#share-button").css("display", "block");
    }
    
    function mouseLeave(id) {
      $('#video-box'+id).find("#visual_name").css("display", "none");
      // $('#video-box'+id).find("#share-button").css("display", "none");
    }

$(document).ready(function() {
  $("a.aaa").fancybox().trigger('click');
});
 

</script>

