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
       <a href ="<?php $this->ion_auth->logout();?>" >Logout</a>
</div>

		
</section>

</body>
</html>