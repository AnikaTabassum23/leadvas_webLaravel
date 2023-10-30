<?php 
	if(!empty($user)) {
		$user = $user;
	} else {
		$user = 1;
	}
	if($user > 1 && $user < 51) {
		$package_price = $user*1500;
	} else {
		$package_price = 2500;
	}
?>
<section class="contain">
	<div class="container" style="margin-top:35px">
		<div class="row">
			<div class="col-md-8 wow fadeInDown" data-wow-delay="0.4s">
				<div class="row">
					<div class="" style="width: 100%; margin-bottom: 15px">
						<div style="font-size:30px; font-weight:normal; color:#666; margin-bottom:0px">Make Your Plan</div>
						<div style="font-size:14px; font-weight: 100">Make your own plan and enjoy great service!</div>
					</div>
					<div class="gp-myob-ui-data">
						<div class="row">
							<div class="col-xs-12 col-md-12" id="set_message"> </div>
							<div class="col-xs-3 col-md-3">
								<h4 style="margin-bottom:0px; color:#333;">Users:</h4>
								<span style="color: #666">Select Any ></span>
								<p style="font-size:16px; color:#f55e25;margin:0;"><span class="user_amount"><?php echo $user; ?></span> users</p>
							</div>
							<div class="col-xs-9 col-md-9">
								<div style="margin: 25px 0;">
									<input type="text" id="user_amount" name="user_amount" class="slider" value="<?php echo $user; ?>" data-slider-min="1" data-slider-max="51" data-slider-step="1" data-slider-value="<?php echo $user; ?>"  data-slider-tooltip="hide">
								</div>
							</div>
							<div class="col-xs-12 col-md-12"> <hr> </div>
							<div class="col-xs-3 col-md-3">
								<h4 style="margin-bottom:0px; color:#333;">Duration:</h4>
								<span style="color: #666">Select Any ></span>
								<p style="font-size:16px; color:#f55e25;margin:0;"><span class="package_duration">1</span> Month</p>
							</div>
							<div class="col-xs-9 col-md-9">
								<div id="package_duration" style="margin-left: -15px">
									<button type="button" class="btn btn-orange btn-circle active" disabled>1</button>
									<button type="button" class="btn btn-orange btn-circle">2</button>
									<button type="button" class="btn btn-orange btn-circle">4</button>
									<button type="button" class="btn btn-orange btn-circle">6</button>
									<button type="button" class="btn btn-orange btn-circle" style="margin:0">12</button>
								</div>
							</div>
						</div>
						<!--row-->
					</div>

				</div>
			</div>
			<div class="col-md-4 wow fadeInDown" data-wow-delay="0.4s" style="padding-right:0">
				<form id="make_confirm_form" action="<?php echo site_url('package/make_confirm'); ?>" method="post">
					<div class="col-sm-12">
						<div style="font-size:30px; font-weight:normal; color:#666;"> Summary</div>
					</div>
					<div class="col-sm-12">
						<div class="summary">
							<input type="hidden" name="user" value="<?php echo $user; ?>">
							<input type="hidden" name="duration" value="1">
							<input type="hidden" name="package_price" value="<?php echo $package_price; ?>">
							<div> Users : <span class="user_amount"><?php echo $user; ?></span> </div>
							<div> Duration : <span class="package_duration">1</span> Month</div>
							<div style="margin:30px 0 10px; font-size:36px;"> Tk : <span class="package_price"><?php echo $package_price; ?></span> </div>
						</div>
					</div>
					<div class="col-sm-12">
						<button type="submit" id="make_confirm" class="btn btn-success btn-block">Make Confirm</button>
					</div>
					<div class="col-sm-12">
						<div style="font-size:14px; font-weight:normal; color:#666; margin: 5px 0"> Need help with Pricing? <span style="font-weight:100;"> Call +88 01760242469</span></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('include/features'); ?>