<?php
//error_reporting(0); 
echo "i m here";die;
?>
 
<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_profile").validate({
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
			first_name: "Please enter  first name",
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
        var post_url = "get_states/" + country_id;			
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
$attributes = array('class' => '', 'id' => 'edit_profile','name' => 'edit_profile');

#########################################
$first_name=array(
			'name'	=>	'first_name',
			'id'	=>	'first_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$seller_detail[0]['first_name']
			/*'class'=>'inputText' */
			);
			
$last_name=array(
			'name'	=>	'last_name',
			'id'	=>	'last_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$seller_detail[0]['last_name']
			/*'class'=>'inputText' */
			);
$address=array(
			'name'	=>	'address',
			'id'	=>	'address',
			'rows'=>'5',
			'cols'=>'36',
			'value'=>nl2br(stripslashes($seller_detail[0]['address']))			
			  );
$city=array(
			'name'	=>	'city',
			'id'	=>	'city',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$seller_detail[0]['city']			  
			  );

$postalcode=array(
				'name'	=>	'postalcode',
				'id'	=>	'postalcode',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$seller_detail[0]['postalcode']				
				);

$webaddress=array(
				'name'	=>	'webaddress',
				'id'	=>	'webaddress',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$seller_detail[0]['webaddress']				
				);
$phone=array(
				'name'	=>	'phone',
				'id'	=>	'phone',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$seller_detail[0]['phone']				
				);
$fax=array(
				'name'	=>	'fax',
				'id'	=>	'fax',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$seller_detail[0]['fax']				
				);										
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
			
			  )
#################################################################
?>
  
<body>
<?php 

$profile_countryid=$seller_detail[0]['country_id'];
$profile_stateid=$seller_detail[0]['state_id'];
 
echo form_open('seller/edit_profile',$attributes);?>
<div id="container">
<div style="width:100%;padding: 10px 15px 10px 15px;">
	<div style="width:70%; float:left;font-size: 16px;"><?php echo $page_title;?> </div>
	<div style=" width:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/home";?>">Home</a></div>
	<div style=" width:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/edit_profile";?>">Edit Profile</a></div>
	<div style="widows:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/changepassword";?>">Change Password</a></div>
	<div style="widows:auto; float:right; margin-right:25px;"><a href="<?php echo base_url()."seller/logout";?>">Log Out</a></div>	
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
			<span>			
			<?php //echo form_dropdown('state',$stateList,$profile_stateid,"id='state'"); ?>
			<select id="state" name="state" id="f_state_label"  > 
			<option value="0">Select State</option>
			<?php foreach($stateList as $key=>$val){?>
				<option value="<?php echo $key ?>" <?php if($key==$profile_stateid){ echo "selected"; }?> ><?php echo $val; ?> </option>
			<?php  }?>		
			</select>
			</span>
		</div>		
		<div style="float:left; width:100%">
			<span id="text_name">Country</span>
			<span id="text_name"> : </span>
			<span><?php echo form_dropdown('country',$countryList,$profile_countryid,"id='country' onChange='getState(this.value)'"); ?>
			<!--<select id="country" name="country" onChange="getState(this.value)">
			<option value="">Select Country</option>
			<?php //foreach($countries as $country){?>
				<option value="<?php //echo $country->country_id ?>" <?php //if($country->country_id==$profile_countryid){ echo "selected"; }?>><?php //echo $country->country_name; ?> </option>;
			<?php// }
			?>
			</select>-->
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
			<span><?php echo $seller_detail[0]['email'] ?></span>
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