<style>
	.btn_sp {
    border: 1px solid #F26621;
    padding: 5px;
    border-radius: 5px;
    background-color: #F26621;
    color: white;
}
</style>

<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addressinfo">
								<li>
									<i class="icon-map-marker"></i>
									<address>House-23, Road-02, Shekhertek, Mohammadpur, Dhaka-1207, Bangladesh</address>
								</li>
								<li>
									<i class="icon-clock"></i>
									<time datetime="2016-10-10">Sat - Fri 9:00 AM - 10:00 PM</time>
								</li>
								<li>
									<i class="icon-phone-handset"></i>
									<span>+8801919887156</span>
								</li>
							</ul>
							<ul class="tg-socialicons">
								<li class="tg-facebook"><a href="https://www.facebook.com/DeMeraki.com.bd" target="_blank"><i class="fa fa-facebook"></i></a></li>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-logonav">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="<?php echo route('home'); ?>"><img src="<?php echo asset('public/frontend/images/logo.png'); ?>" alt="company logo here"></a></strong>
							<div class="tg-navigationarea">
								<nav id="tg-nav" class="tg-nav">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
										<ul>
											<li class="menu-item-has-children current-menu-item">
												<a href="javascript:void(0);">hOME</a>
												<ul class="sub-menu">
													<li><a href="index.html">Home-1</a></li>
													<li class="current-menu-item"><a href="indexv2.html">Home-2</a></li>
												</ul>
											</li>
											<!-- <li><a href="shirt.html">Shirts</a></li>
											<li><a href="blazers.html">Blazers</a></li>
											<li><a href="pants.html">Pants</a></li> -->
											<li><a href="<?php echo route('how_work'); ?>">How It Works</a></li>
											<li><a href="<?php echo route('contact'); ?>">Contact</a></li>
											<li class="menu-item-has-children">
                                                <a href="javascript:void(0);">Ready Market</a>
												<ul class="sub-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="javascript:void(0);">shop</a>
														<ul class="sub-menu">
                                                            <li><a href="shop.html">shop</a></li>
															<li><a href="shopdetail.html">Product Detail</a></li>
														</ul>
													</li>
													<li class="menu-item-has-children">
                                                        <a href="javascript:void(0);">blog</a>
														<ul class="sub-menu">
                                                            <li><a href="newsgrid.html">blog grid</a></li>
															<li><a href="newslist.html">blog list</a></li>
															<li><a href="newsdetail.html">blog detail</a></li>
														</ul>
													</li>
													<li><a href="aboutus.html">About</a></li>
													<li><a href="404.html">404</a></li>
													<li><a href="comingsoon.html">coming soon</a></li>
												</ul>
											</li>
                                            <li><a href="<?php echo route('user_account'); ?>"><span class="btn_sp">Login</span></a></li>
											<li><a href="<?php echo route('user_account'); ?>"><span class="btn_sp">Signup</span></a></li>
										</ul>
									</div>
								</nav>
								<a class="tg-btn tg-btnstartcustomizing" href="<?php echo route('placeorder'); ?>">Place Order</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->

<?php /**PATH E:\laragon\www\DeMeraki\resources\views/web/includes/header.blade.php ENDPATH**/ ?>