<?php $__env->startSection('title'); ?>
    Contact us

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    	<!--************************************
				Inner Page Banner Start
		*************************************-->
		<div class="tg-innerpagebanner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="tg-breadcrumb">
							<li><a href="<?php echo route('home'); ?>">Home</a></li>
							<li class="tg-active">contact us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Page Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout tg-paddingzero">
			<!--************************************
					Tailor Online Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
							<div class="tg-sectionhead">
								<div class="tg-heading">
									<h2>Team Behind Tailor Online</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat.</p>
								</div>
							</div>
						</div>
						<div class="tg-shortcode tg-tailoronline">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div id="tg-locationmap" class="tg-locationmap"></div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
								<form class="tg-themeform tg-formcontactus">
									<fieldset>
										<div class="form-group">
											<input type="text" class="form-control" name="yourname" placeholder="Your Name">
										</div>
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="Phone">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="subject" placeholder="Subject">
										</div>
										<div class="form-group">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
										<button type="submit" class="tg-btn">send now</button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Tailor Online End
			*************************************-->
			<!--************************************
					Newsletter Start
			*************************************-->
			<section class="tg-sectionspace tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<form class="tg-themeform tg-formnewsletter">
								<fieldset>
									<div class="tg-formtitle">
										<h3><span>Get Latest Updates &amp; Info</span>Signup For Newsletter!</h3>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" name="email" placeholder="Enter Your Email Here">
										<button type="button" class="tg-btn">Signup Now</button>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Newsletter End
			*************************************-->
			<!--************************************
					Trusted Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
							<div class="tg-sectionhead">
								<div class="tg-heading">
									<h2>Trusted By Many</h2>
								</div>
								<div class="tg-description">
									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etaiate dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-13">
							<ul class="tg-brands">
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-01.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-02.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-03.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-04.png'); ?>"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-05.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-06.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-07.png'); ?>" alt="image description"></a></figure></li>
								<li class="tg-brand"><figure><a href="javascript:void(0);"><img src="<?php echo asset('public/frontend/images/brands/img-08.png'); ?>" alt="image description"></a></figure></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Trusted End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DeMeraki\resources\views/web/contact/contact.blade.php ENDPATH**/ ?>