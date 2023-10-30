<?php $__env->startSection('title'); ?>
    Home Page

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
  <?php echo $__env->make('web.home.baner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Tailor Online Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-tailoronline">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Hi! We’re Tailor Online</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit inchieach voluptate velit esse cillum dolore eu fugiat.</p>
										<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sitateu voluptatem accusantium doloremque laudantium.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="place_of_order.html">Start Customizing</a>
										<a class="tg-btn" href="howitwork.html">Video Tutorial</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg tg-shortcodemultiimgs">
									<figure><img src="<?php echo asset('public/frontend/images/img-01.jpg'); ?>" alt="image description"></figure>
									<figure><img src="<?php echo asset('public/frontend/images/img-02.jpg'); ?>" alt="image description"></figure>
									<figure><img src="<?php echo asset('public/frontend/images/img-03.jpg'); ?>" alt="image description"></figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Tailor Online End
			*************************************-->
			<!--************************************
					Statastic Start
			*************************************-->
			<section class="tg-sectionspace tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-statastics" class="tg-shortcode tg-statastics">
							<div class="tg-statastic">
								<span class="tg-statasticicon"><i class="icon-Icon_11"></i></span>
								<h2><span data-from="0" data-to="598" data-speed="8000" data-refresh-interval="50">598</span></h2>
								<h3>Happy Customers</h3>
							</div>
							<div class="tg-statastic">
								<span class="tg-statasticicon"><i class="icon-Icon_19"></i></span>
								<h2><span data-from="0" data-to="1240" data-speed="8000" data-refresh-interval="50">1240</span></h2>
								<h3>Location Pinned</h3>
							</div>
							<div class="tg-statastic">
								<span class="tg-statasticicon"><i class="icon-Icon_08"></i></span>
								<h2><span data-from="0" data-to="2300" data-speed="8000" data-refresh-interval="50">2300</span></h2>
								<h3>Suits Sketched</h3>
							</div>
							<div class="tg-statastic">
								<span class="tg-statasticicon"><i class="icon-Icon_18"></i></span>
								<h2><span data-from="0" data-to="3650" data-speed="8000" data-refresh-interval="50">3650</span></h2>
								<h3>Good Relation Built</h3>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Statastic End
			*************************************-->
			<!--************************************
					Tailor Online Work Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
							<div class="tg-sectionhead">
								<div class="tg-heading">
									<h2>How Tailor Online Works</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat.</p>
								</div>
							</div>
						</div>
						<div class="tg-shortcode tg-tailoronlinework">
							<ul class="tg-customsuitprocess">
								<li>
									<div class="tg-process">
										<figure class="tg-processimg">
											<span class="tg-processicon">01</span>
											<img src="<?php echo asset('public/frontend/images/process/img-01.jpg'); ?>" alt="image description">
										</figure>
										<div class="tg-processtitle">
											<h3>Select Suit You Like</h3>
										</div>
										<div class="tg-description">
											<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ut labore etaiate dolore magna.</p>
										</div>
									</div>
								</li>
								<li>
									<div class="tg-process">
										<figure class="tg-processimg">
											<span class="tg-processicon">02</span>
											<img src="<?php echo asset('public/frontend/images/process/img-02.jpg'); ?>" alt="image description">
										</figure>
										<div class="tg-processtitle">
											<h3>Customize As You Want</h3>
										</div>
										<div class="tg-description">
											<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ut labore etaiate dolore magna.</p>
										</div>
									</div>
								</li>
								<li>
									<div class="tg-process">
										<figure class="tg-processimg">
											<span class="tg-processicon">03</span>
											<img src="<?php echo asset('public/frontend/images/process/img-03.jpg'); ?>" alt="image description">
										</figure>
										<div class="tg-processtitle">
											<h3>Deliver To Your Door Step</h3>
										</div>
										<div class="tg-description">
											<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ut labore etaiate dolore magna.</p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Tailor Online Work End
			*************************************-->
			<!--************************************
					Measurments Start
			*************************************-->
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-userfriendlymeasurments">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>User Friendly Measurments</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="http://www.codezel.com/tailors-online/customizer/?pid=8" target="_blank">Start Customizing</a>
										<a class="tg-btn" href="howitwork.html">Video Tutorial</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<figure><img src="<?php echo asset('public/frontend/images/img-04.png'); ?>" alt="image description"></figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Measurments End
			*************************************-->
			<!--************************************
					Customization Steps Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-detailedcustomizationsteps">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<div id="tg-showcasesliderone" class="tg-showcaseslider">
										<ul>
											<li><img src="<?php echo asset('public/frontend/images/steps/img-01.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/steps/img-02.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/steps/img-03.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/steps/img-04.jpg'); ?>" alt="image description"></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Detailed Customization Steps</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">buy now</a>
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">View Screenshots</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Customization Steps End
			*************************************-->
			<!--************************************
					Woocommerce Start
			*************************************-->
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-Woocommerce">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-push-1">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 tg-verticalmiddle">
										<div class="tg-shortcodetext">
											<div class="tg-heading">
												<h2><span>Compatible With</span>Woocommerce</h2>
											</div>
											<div class="tg-description">
												<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 hidden-xs col-sm-12 hidden-sm col-md-6 col-lg-5 tg-verticalmiddle">
										<div class="tg-shortcodeimg">
											<figure><img src="<?php echo asset('public/fronend/images/img-06.png'); ?>" alt="image description"></figure>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Woocommerce End
			*************************************-->
			<!--************************************
					Order & Email Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-orderandemailsystem">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<figure><img src="<?php echo asset('public/frontend/images/img-07.png'); ?>" alt="image description"></figure>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Order &amp; Email System</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">View Screenshots</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Order & Email End
			*************************************-->
			<!--************************************
					Free Icons Start
			*************************************-->
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-freeiconpack">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Free Icons Pack</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiatiea dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullaceo laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">View All icons</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<figure>
										<figcaption><h2>FREE PREMIUM TAILOR ICONS PACK</h2></figcaption>
										<img src="<?php echo asset('public/frontend/images/img-08.jpg'); ?>" alt="image description">
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Free Icons End
			*************************************-->
			<!--************************************
					Admin Panel Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-adinpanel">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Powerful Admin Panel</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									<div class="tg-btns">
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">View Demo</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<div id="tg-showcaseslidertwo" class="tg-showcaseslider">
										<ul>
											<li><img src="<?php echo asset('public/frontend/images/admin/img-01.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/admin/img-01.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/admin/img-01.jpg'); ?>" alt="image description"></li>
											<li><img src="<?php echo asset('public/frontend/images/admin/img-01.jpg'); ?>" alt="image description"></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Admin Panel End
			*************************************-->
			<!--************************************
					Tailor Your Hand Start
			*************************************-->
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-shortcode tg-adinpanel">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodeimg">
									<figure><img src="<?php echo asset('public/frontend/images/img-09.png'); ?>" alt="image description"></figure>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 tg-verticalmiddle">
								<div class="tg-shortcodetext">
									<div class="tg-heading">
										<h2>Tailor In Your Hand</h2>
									</div>
									<div class="tg-description">
										<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiatiea dolore magna aliqua aseenim ad minim veniam, quis nostrud exercitation ullaceo laboris nisi ut aliquip ex ea commodo consequat.</p>
										<p>Duis aute irure dolor in reprehenderit inchieach voluptate velit esse cillum dolore eu fugiat cepteur sint occaecat cupidatat non proident.</p>
									</div>
									<ul class="tg-apps">
										<li><a href="javascript:void(0);"><i class="fa fa-android"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-windows"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-apple"></i></a></li>
									</ul>
									<div class="tg-btns">
										<a class="tg-btn" href="https://codecanyon.net/item/tailor-online-woocommerce-plugin-for-online-custom-tailoring/19812760" target="_blank">View Screenshots</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Tailor Your Hand End
			*************************************-->
			<!--************************************
					Built In Assets Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
							<div class="tg-sectionhead">
								<div class="tg-heading">
									<h2>Free Built In Assets</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat.</p>
								</div>
							</div>
						</div>
						<div class="tg-shortcode tg-builtinassets">
							<ul class="tg-builtinassetslist">
								<li>
									<div class="tg-builtinasset">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
											<div class="row">
												<div class="tg-shortcodeimg">
													<figure><img src="<?php echo asset('public/frontend/images/img-10.jpg'); ?>" alt="image description"></figure>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
											<div class="row">
												<div class="tg-shortcodetext">
													<h2>Free Blazer Images</h2>
													<div class="tg-description">
														<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ireae etaiate dolore magna enim ad minim veniam.</p>
													</div>
													<ul class="tg-themeliststyletick">
														<li>05 Lapels Design</li>
														<li>06 Blazer Buttons Design</li>
														<li>06 Blazer Pockets Design</li>
														<li>03 Blazer Vents Design</li>
														<li>10+ Linings Patterns 10+</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tg-builtinasset">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
											<div class="row">
												<div class="tg-shortcodeimg">
													<figure><img src="<?php echo asset('public/fronend/images/img-11.jpg'); ?>" alt="image description"></figure>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
											<div class="row">
												<div class="tg-shortcodetext">
													<h2>Free Pent Images</h2>
													<div class="tg-description">
														<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ireae etaiate dolore magna enim ad minim veniam quis nostrud eixercition ullamco laboris nisi ut aliquip exeation.</p>
													</div>
													<ul class="tg-themeliststyletick">
														<li>Cuff Design 02</li>
														<li>Pleats Design 02</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tg-builtinasset">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
											<div class="row">
												<div class="tg-shortcodeimg">
													<figure><img src="<?php echo asset('public/frontend/images/img-12.jpg'); ?>" alt="image description"></figure>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
											<div class="row">
												<div class="tg-shortcodetext">
													<h2>Free Shirt Images</h2>
													<div class="tg-description">
														<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ireae etaiate dolore magna enim ad minim veniam quis nostrud eixercition ullamco laboris nisi ut aliquip exeation.</p>
													</div>
													<ul class="tg-themeliststyletick">
														<li>Pocket Design 02</li>
														<li>Shirt Collar Design 03</li>
														<li>Shirt Sleeve Design 04</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="tg-builtinasset">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-right">
											<div class="row">
												<div class="tg-shortcodeimg">
													<figure><img src="<?php echo asset('public/frontend/images/img-13.jpg'); ?>" alt="image description"></figure>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 pull-left">
											<div class="row">
												<div class="tg-shortcodetext">
													<h2>Free Blazer Images</h2>
													<div class="tg-description">
														<p>Consectetur adipisicing elite sed dotas eiusmod temp incididunt ireae etaiate dolore magna enim ad minim veniam quis nostrud eixercition ullamco laboris nisi ut aliquip exeation.</p>
													</div>
													<ul class="tg-themeliststyletick">
														<li>Pockets Design 02</li>
														<li>Shirt Collar Design 02</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Built In Assets End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DeMeraki\resources\views/web/home/home.blade.php ENDPATH**/ ?>