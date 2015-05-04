<script type="text/javascript" src="<?php echo base_url().'vjs/jquery-latest.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'vjs/jquery.validate.js';?>"></script> 
<title><?php echo $title;?></title>

 <script type="text/javascript">
	$(document).ready(function() {
  		jQuery.noConflict();
		$("#registration").validate({
			rules: {
				firstName: "required",
				lastName: "required",				
				email: {required:true,email:true},				
				password: "required",
				cnfPassword: {required: true,equalTo: "#password"},				
				location: "required",
				yourSelf: "required"
				//shipping_charges: { check: true }
			} 
			
		});
		$('a.login_window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
	
		
		
	});
</script> 

<div class="header">
    <div class="main_container">
        <div class="buttons">
       <?php if($this->session->userdata('user_id') > 0){
		  // print_r($user_Data);
		   ?>
           <div class="userName">Welcome <a href="<?php echo base_url();?>user/user_profile"><?php echo $user_Data[0]->firstName;?> <?php echo $user_Data[0]->lastName;?></a></div>
            <div class="login"><a href="<?php echo base_url();?>user/logout">Logout</a></div>
      <?php }else{?>
      		<div class="sign_up"><a href="#login-box" class="login_window">Sign Up</a></div>
            <div class="login"><a href="<?php echo base_url();?>user/login">Login</a></div>
      <?php } ?>
            <div class="fb"><a href="#"><img src="<?php echo base_url().'layout/';?>images/fb_bt.png" /></a></div>
        </div>
        <div class="logo"><a href="<?php echo base_url();?>home"><img src="<?php echo base_url().'/layout/';?>images/logo.jpg" /></a></div>
    </div>
</div>
<!------------------------- Light Box Part Starts ------------------------------------------------->

<div id="login-box" class="login-popup">
     <a href="#" class="close"><img src="<?php echo base_url().'layout/';?>images/close_pop.png" class="btn_close" title="Close Window" alt="Close"></a>
          <div class="form_bg">
        <div class="center_form">
     <p>Already have an account? <span class="log"><a href="#">Log In</a></span></p>
     <div class="social_nwt"><a href="#"><img class="login_fb" src="<?php echo base_url().'layout/';?>images/login_fb.png" /></a><a href="#"><img class="login_linked" src="<?php echo base_url().'layout/';?>images/linked_in.png" /></a>
     	<div class="clear">&nbsp;</div>
     </div>     
     <img class="or_line" src="<?php echo base_url().'layout/';?>images/or_line.png" /> 
<?php
 $attributes = array('class' => 'registration', 'id' => 'registration','name' => 'registration');
echo form_open('user/registration',$attributes);
#########################################
$firstName=array(
			'name'	=>	'firstName',
			'id'	=>	'firstName',
			'maxlength'=>'100',
			'size'=>'50'				
			);
$lastName=array(				
			'name'	=>	'lastName',
			'id'	=>	'lastName',
			'maxlength'=>'100',
			'size'=>'50'	
				);
$email=array(
			'name'	=>	'email',
			'id'	=>	'email',
			'maxlength'=>'100',
			'size'=>'50'
			);
$password=array(
			'name'	=>	'password',
			'id'	=>	'password',
			'type'  =>'password',
			'maxlength'=>'100',
			'size'=>'50'
			);
$cnfPassword=array(
			'name'	=>	'cnfPassword',
			'id'	=>	'cnfPassword',
			'type'  =>'password',
			'maxlength'=>'100',
			'size'=>'50'
			);
$location=array(
				'name'	=>	'location',
				'id'	=>	'location',
				'maxlength'=>'100',
				'size'=>'200'
				);

$yourSelf=array(
				'name'	=>	'yourSelf',
				 'id'	=>	'yourSelf',
				 'rows'=>'5',
				'cols'=>'38'
				);
#################################################################
?>     
    <table class="form_table" width="410" border="0">
    <?php if($this->session->flashdata(1)) {?>
        <tr>
            <td colspan="2" align="center"><font color="#FF0000">this user name is exist please choose another</font></td>
        </tr>
    <?php } ?>
        <tr>
            <td width="140px;">First Name</td>
            <td><?php echo form_input($firstName); ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo form_input($lastName); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo form_input($email); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo form_input($password); ?></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><?php echo form_input($cnfPassword); ?></td>
        </tr>
        <tr>
            <td>Location (City)</td>
            <td><?php echo form_input($location); ?></td>
        </tr>
        <tr>
            <td>About youself</td>
            <td><?php echo form_textarea($yourSelf); ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><div class="sign_up"><?php echo form_submit('submit','Submit'); ?></div></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><div class="term">By clicking Sign Up, Facebook or LinkedIn  you agree to our new <a href="#">T&amp;C's</a></div></td>
        </tr>
    </table>
<?php 
echo form_close();
?>
	<div class="clear">&nbsp;</div>
</center>   
</div> <!-- form bg ends here -->
</div>   
 </div>
 <!------------------------- Light Box Part End ----------------------------------->