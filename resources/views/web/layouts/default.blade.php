<!DOCTYPE html>
<html lang="en-us">
<head>

<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="website">
<meta property="og:title" content="Rashed Zaman | Cinematographer" />
<meta property="og:image" content="{{url('public/img/rashedzaman.png')}}" />



<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{$title}}</title>
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/styles.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/styles-responsive.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/custom.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/font-awesome.css') !!}" />

<link href='http://fonts.googleapis.com/css?family=Raleway:600,700,500,400' rel='stylesheet' type='text/css'/>

<link type="text/css" rel="stylesheet" href="{!! asset('public/fancybox/jquery.fancybox.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/social-share-kit.css')!!}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<link rel="shortcut icon" href="{!! asset('public/img/favicon.ico') !!}" type="image/x-icon">

@yield('css') 
<script src="{!! asset('public/assets/js/html5.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery-1.10.1.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('public/fancybox/jquery.fancybox-video.js') !!}"></script>
<script src="{!! asset('public/fancybox/helpers/jquery.fancybox-media.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/social-share-kit.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
    @include('web.includes.nav')
    
    @yield('content')

    
    
    @yield('js') 
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-82759526-1', 'auto');
        ga('send', 'pageview');

        $(document).ready(function() {

            $('#LinkA').on('click', function(e) {
                e.preventDefault();
                let clickedUrl = $(this).attr('clickedUrl');
                if (clickedUrl) {
                    $.ajax({
                        url : "{{route('sortLinkStore')}}",
                        type: "POST",
                        data: {_token: "{{ csrf_token() }}", link: clickedUrl},
                        dataType: 'json',
                        success:function(data){
                            var status = parseInt(data.status);
                            if(status == 1) {
                                let base_url = window.location.origin;
                                shortLink = `${base_url}/${data.code}`;
                                $('#ex1 .shareLinkModal #sortLink').val(shortLink);
                            }
                        }
                    });

                }
            });

        });
        
        function copyLink() {
            /* Get the text field */
            var copyText = document.getElementById("sortLink");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
            /* Copy the text inside the text field */
            document.execCommand("copy");
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied !!!";
        }
        function copiedLink() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Click to Copy";
        }
        
        SocialShareKit.init();

    </script>      
</body>
</html>
