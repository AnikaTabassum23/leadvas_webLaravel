@extends('web.layouts.default')

<script src="{!! asset('public/assets/js/html5.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery-1.10.1.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('public/fancybox/jquery.fancybox-video.js') !!}"></script>
<script src="{!! asset('public/fancybox/helpers/jquery.fancybox-media.js') !!}"></script>
<script>
    $(document).ready(function() {
        var sz = window.screen.availWidth;
        if(sz > 480 ) {
            $(".fancybox-button").fancybox({
                    prevEffect	: 'none',
                    nextEffect	: 'none',
                    closeBtn	: false,
//                    helpers		: {
//                            title	: { type : 'over' },
//                            buttons	: {}
//                    },
//                    beforeShow : function() {
//
//                        var data = (this.title ? '' + this.title + '' : '') + (this.index + 1) + '<span>/' + this.group.length + '</span>';
//                        $(".img_no").html(data);
//                    } // beforeShow
            });

            $(".fancybox")
                .attr('rel', 'fancybox-inner')
                .fancybox({
                    type: 'iframe',
                    autoSize : false,
                    beforeLoad : function() {         
                        this.width  = 'auto';  
                        this.height = '100%';
                    }
            });
            
        <?php $image = 1; ?>    
        }
    });
</script>
@section('content')
	<section>
            @foreach($vf as $v)
                <div class="vf-box"><a class="fancybox-button" rel="fancybox-button" @if($image == 1) href="{{url('public/uploads/view_finder/'.$v->main_image)}}" @endif><img src="{{url('public/uploads/view_finder/thumb/'.$v->thumbnail)}}" alt="video" /></a></div>
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
