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
		$("#seller_login").validate({
			rules: {
						
				email: {
						required: true,
						email: true
						},
				password : "required"
			} ,	
			messages: {			
			email: "Please enter a valid email address",
			password:"Please enter your password"			
		},
			
		});
	});
</script>
 
<?php
$attributes = array('class' => '', 'id' => 'seller_login','name' => 'seller_login');

#########################################
				
$email=array(
			'name'	=>	'email',
			'id'	=>	'email',
			'maxlength'=>'100',
			'size'=>'50'			
			);
$password=array(
			'name'	=>	'password',
			'id'	=>	'password',
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
<?php echo form_open('seller/login',$attributes);?>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Profi Admin - Login</h1>
    	<div id="login">
    	  <p class="tip">You just need to hit the button and you're in!</p>
          <p class="error">This is when something is wrong!</p>        
    	  <form id="form1" name="form1" method="post" action="">
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="textfield" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="textfield2" class="inputText" id="textfield2" />
  	        </label>
    	    </p>
    		<a class="black_button" href="dashboard.html"><span>Authentification</span></a>
             <label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>            
    	  </form>
		  <br clear="all" />
    	</div>
        <div id="forgot">
        <a href="#" class="forgotlink"><span>Forgot your username or password?</span></a></div>
  </div>
</div>
<br clear="all" />
<!--<div id="container">
<div style="width:90%;padding: 10px 15px 10px 15px;">
	<div style="width:100%; float:left;font-size: 16px;"><?php echo $page_title;?> </div>
	
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
			<span><?php //echo form_input($email); ?></span>
		</div>
		<div style="float:left; width:100%">
			<span id="text_name">Password</span>
			<span id="text_name"> : </span>
			<span><?php //echo form_password($password); ?></span>
		</div>	
		
		
		<div style="float:left; width:100%">
		<span id="text_name"><?php //echo form_submit($submit); ?></span>
			<span id="text_name"> &nbsp; </span>
			<span><a href="<?php //echo base_url()?>seller/forgetpassword">Forget Password</a></span>
			
			
		</div>	
	</div>
	

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>-->
<?php echo form_close();?>
</body>
</html>