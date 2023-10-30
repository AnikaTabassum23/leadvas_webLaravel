<section class="contain">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-7 wow fadeInDown" data-wow-delay="0.4s">
				<div class="trial-demo">
					<div class="leadvas-contact">Questions? Call us at +88 01760242469 </div>
				</div>
				<div class="leadvas-dialogue">
					<div class="dialogue">LETS SEE HOW TO CHANGE YOUR COMPANY BY LEADVAS</div>
				</div>
				<div class="device_img">
					<div  align="center">
						<a href="#"><img alt="" style="width:70%;" src="<?php echo base_url('resource/img/device.png'); ?> "></a>
					</div>
				</div>
            </div>
            <div class="col-md-5 wow fadeInDown" data-wow-delay="0.4s">
                <form id="set_pass_form" action="<?php echo site_url('set-pass'); ?>" method="post" class="form-horizontal leadvas-form" data-toggle="validator">
                    <input type="hidden" name="_token" value="<?php echo $token; ?>">
					<div class="form-group">
                        <div class="col-sm-12">
                            <div class="title">Create your password</div>
                        </div>
                        <div class="col-sm-12">
                            <div class="note"> Please fill out all fields.</div>
                        </div>
                    </div>
                    <div class="alert alert-success"><i class="fa fa-check mrl"></i> Congratulations! Your ragistration has been successfully completed. Now create your password.<span class="close fa fa-times" data-dismiss="alert" href="#" style="margin-top: -5px;"></span></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required data-minlength="6" required>
                            </div>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" data-match="#password" data-match-error="Whoops, these don't match" required data-minlength="6">
                            </div>
							<div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
