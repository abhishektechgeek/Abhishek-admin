
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>	
		<title><?php echo $title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/style.css" />	
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery-1.8.2.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery.validate.js';?>"></script>
		
	<script type="text/javascript">
	$(document).ready(function() {
		$("#signin").validate({
			rules: {
			  username: "required",// simple rule, converted to {required:true}
			  password: "required"
			}		
		});        
	});
	
	</script>
	 <style type="text/css">
    * { font-family:Verdana, Arial, Helvetica, sans-serif; }     
	label.error { width: 150px; display: block; float: right; color: red; padding-right: 480px; text-align:left; }
	
	</style>
</head>
<?php
$attributes = array('class' => '', 'id' => 'signin','name' => 'signin');

#########################################
$username=array(
			'name'	=>	'username',
			'id'	=>	'username',
			'maxlength'=>'100',
			'size'=>'50'
			/*'class'=>'inputText' */
			);

$password=array(
			'name'	=>	'password',
			'id'	=>	'password',
			'maxlength'=>'100',
			'size'=>'50'			  
			  );
										
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Sign Up'
			
			  )
#################################################################
?>
  
<body>
<?php echo form_open('home/signin',$attributes);?>
<div id="container">
	<h1>Welcome Administrator</h1>
	<div id="body">
		
		<?php if($this->session->userdata('error')!=""){?>
		<div style="text-align:center; color:#FF0000;"><?php echo $this->session->userdata('error');?></div>
		<?php }?>
		<div> Login Form </div>
		<div>
			<span id="text_name">User Name</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($username); ?></span>
		</div>		
		<div>
			<span id="text_name">Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($password); ?></span>
		</div>			
		<div>			
			<span><?php echo form_submit($submit); ?></span>
		</div>	
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<?php echo form_close();?>
</body>
</html>