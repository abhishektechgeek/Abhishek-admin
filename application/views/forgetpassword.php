<html>
<head>
<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery-1.8.2.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery.validate.js';?>"></script>
<link href="<?php echo base_url().'layout/';?>css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url().'layout/';?>css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url().'layout/';?>css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url().'layout/';?>css/login.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript">
	$(document).ready(function() {
		$("#forgetpassword").validate({
			rules: {
			  email: "required",// simple rule, converted to {required:true}
 			}		
		});        
	});
	
	</script>
    <style>
    .success{ color:green;}
    </style>
    
</head>

<body >
<?php 
	$attributes = array('class' => '', 'id' => 'forgetpassword','name' => 'forgetpassword');
	
	$email=array(
			'name'	=>	'email',
			'id'	=>	'email',
			'maxlength'=>'200',
			'class'=>'inputText',
			'size'=>'50'
			/*'class'=>'inputText' */
			);
 										
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Click!',
			'class' =>  'black_button'
 			  )
?>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1><img src="<?php echo base_url().'layout/';?>images/logo_sku_login.png"></h1>
    	<div id="login">
    	  <p class="tip">You just need to hit the button and you'll get the password on your email in!</p>
          
         <?php if($this->session->flashdata('error')) {?>  <p class="error">Wrong Email Id!</p>  <?php }?>    
         <?php if($this->session->flashdata('success')) {?>  <p class="tip success">Password has been sent on your email</p>  <?php }?>  
    	  <?php echo form_open('signin/forgetpassword',$attributes);?>
    	    <p>
    	      <label><strong>Email</strong>
<!--<input type="text" name="textfield" class="inputText" id="textfield" />--><?php echo form_input($email);?>
    	      </label>
  	      </p>
    	     
           
    		<!--<a class="black_button" href="dashboard.html"><span>Authentification</span></a>-->
                 
               <?php echo form_submit($submit); ?>        
    	  <?php echo form_close();?>
		  <br clear="all" />
    	</div>
         
  </div>
</div>
<br clear="all" />

