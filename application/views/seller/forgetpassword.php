<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/tabber.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/dhtmlgoodies_calendar.css" />
		<script type="text/javascript" src="<?php echo base_url().'layout/js/tabber.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery-1.8.2.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery.validate.js';?>"></script>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		$("#seller_fpass").validate({
			rules: {						
				email: {
					required: true,
					email: true
				}				
			} ,	
			messages: {			
				email: {
					required: "Please enter email address",
					email: "Invalide email address"
				}			
			},			
		});
	});
</script>
<style type="text/css">
    * { font-family:Verdana, Arial, Helvetica, sans-serif; }     
	label.error { width: 250px; display: block; float: right; padding-right:400px; color: red;  text-align:left; font-size:12px; }
	/*input[type=text],input[type=password]{ width: 150px; float: left; }*/
</style> 
<?php
$attributes = array('class' => '', 'id' => 'seller_fpass','name' => 'seller_fpass');

#########################################
				
$email=array(
			'name'	=>	'email',
			'id'	=>	'email',
			'maxlength'=>'100',
			'size'=>'50'			
			);	
								
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Reset Password'
			
			  )
#################################################################
?>
  
<body>
<?php echo form_open('seller/forgetpassword',$attributes);?>
<div id="container">
<div style="width:100%;padding: 0px 0px 25px 0px; border-bottom: 1px solid #D0D0D0;">
	<div style="width:60%; float:left;font-size: 16px;"><?php echo $page_title;?></div>	
	<div style="widows:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/login";?>">Seller Login</a></div>
	<div style="widows:auto; float:right; margin-right:10px;"><a href="<?php echo base_url()."home";?>">Home</a></div>	
</div>

	<div id="body" style="margin: 20px 10px;">
		 <?php //print_r($this->session);		 
		 if($this->session->flashdata('login_error')){?>
		 <div>
			
			<span><font color="#FF0000">Invalid User name or Password.</font></span>
		</div>
		  <?php }	?> 		
		
		
		<div style="float:left; width:100%; padding-top:30px;">
			<span id="text_name">Email</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($email); ?></span>
		</div>	
		
		<div style="float:left; width:100%">
			
			<span><?php echo form_submit($submit); ?></span>
		</div>	
	</div>
	

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<?php echo form_close();?>
</body>
</html>