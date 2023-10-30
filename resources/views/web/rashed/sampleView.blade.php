<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{$title}}</title>

<meta name="description" content="{{$about->content}}">
<meta name="keywords" content="Rashed Zaman, Cinematographer, Bangladesh">
<meta name="author" content="Rashed Zaman">
<!--Facebook-->
<meta property="og:title" content="{{$title}}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{url('/')}}"/>
<meta property="og:image" content="{{url('uploads/about/'.$about->image)}}" />
<meta property="og:description" content="{{$about->content}}" />
<!--Twitter-->
<meta name="twitter:title" content="{{$title}}">
<meta name="twitter:url" content="{{url()}}">
<meta name="twitter:image" content="{{url('uploads/about/'.$about->image)}}">
<meta name="twitter:description" content="{{$about->content}}">
<!--Google+-->
<meta itemprop="name" content="{{$title}}">
<meta itemprop="description" content="{{$about->content}}">
<meta itemprop="image" content="{{url('uploads/about/'.$about->image)}}">

{{HTML::style('assets/css/styles.css')}}
{{HTML::style('assets/css/styles-responsive.css')}}
{{HTML::style('assets/css/custom.css')}}

<link href='http://fonts.googleapis.com/css?family=Raleway:600,700,500,400' rel='stylesheet' type='text/css'>

{{HTML::script('assets/js/html5.js')}}
<!-- Add jQuery library -->
{{HTML::script('assets/js/jquery-1.10.1.min.js')}}
<!-- Add mousewheel plugin (this is optional) -->
{{HTML::script('assets/js/jquery.mousewheel-3.0.6.pack.js')}}
<!-- Add fancyBox -->
{{HTML::style('fancybox/jquery.fancybox.css')}}
{{HTML::script('fancybox/jquery.fancybox-video.js')}}
<!-- Add fancyBox 
{{HTML::script('lightbox/videolightbox.js')}}
{{HTML::script('lightbox/swfobject.js')}}
{{HTML::script('lightbox/jquery.tools.min.js')}} -->

<!-- Optionally add helpers - button, thumbnail and/or media -->
{{HTML::script('fancybox/helpers/jquery.fancybox-media.js')}}

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

</head>
<body>
	@include('nav')
	<section>
            @foreach($comm as $c)
                <div class="video-box">
                  <a class="fancybox-media"  data-caption="{{$c->title}} "href="http://vimeo.com/{{$c->video}}">
                    <img src="{{url('uploads/commercial/'.$c->video_thumb)}}" alt="video" /> 
                  </a>
                </div>
            @endforeach
            <div class="clr"></div>
	</section>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82759526-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
