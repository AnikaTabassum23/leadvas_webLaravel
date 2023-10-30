<style>
.form-wizard .form-wizard-steps li {
    width: 10%!important;

}
li {

    list-style: none!important;
}



</style>

<?php $__env->startSection('body'); ?>
<main id="tg-main" class="tg-main tg-haslayout tg-paddingzero">
	<div class="form-wizard">
		<form action="" method="post" role="form">
			<div class="form-wizard-header">
				<p>Fill all form field to go next step</p>
				<ul class="list-unstyled form-wizard-steps clearfix">
					<li class="active"><span>1</span></li>
					<li><span>2</span></li>
					<li><span>3</span></li>
					<li><span>4</span></li>
				</ul>
			</div>
			<section id="services" class="section pt-5 pb-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-xs-12">

								<!-- <h2>Online Tailoring</h2> -->
								<div class="contact-address">
									<!-- <p>LETS CHANGE YOUR                LIFE STYLE</p> -->
									<a href="#"><img alt="" style="width:85%;margin-top: -25px" src="<?php echo asset('public/frontend/images/signup.png'); ?>"></a>
								</div>


						</div>
						<div class="col-lg-6 col-sm-6 col-xs-12">
							<div class="contact-block">
								<div class="form-group">
									<div class="col-sm-12">
										<!-- <div class="title">Enjoy the online tailoring</div> -->
										<h2>Enjoy the online tailoring</h2>
									</div>
									<div class="col-sm-12">
										<div class="note"> Please fill out all fields.</div>
									</div>
								</div>
								<form id="registerForm" method="post" class="form-horizontal register-form">
									<?php echo csrf_field(); ?>
									<div id="errorMsgDiv">
										<div id="responseMsg">

										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
												<input type="email" class="form-control" id="email" name="email" placeholder="Work Email" required data-error="Please enter your email">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="number" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" required data-error="Please enter your Phone Number">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>

									
									<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a> 
									<div style="font-size:12px;">*I agree to the demeraki <a href=#>Terms and Conditions</a> and <a  href=#>Privacy Policy.</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			
			</section>
		</form>
	</div>
	
</main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DeMeraki\resources\views/web/placeorder/placeorder.blade.php ENDPATH**/ ?>