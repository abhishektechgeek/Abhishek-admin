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
		$("#seller_passchange").validate({
			rules: {
				oldpassword : "required",						
				password : {
							required: true,
							minlength: 5,
							maxlength: 9							
							}, 			
				cnfpassword: {
						required: true,
						equalTo: "#password"
						}
			} ,	
			messages: {			
				oldpassword:"Please enter your old password",
				password :{
						required: "Please enter new password",
						minlength: "Minimum length is 5",
						maxlength: "Maximum lenght is 9"					
					},			
			cnfpassword: {
						required: "Please enter confirm password",
						equalTo: "Confirm password and new password missmatch"
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
$attributes = array('class' => '', 'id' => 'seller_passchange','name' => 'seller_passchange');

#########################################
$oldpassword=array(
			'name'	=>	'oldpassword',
			'id'	=>	'oldpassword',
			'maxlength'=>'25',
			'size'=>'20'			
			);	
			
$password=array(
			'name'	=>	'password',
			'id'	=>	'password',
			'maxlength'=>'25',
			'size'=>'20'			
			);	
$cnfpassword=array(
			'name'	=>	'cnfpassword',
			'id'	=>	'cnfpassword',
			'maxlength'=>'25',
			'size'=>'20'			
			);			
								
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Sign Up'
			
			  )
#################################################################
?>
  
<body>

<div id="container">
<div style="width:100%;padding: 10px 15px 10px 15px;">
	<div style="width:75%; float:left;font-size: 16px;"><?php echo $page_title;?> </div>
	<div style=" width:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/edit_profile";?>">Edit Profile</a></div>
	<div style="widows:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/changepassword";?>">Change Password</a></div>
	<div style="widows:auto; float:right; margin-right:25px;"><a href="<?php echo base_url()."seller/logout";?>">Log Out</a></div>	
</div>
<?php echo form_open('seller/changePassword',$attributes);?>
	<div id="body" style="margin: 20px 10px;">
		 <div>
		 <?php //print_r($this->session);		 
		   if($this->session->flashdata(1)) {?>			
				<span><font color="#FF0000">Password changed successfully.</font></span>		
		  <?php }elseif($this->session->flashdata(0)){?>
				<span><font color="#FF0000">Password not changed.</font></span>		  
		<?php  }	?> 		
		</div>
		
		<div style="float:left; width:100%; padding-top:30px;">
			<span id="text_name">Old Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($oldpassword); ?></span>
		</div>
		<div style="float:left; width:100%">
			<span id="text_name">New Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($password); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Confirm Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($cnfpassword); ?></span>
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