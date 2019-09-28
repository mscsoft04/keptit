
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/script.js"></script>
</head>
<body>



<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12 col-lg-5 login-sec">
      <div id="infoMessage"><?php echo $message;?></div>

				<h2 class="text-center">Login Now</h2>
				<?php echo form_open("auth/login");?>
					  <div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <?php echo form_input($identity);?>
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1" class="text-uppercase">Password</label>
						<?php echo form_input($password);?>
					  </div>
					 <div class="form-group custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="remember"  value="1"name="remember">
						<label class="custom-control-label" for="remember">Remember</label>
					 </div>
					<button type="submit" class="btn btn-login login-btn">Submit</button>
          <?php echo form_close();?>
				<a href="<?php echo base_url();?>forgot_password" class="fpass" id="forgotPass">Forgotpassword</a>
			</div>
		
			<div class="col-md-7 col-sm-12 col-lg-7 banner-sec">
			</div>
		</div>
	</div>
</section>

</body>
</html>
