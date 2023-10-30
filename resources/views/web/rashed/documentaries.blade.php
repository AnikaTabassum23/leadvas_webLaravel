@extends('web.layouts.default')

@section('js')
<style type="text/css">
  .video-container {
    
    padding-top: 20px!important;
   

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
            @foreach($documentaries as $documentary)
                <div class="video-box"><a class="fancybox-media"  data-caption="" href="http://vimeo.com/{{$narrative->video}}"><img src="{{url('uploads/narrative/'.$narrative->video_thumb)}}" alt="video" /> </a></div>

            @endforeach
            <div class="clr"></div>

  </section> --}}
  <section>
    <div class="centered-container-narratives">
      @if(count($documentaries))
          
           @foreach($documentaries as $documentary)
                <div class="video-container">
                      @if ($documentary->media_id==1)
                        <div class='embed-container'>
                            <iframe  src='http://player.vimeo.com/video/{{$documentary->video}}' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        </div>
                      @elseif ($documentary->media_id==2)
                      <div class='embed-container'>
                          <iframe width="875" height="200" src='https://www.youtube.com/embed/{{$documentary->video}}' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                      @endif
                </div>
            <div class="narrative-text">
              {{$documentary->title}}
            </div>
            
              @endforeach
      @else
        <div style="text-align:center; margin-top: 30%; font-size: 35px;  "><span style="border:1px solid #666666; padding: 5px; color:#666666;">COMING TOGETHER</span></div>     
      @endif      

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

