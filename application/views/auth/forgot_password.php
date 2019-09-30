
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap -->
    <link href="<?php echo base_url();?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
<link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
 <!-- jQuery -->
    <script src="<?php echo base_url();?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>



<!------ Include the above in your HEAD tag ---------->

<section class="login-block">

    <div class="container">
		<div class="row">
            
			<div class="col-md-5 col-sm-12 col-lg- forgot-sec" >
                  <div id="infoMessage"><?php echo $message;?></div>
				<h2 class="text-center">Forgotpassword</h2>
				<?php echo form_open("auth/forgot_password");?>
					  <div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">E-mail</label>
                                   
                                    <?php echo form_input($identity);?>
					  </div>
					  <div class="forgottenpass">
						<button type="submit" class="btn btn-login">Submit</button>
						<a href="<?php echo base_url(); ?>" type="button" class="btn btn-default" id="cancel">cancel</a>
					  </div>
					
                        <?php echo form_close();?>
			</div>
			<div class="col-md-7 col-sm-12 col-lg-7 banner-sec">
			</div>
		</div>
	</div>
</section>

</body>
</html>



















<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>



<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>
