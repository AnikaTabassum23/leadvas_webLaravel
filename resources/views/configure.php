<html id="configure" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url('resource/ico/favicon.png'); ?>">

        <title>Configuring...</title>
        <style>
            body {
                background-color: #514134;
            }
            .loader {
                width: 100%; 
                margin-top: 15%;
                text-align: center;
            }
            .text {
                text-align: center;
                font-size: 20px;
                color: #fff;
                padding: 15px
            }
            .logo {
                text-align: center;
                margin-top: 10%;
            }
        </style>

    </head>
    <body>
        <div class="loader">
            <img src="<?php echo base_url('resource/img/gears.gif'); ?>" alt="Loading">
        </div>
        <div class="text">
            Your system is Configuring please do not close the browser.
        </div>
        <div class="logo">
            <img src="<?php echo base_url('resource/img/leadvas.png'); ?>" alt="Leadvas">
        </div>
    <body>
    <script src="<?php echo base_url('resource/js/jquery.js'); ?>"></script>
    <script type="text/javascript">
        $(window).load(function() {
			var data = {};
			<?php if(isset($token)) { ?> data.token = "<?php echo $token; ?>"; <?php } ?>
			<?php if(isset($tran_id)) { ?> data.tran_id = "<?php echo $tran_id; ?>"; <?php } ?>
			<?php if(isset($val_id)) { ?> data.val_id = "<?php echo $val_id; ?>"; <?php } ?>
            $.ajax({
                url: "<?php echo site_url('user/configure'); ?>",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(data, textStatus, jqXHR) {
                    var new_ragistration = parseInt(data.new_ragistration);
					if(new_ragistration==1) {
						location.href = "<?php echo site_url('set-pass'); ?>";
					} else {
						location.href = "<?php echo site_url('message'); ?>";
					}
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    <?php
                        $flashdata = array('page_title' => 'Something went wrong! Please try again', 'page' => 'please_try_again');
                        $this->session->set_flashdata($flashdata); 
                    ?>
                    location.href = "<?php echo site_url('message'); ?>";
                },

            });
        });
    </script>
</html>