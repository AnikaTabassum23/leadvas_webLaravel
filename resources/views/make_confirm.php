<section class="contain">
	<div class="container" style="margin-top: 35px">
		<div class="row">
			<div class="col-md-8 wow fadeInDown" data-wow-delay="0.4s" style="padding-left:0">
				<div id="set_message"></div>
				<form id="user_register_form" action="<?php echo site_url('package/store'); ?>" method="post" class="form-horizontal leadvas-form" data-toggle="validator" >
					<div class="form-group">
						<div class="col-sm-12">
							<div class="note"> Please fill out all fields.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<input type="hidden" name="hidden_" value="83">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control" id="email" name="email" placeholder="Work Email" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								<input type="text" class="form-control" id="company" name="company" placeholder="Company Name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<select class="select2" id="job_title" name="job_title" style="width:100%; height:50px" data-placeholder="Job Title" required>
								<option value=""> </option>
							<?php
								foreach($designations as $designation):
									echo '<option value="'.$designation->designation_name.'">'.$designation->designation_name.'</option>';
								endforeach;
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<select class="select2" id="employee_range" name="employee_range" style="width:100%; height:50px" data-placeholder="Employees" required>
								<option value=""> </option>
							<?php
								foreach($employees_range as $range):
									echo '<option value="'.$range->id.'">'.$range->range.'</option>';
								endforeach;
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="input-group">
								<input type="hidden" name="package_user" value="<?php echo $user; ?>">
								<input type="hidden" name="package_duration" value="<?php echo $duration; ?>">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
								<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No." required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<select class="select2" id="country" name="country" style="width:100%; height:50px" data-placeholder="Country" required>
								<option value=""> </option>
							<?php
								foreach($countries as $country):
									echo '<option value="'.$country->id.'">'.$country->country.'</option>';
								endforeach;
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
                        <div class="col-sm-12">
                            <select class="select2" id="timezone" name="timezone" style="width:100%; height:50px" data-placeholder="Timezone" required>
                                <option value=""> </option>
								<option value="<?php echo $timezones[100]->id ?>"><?php echo $timezones[100]->name ?> </option>
                                <?php
                                foreach ($timezones as $timezone):
									if($timezone->id!=101) {
										echo '<option value="' . $timezone->id . '">' . $timezone->name . '</option>';
									}
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="form-group">
						<div class="col-sm-12">
							<select class="select2" id="currency" name="currency" style="width:100%; height:50px" data-placeholder="Currency" required>
								<option value=""> </option>
							<?php
								foreach($currencies as $currency):
									echo '<option value="'.$currency->id.'">'.$currency->currency_name.'('.$currency->html_code.') </option>';
								endforeach;
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<div style="font-size:12px;">*By submitting your details to us, we may provide  leadvas.com information to you as set out in our <a target="_blank" href="<?php echo site_url('terms-of-use'); ?>" class="font-white" >Terms of use</a> and <a target="_blank" href="<?php echo site_url('privacy-policy'); ?>" class="font-white" >Privacy Policy</a></div>
				</form>
			</div>
			<div class="col-md-4 wow fadeInDown" data-wow-delay="0.4s" style="padding-right:0">
				<div class="col-sm-12">
					<div style="font-size:30px; font-weight:normal; color:#666;"> Summary</div>
				</div>
				<div class="col-sm-12">
					<div class="summary">
						<div> Users : <?php echo $user; ?> </div>
						<div> Duration : <?php echo $duration; ?>  Month</div>
						<div style="margin:30px 0 10px; font-size:36px;"> Tk : <?php echo $package_price; ?> </div>
					</div>
				</div>
				<div class="col-sm-12">
					<div style="font-size:14px; font-weight:normal; color:#666; margin: 5px 0"> Need help with Pricing? <span style="font-weight:100;"> Call +88 01760242469</span></div>
				</div>
			</div>
		</div>
	</div>
</section>
