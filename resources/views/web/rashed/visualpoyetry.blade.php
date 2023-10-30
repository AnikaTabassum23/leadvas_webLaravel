@extends('web.layouts.default')

<style>
.visual_name {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
  width: 95%;
  text-align: center;
}
.visual_name a{
  color: white;
  text-decoration: none;
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

@section('content')
	<section>
        @foreach($comm as $c)
            @if ($c->media_id==1)
                    <div class="video-box" id="video-box{{$c->id}}" ><a class="fancybox-media"  data-caption="{{$c->title}} "href="http://vimeo.com/{{$c->video}}"><img src="{{url('public/uploads/visualpoetry/'.$c->video_thumb)}}" alt="video" /> </a>

                <span class="visual_name" id="visual_name">
                    <a href=""  >fsdfgsdfgsdfg  
                    </a>
                 </span>    



                    </div>
             @elseif ($c->media_id==2)
                    <div class="video-box" id="video-box{{$c->id}}"><a class="fancybox-media"  data-caption="{{$c->title}} "href="http://youtube.com/embed/{{$c->video}}?autoplay=1"><img src="{{url('public/uploads/visualpoetry/'.$c->video_thumb)}}" alt="video" /> </a>
                    
                    <span class="visual_name" id="visual_name">
                        <a href=""  >fsdfgsdfgsdfg  
                        </a>
                 </span>    


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

<script>
    function mouseEnter(id) {
      $('#video-box'+id).find("#albam_name").css("display", "block");
      // $('#video-box'+id).find("#share-button").css("display", "block");
    }
    
    function mouseLeave(id) {
      $('#video-box'+id).find("#albam_name").css("display", "none");
      // $('#video-box'+id).find("#share-button").css("display", "none");
    }
 

</script>