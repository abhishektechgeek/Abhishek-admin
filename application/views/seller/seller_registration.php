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
		$("#sellerregistration").validate({
			rules: {
				first_name : "required",
				address : "required",
				city : "required",
				country : "required",
				postalcode : "required",			
				email: {
						required: true,
						email: true
						},
				password : {
							required: true,
							minlength: 5,
							maxlength: 9							
							}, 			
				cnfpassword: {
						required: true,
						equalTo: "#password"
						},
				phone : "required",				
				postalcode : "required"								
			} ,
			messages: {
			name: "Please enter  name",
			address: "Please enter adddress",
			city : "Please enter city",
			country:"Please select country",
			postalcode : "Please enter postalcode",
			email: {
						required: "Please enter email address",
						email: "Invalide email address"
					},
			password :{
						required: "Please enter password",
						minlength: "Minimum length is 5",
						maxlength: "Maximum lenght is 9"					
					},			
			cnfpassword: {
						required: "Please enter confirm password",
						equalTo: "Password missmatch"
						},
			phone :"Please enter phone number",
			postalcode : "Please enter valid postal code",
					
		},
			
		});
	});
</script>
<script>
function getState(){ 
 var country_id = $('#country').val();
 if (country_id != ""){
        var post_url = "seller/get_states/" + country_id;		
        $.ajax({
            type: "POST",
             url: post_url,
             success: function(states) //we're calling the response json array 'cities'
              { 
                $('#state').empty();
               	$.each(states,function(state_id,state_name) 
                {
					var opt = $('<option />'); // here we're creating a new select option for each group
					opt.val(state_id);
					opt.text(state_name);
					$('#state').append(opt); 
                });
               } //end success
         }); //end AJAX
    }
}
</script>

<style type="text/css">
    * { font-family:Verdana, Arial, Helvetica, sans-serif; }     
	label.error { width: 250px; display: block; float: right; padding-right:400px; color: red;  text-align:left; font-size:12px; }
	/*input[type=text],input[type=password]{ width: 150px; float: left; }*/
</style> 
<?php
$attributes = array('class' => '', 'id' => 'sellerregistration','name' => 'sellerregistration');

#########################################
$first_name=array(
			'name'	=>	'first_name',
			'id'	=>	'first_name',
			'maxlength'=>'100',
			'size'=>'50'
			/*'class'=>'inputText' */
			);
			
$last_name=array(
			'name'	=>	'last_name',
			'id'	=>	'last_name',
			'maxlength'=>'100',
			'size'=>'50'
			/*'class'=>'inputText' */
			);
$address=array(
			'name'	=>	'address',
			'id'	=>	'address',
			'rows'=>'5',
			'cols'=>'36'			
			  );
$city=array(
			'name'	=>	'city',
			'id'	=>	'city',
			'maxlength'=>'100',
			'size'=>'50'			  
			  );		
$postalcode=array(
				'name'	=>	'postalcode',
				'id'	=>	'postalcode',
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
			'maxlength'=>'25',
			'size'=>'20'			
			);
			
$cnfpassword=array(
			'name'	=>	'cnfpassword',
			'id'	=>	'cnfpassword',
			'maxlength'=>'25',
			'size'=>'20'			
			);

$webaddress=array(
				'name'	=>	'webaddress',
				'id'	=>	'webaddress',
				'maxlength'=>'100',
				'size'=>'50'				
				);
$phone=array(
				'name'	=>	'phone',
				'id'	=>	'phone',
				'maxlength'=>'100',
				'size'=>'50'				
				);
$fax=array(
				'name'	=>	'fax',
				'id'	=>	'fax',
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
<?php 
echo form_open('seller/registration',$attributes);?>
<div id="container">
<div style="width:90%;padding: 10px 15px 10px 15px;">
	<div style="width:60%; float:left;font-size: 16px;"><?php echo $page_title;?> </div>
	<div style="widows:30%; float:right"><a href="<?php echo base_url()."seller/login";?>">Seller Login</a></div>
	
</div>

	<div id="body" style="margin: 20px 10px;">		
		<div style="float:left; width:100%; padding-top:10px;">
			<span id="text_name">First name</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($first_name); ?></span>
		</div>
		<div style="float:left; width:100%">
			<span id="text_name">Last name</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($last_name); ?></span>
		</div>		
		<div style="float:left; width:100%">
			<span id="text_name">Address</span>
			<span id="text_name"> : </span>
			<span><?php echo form_textarea($address); ?></span>
		</div>		
		<div style="float:left; width:100%">
			<span id="text_name">City</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($city); ?></span>
		</div>		
		<div style="float:left; width:100%">
			<span id="text_name">State</span>
			<span id="text_name"> : </span>
			<span><?php //echo form_dropdown('state', $stateList,"","id='state' class='textfield1'"); ?>
			<select id="state" name="state" id="f_state_label" > 
			<option value="0">Select State</option>
			</select>
			</span>
		</div>		
		<div style="float:left; width:100%">
			<span id="text_name">Country</span>
			<span id="text_name"> : </span>
			<span><?php //echo form_dropdown('country', $countryList,"","id='country' class='textfield1'"); ?>
			<select id="country" name="country" onChange="getState(this.value)">
			<option value="">Select Country</option>
			<?php
			
			foreach($countries as $country){
				echo '<option value="'. $country->country_id .'">' . $country->country_name . '</option>';
			}
			?>
			</select>
			</span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Zip Code</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($postalcode); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Email</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($email); ?></span>
		</div>
		<div style="float:left; width:100%">
			<span id="text_name">Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($password); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Confirm Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_password($cnfpassword); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Phone</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($phone); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Fax</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($fax); ?></span>
		</div>	
		<div style="float:left; width:100%">
			<span id="text_name">Web</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($webaddress); ?></span>
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