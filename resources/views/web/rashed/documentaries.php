@extends('web.layouts.default')

@section('js')
<style type="text/css">
  .video-container {
    
    padding-top: 20px!important;


  }
   

</style>

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
@stop
@section('content')

  {{-- <section>
            @foreach($documentaries as $documentarie)
                <div class="video-box"><a class="fancybox-media"  data-caption="" href="http://vimeo.com/{{$documentarie->video}}"><img src="{{url('uploads/documentaries/'.$documentarie->video_thumb)}}" alt="video" /> </a></div>

            @endforeach
            <div class="clr"></div>

  </section> --}}
  <section>
        <div class="centered-container-narratives">
            @foreach($documentaries as $documentarie)
          <div class="video-container">
                @if ($documentarie->media_id==1)
                  <div class='embed-container'>
                      <iframe  src='http://player.vimeo.com/video/{{$documentarie->video}}' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen allow=autoplay></iframe>
                  </div>
                @elseif ($documentarie->media_id==2)
                <div class='embed-container'>
                    <iframe width="875" height="200" src='https://www.youtube.com/embed/{{$documentarie->video}}' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif

              }
               {{$documentarie->title}}
          </div>

      <span class="narrative-text">
        {{$documentarie->title}}
      </span>
      
            @endforeach
    </div>
    
    

  </section>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82759526-1', 'auto');
  ga('send', 'pageview');

</script>
@stop

