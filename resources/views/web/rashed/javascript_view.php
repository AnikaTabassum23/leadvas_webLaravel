(function(){
	var urlAction = {
		currentUrl: function(){
			return '<?php echo $url = Request::url(); ?>';
		},
		siteUrl: function(){
			return '<?php echo url(); ?>';
		},
		getSiteAction: function(action){
			return '<?php echo url(); ?>' + action;
		}
	};
	window.urlAction = urlAction;
}());