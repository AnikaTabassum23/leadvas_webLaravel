<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="A powerful, adaptable, affordable products are made for the way your business runs today.">
    <meta name="keywords" content="CRM,Enterprise,Cloud">
    <meta name="author" content="leadvas">
    <link rel="shortcut icon" href="<?php echo asset('resource/ico/favicon.png'); ?>">
    <meta name="google-site-verification" content="Xu2B86JsxD6JHRl5CzQB_LzSdgi77AnntKxQ4_ghCAc" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Facebook-->
    <meta property="og:title" content="<?php $title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo asset('resource/img/fb_share.jpg'); ?>" />

    <meta property="og:description"
        content="A powerful, adaptable, affordable products are made for the way your business runs today." />
    <!--Twitter-->
    <meta name="twitter:title" content="doc2p">
    <meta name="twitter:image" content="<?php echo asset('resource/img/fb_share.jpg'); ?>" />
    <meta name="twitter:description"
        content="A powerful, adaptable, affordable products are made for the way your business runs today." />
    <!--Google+-->
    <meta itemprop="name" content="<?php $title; ?>" />
    <meta itemprop="description"
        content="A powerful, adaptable, affordable products are made for the way your business runs today." />
    <meta itemprop="image" content="<?php echo asset('resource/img/fb_share.jpg'); ?>" />

    <title><?php $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo asset('resource/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom bootstrap styles -->
    <link href="<?php echo asset('resource/css/overwrite.css'); ?>" rel="stylesheet">
    <!-- Font -->
    <link href="<?php echo asset('resource/fonts/open-sans/stylesheet.css'); ?>" rel="stylesheet">
    <!-- Font icons -->
    <link href="{!! asset('resource/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('resource/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet">
    <link href="{!! asset('resource/fonts/pe-icon-7-stroke/css/helper.css'); ?>" rel="stylesheet">
    <!-- Animate css -->
    <link href="{!! asset('resource/css/animate.css'); ?>" rel="stylesheet">
    <!-- flexslider -->
    <link href="<?php echo asset('resource/css/flexslider.css'); ?>" rel="stylesheet">
    <!-- Owl carousel -->
    <link href="<?php echo asset('resource/css/owl.carousel.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('resource/css/owl.theme.css'); ?>" rel="stylesheet">
    <link href="<?php echo asset('resource/css/owl.transitions.css'); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo asset('resource/css/style.css'); ?>" rel="stylesheet">
    <!-- Theme skin -->
    <link href="<?php echo asset('resource/skins/default.css'); ?>" rel="stylesheet" />
    <!-- Slider -->
    <link href="<?php echo asset('resource/css/slider.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('resource/css/custom.css'); ?>" rel="stylesheet" />
    <style>
        .pricing-head {
            text-align: center;
        }

    </style>
</head>

<body>
    <!-- Start preloading -->
    <div id="loading" class="loading-invisible">
        <i class="pe-7s-refresh pe-spin pe-3x pe-va"></i><br />
        <p>Please wait...</p>
    </div>
    <!-- End preloading -->

    <!-- Start header -->
    <header>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php  ?>"><img src="<?php echo asset('resource/img/leadvas.png'); ?>"
                            alt="" /></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a id="GoToHome" href="#home" class="selected">Home</a></li>
                        <li><a id="GoToFeatures" href="#features">Features</a></li>
                        <li><a id="GoToDesc" href="#description">Description</a></li>
                        <li><a id="GoToGallery" href="#screenshot">Screenshot</a></li>
                        <li><a id="GoToPricing" href="#pricing">Pricing</a></li>
                        <li><a id="GoToContact" href="#contact">Contact</a></li>
                    </ul>
                    <div class="navbar-right">
                        <a href="login" class="btn btn-gray">Login</a>
                        <a href="demo" class="btn btn-primary">Try Demo</a>

                    </div>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <section id="home" class="home-wrapper parallax polygon-bg" style="padding-top: 200px;">
        <div class="home-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-us">
                            <p>Questions? Call us at +88 01760242469 </p>
                            <div class="contact-address">
                                <h2>Streamline Your Approval Process</h2>
                                <a href="#"><img alt="" style="width:70%;"
                                        src="<?php echo asset('resource/img/device.png'); ?>"></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-block">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="title">Set Your Password</div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="note"> Please fill out all fields.</div>
                                </div>
                            </div>
                            <form id="registerForm" action="<?php echo e(route('accountVerificationAction')); ?>"
                                method="post" class="form-horizontal register-form">
                                <?php echo csrf_field(); ?>
                                <div id="errorMsg">
                                    <?php if(!empty($errorMsg)): ?>
                                        <div class="text-danger" style="margin:-10px 0 5px"><?php echo e($errorMsg); ?></div>
                                    <?php endif; ?>
                                </div>

                                <input type="hidden" name="user_token" value="<?php echo e($token); ?>">

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required data-error="Please enter your password">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Password Confirmation" required
                                                data-error="Password Confirmation Required">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="submit-button">
                                            <button class="btn btn-common" id="submit" type="submit">Submit</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <!-- Start footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="social-network">
                        <a href="https://www.facebook.com/leadvas/" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://plus.google.com/b/102119945745084910200/102119945745084910200/about?hl=en"
                            target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a href="https://www.linkedin.com/company/leadvas?trk=company_name" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/channel/UCMmxeNUZ4iV70RVORfIDn0w" target="_blank"><i
                                class="fa fa-youtube"></i></a>
                    </div>
                    <p><?php  date('Y'); ?> &copy; Copyright <a href="http://www.iisbd.com/" target="_blank">INNOVATION
                            Information System</a> All rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- End footer -->
<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo asset('resource/js/jquery.js'); ?>"></script>
<script src="<?php echo asset('resource/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo asset('resource/js/jquery-easing-1.3.js'); ?>"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    document.getElementById("loading").className = "loading-visible";
    var hideDiv = function () {
        document.getElementById("loading").className = "loading-invisible";
    };
    var oldLoad = window.onload;
    var newLoad = oldLoad ? function () {
        hideDiv.call(this);
        oldLoad.call(this);
    } : hideDiv;
    window.onload = newLoad;

</script>
<!-- End preloading -->
<!-- Fixed navigation -->
<script src="<?php echo asset('resource/js/navigation/waypoints.min.js'); ?>"></script>
<script src="<?php echo asset('resource/js/navigation/jquery.smooth-scroll.js'); ?>"></script>
<script src="<?php echo asset('resource/js/navigation/navbar.js'); ?>"></script>
<!-- Wow -->
<script src="<?php echo asset('resource/js/wow/wow.min.js'); ?>"></script>
<script src="<?php echo asset('resource/js/wow/setting.js'); ?>"></script>
<!-- flexslider -->
<script src="<?php echo asset('resource/js/flexslider/jquery.flexslider.js'); ?>"></script>
<script src="<?php echo asset('resource/js/flexslider/setting.js'); ?>"></script>
<!-- counters -->
<script src="<?php echo asset('resource/js/counters/jquery.appear.js'); ?>"></script>
<script src="<?php echo asset('resource/js/counters/stellar.js'); ?>"></script>
<script src="<?php echo asset('resource/js/counters/setting.js'); ?>"></script>
<!-- Owl carousel -->
<script src="<?php echo asset('resource/js/owlcarousel/owl.carousel.js'); ?>"></script>
<script src="<?php echo asset('resource/js/owlcarousel/setting.js'); ?>"></script>
<!-- Totop -->
<script src="<?php echo asset('resource/js/totop/jquery.ui.totop.js'); ?>"></script>
<script src="<?php echo asset('resource/js/totop/setting.js'); ?>"></script>
<!-- Slider Range -->
<script src="<?php echo asset('resource/js/bootstrap-slider.js'); ?>"></script>
<!-- Contact validation -->
<script src="<?php echo asset('resource/js/validation.js'); ?>"></script>
<!-- Customn javascript -->
<script src="<?php echo asset('adapter/javascript'); ?>"></script>
<script src="<?php echo asset('resource/js/custom.js'); ?>"></script>
<script src="<?php echo asset('resource/js/custom_index.js'); ?>"></script>

<script type="text/javascript">
    var section = "<?php  $section; ?>";
    $(document).ready(function () {
        $("#features").addClass("contain desc-wrapp gray-bg");
        if (section != '') {
            window.location.hash = section;
        }
    });

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-88811873-1', 'auto');
    ga('send', 'pageview');

</script>

</html>
<?php /**PATH E:\laragon\www\LeadVasWeb\resources\views/web/emails/accountVerify.blade.php ENDPATH**/ ?>