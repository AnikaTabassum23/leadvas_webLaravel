<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A powerful, adaptable, affordable products are made for the way your business runs today.">
	<meta name="keywords" content="CRM,Enterprise,Cloud">
    <meta name="author" content="leadvas">
    <link rel="shortcut icon" href="<?php echo asset('resource/ico/favicon.png'); ?>">
    <meta name="google-site-verification" content="Xu2B86JsxD6JHRl5CzQB_LzSdgi77AnntKxQ4_ghCAc" />
	
	<!--Facebook-->
	<meta property="og:title" content="<?php $title; ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:image" content="<?php echo asset('resource/img/fb_share.jpg'); ?>" />

	<meta property="og:description" content="A powerful, adaptable, affordable products are made for the way your business runs today." />
	<!--Twitter-->
	<meta name="twitter:title" content="doc2p">
	<meta name="twitter:image" content="<?php echo asset('resource/img/fb_share.jpg'); ?>" />
	<meta name="twitter:description" content="A powerful, adaptable, affordable products are made for the way your business runs today." />
	<!--Google+-->
	<meta itemprop="name" content="<?php $title; ?>" />
	<meta itemprop="description" content="A powerful, adaptable, affordable products are made for the way your business runs today." />
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
					<a class="navbar-brand" href="<?php  ?>"><img src="<?php echo asset('resource/img/leadvas.png'); ?>" alt="" /></a>
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
						<a href="" class="btn btn-gray">Login</a>
						<a href="<?php echo asset('resources/views/web/documents/demo.html'); ?>" class="btn btn-primary">Try Demo</a>

					</div>	
				</div><!--/.nav-collapse -->
			</div>
		</div>	
	</header>
	<!-- End header -->
	
	<!-- End home -->
	<section id="home" class="home-wrapper parallax polygon-bg">
		<div class="home-contain">
			<div class="container">
				<div class="row text-center wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-10 col-md-offset-1">
						<h3>Discover a different for your business
							<span>Our powerful, adaptable, affordable products are made for the way your business runs today. With all the complexities businesses, we made the choice of CRM simple. Just use Leadvas CRM and become a hero at work. Leadvas is ready. Are you?</span>
						</h3>
						<!-- <p class="btn-inline">
							<a href="<?php // site_url('demo'); ?>" class="btn btn-primary btn-lg">Try Demo</a>
						</p> -->
						<div class="home-slider">
							<div class="slider-wrapper">
								<div class="imac-device">
									<ul class="slides">
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/slider/img1.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/slider/img2.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/slider/img3.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/slider/img4.jpg'); ?>" alt="" /></a>
										</li>
									</ul>
								</div>
							</div>
							<img src="<?php echo asset('resource/img/imac.png'); ?>" class="img-responsive" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End home -->
	<div class="clearfix"></div>
	<?php
	//  $this->load->view('include/features');
	  ?>
	<?php echo $__env->make('include.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="clearfix"></div>
	<!-- Start description -->
	<section id="description" class="contain">
		<div class="container">
			<div class="row">
				<div class="col-md-7 wow fadeInLeft" data-wow-delay="0.4s">
					<img src="<?php echo asset('resource/img/device.png'); ?>" alt="image description" class="img-responsive">
				</div>
				<div class="col-md-5 margintop40 wow fadeInRight" data-wow-delay="0.4s">
					<div class="accordion clearfix" id="accordion1">
						<div class="accordion-group">
							<div class="accordion-heading">										
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									<i class="pe-7s-angle-down"></i> Flexibility
								</a>
							</div>
							<div id="collapse1" class="accordion-body collapse in">
								<div class="accordion-inner">
									<p>
									Leadvas offers the most innovative, flexible and affordable CRM in the market and delivers the best all-around any CRM solution in the industry. However, the real value of Leadvas goes far beyond the low total cost of ownership customers have enjoyed for more than a decade.
									</p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
									<i class="pe-7s-angle-down"></i> Personalize and customize
								</a>
							</div>
							<div id="collapse2" class="accordion-body collapse">
								<div class="accordion-inner">
									<p>
									Powerful workflow tools in Leadvas allow you to automate and optimize even the most complex business practices  to heighten customer experiences, drive productivity and reduce operating costs. 
									</p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
									<i class="pe-7s-angle-down"></i> Workflow Automation
								</a>
							</div>
							<div id="collapse3" class="accordion-body collapse">
								<div class="accordion-inner">
									<p>
									Work smarter, not harder. Keep your CRM up to date so you can spend less time managing your schedule and more time talking to prospects. 
									</p>
								</div>
							</div>
						</div>								
					</div>					
				</div>
			</div>
		</div>
	</section>
	<!-- End description -->
	<div class="clearfix"></div>
	<!-- Start counter -->
	<section id="counter-wrapper">
		<div class="counter-contain">
			<div class="container">
				<div class="row text-center appear stats wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-12">
						<h3>More than 400 user use Leadvas</h3>
						<p>Lets see how to change your company by Leadvas.</p>
					</div>
				</div>
				<div class="row text-center appear stats wow fadeInDown" data-wow-delay="0.4s">
					<div class="col-md-4 col-md-offset-4">
						<span id="counter-download" class="counter-number">434</span>
						<span class="counter-text">Users</span>
					</div>
					<!--<div class="col-md-2">
						<span id="counter-view" class="counter-number">625</span>
						<span class="counter-text">Windows user</span>
					</div>
					<div class="col-md-2">
						<span id="counter-android" class="counter-number">348</span>
						<span class="counter-text">Android user</span>
					</div>
					<div class="col-md-2">
						<span id="counter-ios" class="counter-number">227</span>
						<span class="counter-text">IOS user</span>
					</div>	-->				
				</div>
			</div>
		</div>
	</section>
	<!-- End counter -->
	<div class="clearfix"></div>
	<!-- Start screenshot -->
	<section id="screenshot" class="contain">
		<div class="container">
			<div class="row text-center wow fadeInUp" data-wow-delay="0.4s">
				<div class="col-md-10 col-md-offset-1 wow fadeInUp" data-wow-delay="0.4s">
					<h3 class="heading"><span>Secreenshot</span> Our product screenshot</h3>
				</div>
			</div>
		</div>
		<div id="screenshot-contain" class="wow fadeInDown" data-wow-delay="0.4s">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-10 col-md-offset-1">
						<div class="screenshot-slider">
							<div class="screenshot-wrapper">
								<div class="flexslider text-center">
									<ul class="slides">
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/screenshot/img1.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/screenshot/img2.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/screenshot/img3.jpg'); ?>" alt="" /></a>
										</li>
										<li>
											<a href="#"><img src="<?php echo asset('resource/img/screenshot/img4.jpg'); ?>" alt="" /></a>
										</li>
									</ul>
								</div>
							</div>
							<img src="<?php echo asset('resource/img/browser.png'); ?>" class="img-responsive" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End screenshot -->
	<div class="clearfix"></div>
	<!-- Start pricing -->
	<section id="pricing" class="contain gray-bg">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-10 col-md-offset-1 wow fadeInUp" data-wow-delay="0.4s">
					<h3 class="heading" style="margin-bottom:15px; padding:15px 30px"><span>Pricing table</span>Every Feature on Every Plan</h3>
					<div style="margin-bottom: 20px">
						Leadvas includes every feature on every plan. <br/>
						So, no matter the size of your website, you get access to all of our powerful tools.
					</div>
				</div>
			</div>
			<div class="row wow fadeInDown" data-wow-delay="0.4s">
				<div class="col-md-4">
					<div class="pricing-wrapper">
						<div class="pricing-head">
							<h4>Free</h4>
							<span class="pricing-price">&#2547;0</span>
							<p>Free trial 30 days</p>
							
						</div>
						<ul>
							<li><strong>30 day</strong> trial</li>
							<li><strong>No</strong> support</li>
							<li><strong>No</strong> update</li>
							<li><strong>No</strong> security</li>
						</ul>
						<div class="pricing-bottom">
							<a href="<?php   ?>" class="btn btn-default btn-bordered btn-lg">Get it now</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="pricing-wrapper">
						<form action="<?php ?>" method="post">
							<div class="pricing-head popular">
								<h4>Business</h4>
								<div class="pricing-price"><span class="currency_symbol">&#2547;</span><span class="package_price">2500/m</span></div>
								
								<p>How many users do you have?</p>
							</div>
							<ul>
								<li><strong><span class="user_amount">1</span> user</strong> </li>
								<li><input type="text" name="user" class="slider" value="1" data-slider-min="1" data-slider-max="51" data-slider-step="1" data-slider-value="1"  data-slider-tooltip="hide"></li>
								<li><strong>Free</strong> support</li>
								<li><strong>Free</strong> update</li>
								<li><strong>1 GB</strong> / user</li>
								<li><strong>Data</strong> security</li>
							</ul>
							<div class="pricing-bottom" id="business_btn">
								<button type="submit" class="btn btn-primary btn-lg"> Get it now </button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="pricing-wrapper">
						<div class="pricing-head">
							<h4>Corporate</h4>
							<span class="pricing-price">Negotiable</span>
							<p>Best for corporate</p>
						</div>
						<ul>
							<li><strong>Unlimited</strong> user </li>
							<li><strong>Unlimited</strong> bandwidth</li>
							<li><strong>Unlimited</strong> Storage</li>
							<li><strong>Data</strong> Security</li>
						</ul>
						<div class="pricing-bottom">
							<a href="<?php  ?>" class="btn btn-default btn-bordered btn-lg">Request Now</a>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>
	<!-- End pricing -->
	
	<div class="clearfix"></div>
	
	<!-- Start download -->	
	<section id="download">
		<div class="download-wrapper">
			<div class="container">
				<div class="row wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-8 col-md-offset-2">
						<h3>Try for Free 30 days</h3>
						<!--<p>Risk Free. 60 Day Money Back Guarantee.</p>-->
						<form>
							<fieldset class="subscribe-form">
								<button class="subscribe-button" type="button" onclick="location.href = '<?php  ?>';">Get Your Free Demo</button>
							</fieldset>	
						</form>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End download -->
	<div class="clearfix"></div>
	<!-- Start testimoni -->
	<section id="testimoni" class="contain">
		<div class="container">
			<div class="row text-center wow fadeInUp" data-wow-delay="0.4s">
				<div class="col-md-12">
					<h3 class="heading"><span>Testimonials</span>People said about Leadvas</h3>
				</div>
			</div>
		</div>
		<div id="owl-testimoni" class="owl-carousel wow fadeInDown" data-wow-delay="0.4s">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="testimonial">
							<blockquote>
							Most powerful tools to manage the lead and easy way to monitoring the sales team.
							So user frankly
							</blockquote>
							<span class="testimoni-sparator"></span>
						</div>
						<div class="clearfix"></div>
						<div class="testimoni-author">
							<div class="author-info">
								<h5>Mohammad Sanowarul Islam</h5>
								<p><a href="#">Managing Director</a></p>
							</div>
							<img src="<?php echo asset('resource/img/testimoni/avatar1.png'); ?>" alt="" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="testimonial">
							<blockquote>
							The business process update in time by using Leadvas and customer behaviour analysis help to go the destination.
							</blockquote>
							<span class="testimoni-sparator"></span>
						</div>
						<div class="clearfix"></div>
						<div class="testimoni-author">
							<div class="author-info">
								<h5>Shah Imrul Kaeesh</h5>
								<p><a href="#">Managing Director</a></p>
							</div>
							<img src="<?php echo asset('resource/img/testimoni/avatar2.png'); ?>" alt="" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="testimonial">
							<blockquote>
							After using Leadvas CRM in my company we feel our sales monitoring more easier. This is great tools. 
							</blockquote>
							<span class="testimoni-sparator"></span>
						</div>
						<div class="clearfix"></div>
						<div class="testimoni-author">
							<div class="author-info">
								<h5>Sirajul Islam</h5>
								<p><a href="#">CEO</a></p>
							</div>
							<img src="<?php echo asset('resource/img/testimoni/avatar3.png'); ?>" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End testimoni -->
	<div class="clearfix"></div>
	<!-- Start contact -->
	<section id="contact">
		<div class="contact-contain">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12 wow fadeInUp" data-wow-delay="0.4s">
						<h3 class="heading"><span>Contact</span>Get in touch with us</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 wow fadeInDown" data-wow-delay="0.4s">
						<form id="contactform" action="<?php?>" method="post" class="validateform" name="leaveContact">
							<div class="clearfix"></div>
							<div id="sendmessage" style="padding-right:15px">
								<div class="alert alert-success marginbot35">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									Your message has been sent. Thank you!
								</div>							
							</div>	
							<div id="set_message" style="padding-right:15px"></div>
							<ul class="listForm">
								<li>
									<i class="pe-7s-users"></i>
									<input class="form-control input-name" type="text" name="name" data-rule="required" data-msg="Required field" placeholder="Enter your full name" />
									<div class="validation"></div>
								</li>
								<li>
									<i class="pe-7s-mail"></i>
									<input class="form-control input-email" type="text" name="email" data-rule="email" data-msg="Please enter a valid email" placeholder="Enter your email address" />	
									<div class="validation"></div>
								</li>
								<li class="push">
									<i class="pe-7s-paper-plane"></i>
									<textarea class="form-control input-message" rows="6" name="message" data-rule="required" data-msg="Please write something for us" placeholder="Write something for us"></textarea>
									<div class="validation"></div>
								</li>
								<li class="push text-center">
									<input type="submit" value="Send message" class="btn btn-primary btn-lg" name="Submit" />
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End contact -->
	
	<div class="clearfix"></div>
		
	<!-- Start footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="social-network">
						<a href="https://www.facebook.com/leadvas/" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="https://plus.google.com/b/102119945745084910200/102119945745084910200/about?hl=en" target="_blank"><i class="fa fa-google-plus"></i></a>
						<a href="https://www.linkedin.com/company/leadvas?trk=company_name" target="_blank"><i class="fa fa-linkedin"></i></a>
						<a href="https://www.youtube.com/channel/UCMmxeNUZ4iV70RVORfIDn0w" target="_blank"><i class="fa fa-youtube"></i></a>
					</div>
					<p><?php  date('Y'); ?> &copy; Copyright <a href="http://www.iisbd.com/" target="_blank">INNOVATION Information System</a> All rights Reserved.</p>
				</div>
			</div>
		</div>	
	</footer>
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
		var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
		var oldLoad = window.onload;
		var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
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
		$(document).ready(function() {
			$("#features").addClass("contain desc-wrapp gray-bg");
			if(section != '') {
				window.location.hash = section;
			}
		});
		
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-88811873-1', 'auto');
	  ga('send', 'pageview');
		
	</script>
  </body>
</html>
<?php /**PATH E:\laragon\www\LeadVasWeb\resources\views/web/home/home.blade.php ENDPATH**/ ?>