var package_duration = 1;
$(".select2").select2();
$('.slider').slider();
$('.slider').on('slide', function(ev) {
	var value = ev.value;
	var user_amount = (value > 50) ? '>50' : value;
	$('.user_amount').text(user_amount);
	var package_price;
	if(value > 50) {
		package_price = 'Negotiable';
		$('.currency_symbol').hide();
	} else {
		package_price = (get_price_by_user(value)*package_duration);
		$('.currency_symbol').show();
	}
	$('.package_price').text(package_price);
	$('#make_confirm_form input[name=user]').val(value);
	$('#make_confirm_form input[name=package_price]').val(package_price);
});

$('#package_duration button').on('click', function(e) {
	e.preventDefault();
	//for active button
	var $selected_btn = $(this);
	var another_items = $('#package_duration').not($selected_btn);
	another_items.find('button').removeClass('active');
	$($selected_btn).addClass('active');
	//for calculation
	var user_amount = $('input[name=user]').val();
	var package_price = get_price_by_user(user_amount);
	package_duration = parseInt($(this).text());
	$('.package_duration').text(package_duration);
	
	package_price = (user_amount > 50) ? 'Negotiable' : (package_price*package_duration);
	$('.package_price').text(package_price);
	$('#make_confirm_form input[name=duration]').val(package_duration);
	$('#make_confirm_form input[name=package_price]').val(package_price);
});

$('#make_confirm_form').on('submit', function(e) {
	var duration = $(this).find('[name=duration]').val();
	if (duration < 2) {
		e.preventDefault();
		$('#set_message').html('<div class="alert alert-danger"><i class="fa fa-warning mrl"></i> Duration should be minimum 2 month. <span class="close fa fa-times" data-dismiss="alert" href="#" style="margin-top:5px;"></span></div>');
	} 
});

//demo form submit action
$('#user_register_form').validator().on('submit', function(e) {
	if (e.isDefaultPrevented()) {
		//handle the invalid form...
	} else {
		var btn = $(this).find('button[type=submit]').button('loading');
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax({
			url: formURL,
			type: "POST",
			data: postData,
			dataType: "json",
			success: function(response, textStatus, jqXHR) {
				var status = parseInt(response.status);
				if(status==1) {
					location.href = URL.getSiteAction('message');
				}
				btn.button('reset');
				$("#set_message").html(response.message);
			}
		});
	}
	e.preventDefault();
});

function get_price_by_user(user) {
	if(user > 1 && user < 51) {
		package_price = user*1500;
	} else {
		package_price = 2500;
	}
	return package_price;
}