<?php 
 //if(in_array(3,$edit_data[0])){echo 'cdf'; }
//echo "<pre>";print_r($edit_data[0]['menus']);die;?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php //include 'header.php';?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_profile").validate({
			rules: {
				first_name : "required",
				last_name : "required",
				gender : "required",
 				email: {
						required: true,
						email: true
						},
				password : {
				            required:true,
 							minlength: 5,
							maxlength: 9							
							}, 	
				confirm_password:{
							required : true,
							equalTo : "#password"
							},		
 				birthday : "required"			
 			} ,
			messages: {
			first_name: "Please enter  first name",
			first_name: "Please enter  last name",
			gender: "Please enter gender",
			city : "Please enter city",
 			email: {
						required: "Please enter email address",
						email: "Invalide email address"
					},
			password :{
						required: "Please enter password",
						minlength: "Minimum length is 5",
						maxlength: "Maximum lenght is 9"					
					},			
			
			birthday :"Please enter birthday",
 		},
			
		});
	});
</script>


 
<?php
$query2 = $this->db->query("SELECT * FROM `admin` WHERE id = '".$edit_data[0]['id']."'");
$row2 = $query2->row();

  
 $query3 = $this->db->query("SELECT type FROM `users_level` WHERE user_id = '".$edit_data[0]['id']."'");
 $row3 = $query3->row();
 //echo "<pre>";print_r( $row3);die;
 
   $query = $this->db->query("SELECT group_id,group_name FROM `group` ");
  
foreach ($query->result_object() as $row){
   $group_option[$row->group_id] = $row->group_name;
 }

$attributes = array('class' => '', 'id' => 'edit_profile','name' => 'edit_profile');

 
 #########################################
if($edit_data[0]['id']>0){

$gender_option = array(
'm'=>'Male',
'f'=>'Female',
);

$user_option = array(
1=>'Consumer',
2=>'Service Provider',
3=>'Both'
);


$first_name=array(
			'name'	=>	'first_name',
			'id'	=>	'first_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['first_name']
			/*'class'=>'inputText' */
			);
			
$last_name=array(
			'name'	=>	'last_name',
			'id'	=>	'last_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['last_name']
			/*'class'=>'inputText' */
			);
  
           $email=array(
				'name'	=>	'email',
				'id'	=>	'email',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['email']				
				);
				
		  $password = array(
				'name'	=>	'password',
				'id'	=>	'password',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['password'],
				'type'=>'password'				
				);
				
				
				$password_conform = array(
				'name'	=>	'confirm_password',
				'id'	=>	'confirm_password',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['password'],
  				'type'=>'password'				
				);
				
			$user_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['id'],
				'type' =>'text'				
				);
				
     $birthday=array(
				'name'	=>	'birthday',
				'id'	=>	'birthday',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['birthday']				
				);	
				
 			
	 
 								
    $submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
			);

}else{

$gender_option = array(
'm'=>'Male',
'f'=>'Female',
);
$first_name=array(
			'name'	=>	'first_name',
			'id'	=>	'first_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>''
 			);
			
$last_name=array(
			'name'	=>	'last_name',
			'id'	=>	'last_name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>''
			 
			);
  
           $email=array(
				'name'	=>	'email',
				'id'	=>	'email',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>''		
				);
				
			$password = array(
				'name'	=>	'password',
				'id'	=>	'password',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['password'],
				'type'=>'password'				
				);
				
			$password_conform = array(
				'name'	=>	'confirm_password',
				'id'	=>	'confirm_password',
				'maxlength'=>'100',
				'size'=>'50',
 				'type'=>'password'				
				);
				
			$user_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['id'],
				'type' =>'text'				
				);	
				
$birthday=array(
				'name'	=>	'birthday',
				'id'	=>	'birthday',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>''				
				);				
 						
 					
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
 			  );

}




#################################################################
?>
  
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
     <?php if(isset($edit_data[0]['id']))
	         echo 'Edit User';
		 else
		   echo 'Add User';
    ?>
    </h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <!--<div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>
    </div>-->
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            <!--<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/chart_bar.gif" width="16" height="16" alt="Reports" /> Visitors - Last 30 days</div>-->
            <!--<div class="portlet-content">-->
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
           <!-- <div id="placeholder" style="width:auto; height:0px;"></div>
            </div>-->
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		<!--<div class="portlet-header">Anything  (no icon too if you like it better)</div>-->

		<!--<div class="portlet-content">
		  <p>This can be any content you want. I placed a basic form here with text editor so you can see the functionality of the forms too.</p>
		  <h3>This is a form</h3>
		  <form id="form1" name="form1" method="post" action="">
		    <label>Some title</label>
		     <input type="text" name="textfield" id="textfield" class="smallInput" />
			<label>Large input box</label>
            <input type="text" name="textfield2" id="textfield2" class="largeInput" />
            <label>This is a textarea</label>
		    <textarea name="textarea" cols="45" rows="3" class="smallInput" id="textarea"></textarea>
            <a class="button"><span>Submit in blue</span></a>
            <a class="button_grey"><span>Submit this form</span></a>
		  </form>
		  <p>&nbsp;</p>
		</div>-->
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      <!--<div class="portlet">
		<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/comments.gif" width="16" height="16" alt="Comments" />Latest Comments</div>

		<div class="portlet-content">
         <p class="info" id="success"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="error"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="warning"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
<p class="info" id="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
       </div>-->    
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
		<!--<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/feed.gif" width="16" height="16" alt="Feeds" />Your selected News source					</div>-->
		<!--<div class="portlet-content">
        <ul class="news_items">
        	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean  adipiscing massa quis arcu interdum scelerisque. Duis vitae nunc nisi.  Quisque eget leo a nibh gravida vulputate ut sed nulla. <a href="#">Donec quis  lectus turpis, sed mollis nibh</a>. Donec ut mi eu metus ultrices  porttitor. Phasellus nec elit in nisi</li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. </li>
        </ul>
        <a href="#">&raquo; View all news items</a>
        </div>-->
       </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    <?php //echo "<pre>";print_r($user_listing);die;?>
    <div class="portlet">
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
         <?php echo form_open('admins/save_admins',$attributes);?>
 
           <div class="form-element">
			<span id="text_name">First name</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($first_name); ?></span>
		 </div>
         <div class="form-element">
			<span id="text_name">Last name</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($last_name); ?></span>
		 </div>
         <div class="form-element">
			<span id="text_name">Gender</span>
			<span id="text_name"> : </span>
			<span>
             <?php echo form_dropdown('gender', $gender_option, $row2->gender);?>
            </span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Group</span>
			<span id="text_name"> : </span>
			<span>  <?php 
				if($edit_data[0]['id']>0){
				 
				echo form_dropdown('group_id', $group_option, $row2->group_id);
				}else{
				echo form_dropdown('group_id', $group_option);
				}
				
				?></span>
		 </div>
           
         <div class="form-element">
			<span id="text_name">Email</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($email); ?></span>
        </div>
        <div class="form-element">    
            <span id="text_name">Password</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($password); ?></span>
		</div>
        
        <div class="form-element">    
            <span id="text_name">Password Conform</span>
			<span id="text_name"> : </span><br/>
			<span><?php echo form_input($password_conform); ?></span>
		</div>
        
        <div class="form-element" style="display:none">
			<span id="text_name">ID</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($user_id); ?></span>
		 </div>
         <div class="form-element">
			<span id="text_name">Birthday</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($birthday); ?></span>
            </div>
            <div class="form-element">
  			<span><?php echo form_submit($submit); ?></span>
		 
  	    </div>
 
<?php echo form_close();?>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
Website Administration by <a href="../index.htm">WebGurus</a></div>
<!-- FOOTER END -->
</body>
</html>
