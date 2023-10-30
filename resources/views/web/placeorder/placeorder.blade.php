@extends('web.layouts.master')
<style>
.form-wizard .form-wizard-steps li {
    width: 10%!important;

}
li {

    list-style: none!important;
}



</style>

@section('body')
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
									<a href="#"><img alt="" style="width:85%;margin-top: -25px" src="{!! asset('public/frontend/images/signup.png') !!}"></a>
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
									@csrf
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

									{{-- <div class="form-group">
										<div class="col-sm-12">
											<div class="submit-button">
												<a href="javascript:;"><button type="submit form-wizard-next-btn" class="tg-btn">signup</button></a>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div> --}}
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
	{{-- <section class="wizard-section">
		<div class="row no-gutters">
			<div class="col-lg-6 col-md-6">
				<div class="wizard-content-left d-flex justify-content-center align-items-center">
					<h1>Create Your Bank Account</h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
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
						<fieldset class="wizard-fieldset show">
							<h5>Personal Information</h5>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
									</div>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Account Information</h5>
							<div class="form-group">
								<input type="email" class="form-control wizard-required" id="email">
								<label for="email" class="wizard-form-text-label">Email*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="username">
								<label for="username" class="wizard-form-text-label">User Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<input type="password" class="form-control wizard-required" id="pwd">
								<label for="pwd" class="wizard-form-text-label">Password*</label>
								<div class="wizard-form-error"></div>
								<span class="wizard-password-eye"><i class="far fa-eye"></i></span>
							</div>
							<div class="form-group">
								<input type="password" class="form-control wizard-required" id="cpwd">
								<label for="cpwd" class="wizard-form-text-label">Confirm Password*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Bank Information</h5>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="bname">
								<label for="bname" class="wizard-form-text-label">Bank Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="brname">
								<label for="brname" class="wizard-form-text-label">Branch Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="acname">
								<label for="acname" class="wizard-form-text-label">Account Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="acon">
								<label for="acon" class="wizard-form-text-label">Account Number*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>Payment Information</h5>
							<div class="form-group">
								Payment Type
								<div class="wizard-form-radio">
									<input name="radio-name" id="mastercard" type="radio">
									<label for="mastercard">Master Card</label>
								</div>
								<div class="wizard-form-radio">
									<input name="radio-name" id="visacard" type="radio">
									<label for="visacard">Visa Card</label>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="honame">
								<label for="honame" class="wizard-form-text-label">Holder Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="cardname">
										<label for="cardname" class="wizard-form-text-label">Card Number*</label>
										<div class="wizard-form-error"></div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="cvc">
										<label for="cvc" class="wizard-form-text-label">CVC*</label>
										<div class="wizard-form-error"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">Expiry Date</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<div class="form-group">
										<select class="form-control">
											<option value="">Date</option>
											<option value="">1</option>
											<option value="">2</option>
											<option value="">3</option>
											<option value="">4</option>
											<option value="">5</option>
											<option value="">6</option>
											<option value="">7</option>
											<option value="">8</option>
											<option value="">9</option>
											<option value="">10</option>
											<option value="">11</option>
											<option value="">12</option>
											<option value="">13</option>
											<option value="">14</option>
											<option value="">15</option>
											<option value="">16</option>
											<option value="">17</option>
											<option value="">18</option>
											<option value="">19</option>
											<option value="">20</option>
											<option value="">21</option>
											<option value="">22</option>
											<option value="">23</option>
											<option value="">24</option>
											<option value="">25</option>
											<option value="">26</option>
											<option value="">27</option>
											<option value="">28</option>
											<option value="">29</option>
											<option value="">30</option>
											<option value="">31</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<div class="form-group">
										<select class="form-control">
											<option value="">Month</option>
											<option value="">jan</option>
											<option value="">Feb</option>
											<option value="">March</option>
											<option value="">April</option>
											<option value="">May</option>
											<option value="">June</option>
											<option value="">Jully</option>
											<option value="">August</option>
											<option value="">Sept</option>
											<option value="">Oct</option>
											<option value="">Nov</option>
											<option value="">Dec</option>	
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<div class="form-group">
										<select class="form-control">
											<option value="">Years</option>
											<option value="">2019</option>
											<option value="">2020</option>
											<option value="">2021</option>
											<option value="">2022</option>
											<option value="">2023</option>
											<option value="">2024</option>
											<option value="">2025</option>
											<option value="">2026</option>
											<option value="">2027</option>
											<option value="">2028</option>
											<option value="">2029</option>
											<option value="">2030</option>
											<option value="">2031</option>
											<option value="">2032</option>
											<option value="">2033</option>
											<option value="">2034</option>
											<option value="">2035</option>
											<option value="">2036</option>
											<option value="">2037</option>
											<option value="">2038</option>
											<option value="">2039</option>
											<option value="">2040</option>	
										</select>
									</div>
								</div>
							</div>
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-submit float-right">Submit</a>
							</div>
						</fieldset>	
					</form>
				</div>
			</div>
		</div>
	</section> --}}
</main>

@endsection

