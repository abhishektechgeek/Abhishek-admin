<?php //echo "<pre>";print_r($edit_data[0]['id']);die;?>
<?php //include 'header.php';?>
 
<style>

.form-element {
    padding: 10px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {/*
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
	*/});
</script>


 
<?php

$query = $this->db->query("SELECT * FROM `skills` ORDER BY id");
// $res = $query->row();
$path_array = array();
$path_str =array();
$option = array(0=>'---none---');
 foreach ($query->result_object() as $row)
{
     
   // echo $row->id.'...	'. $row->path."<br/>";
	
	$path[$row->id] = array_slice(explode('-',$row->path),1,-1);
	$i = 0;
	$option[$row->id] = '';
	foreach($path[$row->id] as $result){
	        if($result>0){
			 $query = $this->db->query("SELECT id,name FROM `skills` WHERE id = '".$result."'");
			 $row1 = $query->row();
			 if($i == 0){
			   $path_str[$row->id][$row1->id]= $row1->name; 
			   $option[$row->id] .= $row1->name;
			   }
			  elseif($i == 1){
			   $path_str[$row->id][$row1->id]= ' > '.$row1->name; 
			   $option[$row->id] .= ' > '.$row1->name;
			   }
			   else{break;}
			 $i++;
	 }
     }
}

/*echo $edit_data[0]['id'];
 echo "<pre>";
 print_r($option);
die;*/
 

$attributes = array('class' => '', 'id' => 'edit_skills','name' => 'edit_skills');

#########################################
if($edit_data[0]['id']>0){
$cat_option = array(
1=>'yes',
0=>'no'
);
$category_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['name'],
			'class'=>'inputText' 
			);
			
$image=array(
			'name'	=>	'image',
			'id'	=>	'image',
			);
			
$cat_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['id'],
				'type' =>'hidden'				
				);	
			
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
 			  );
}else{

$cat_option = array(
1=>'yes',
0=>'no'
);
$category_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>'',
			'class'=>'inputText' 
			);
			
$image=array(
			'name'	=>	'image',
			'id'	=>	'image',
			);
			
$cat_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>'',
				'type' =>'hidden'				
				);	
			
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Insert'
 			  );


}
#################################################################
?>
  
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users">Edit Skills</h1>
    </div>
    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		 
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
        </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    <?php //echo "<pre>";print_r($user_listing);die;?>
    <div class="portlet">
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Skills Edit</div>
		<div class="portlet-content nopadding">
         <?php echo form_open_multipart('skills/save_skills',$attributes);?>
             <div class="form-element">
                <span id="text_name">Category name</span>
                <span id="text_name"> : </span>
                <span><?php echo form_input($category_name); ?></span>
		    </div>
            <div class="form-element">
                <span id="text_name">Image</span>
                <span id="text_name"> : </span>
                <span><?php echo form_upload($image); ?></span>
  		   </div>
           <div class="form-element">
                <?php if($edit_data[0]['id']>0){$query2 = $this->db->query("SELECT image FROM `skills` WHERE id = '".$edit_data[0]['id']."'");
			          $row2 = $query2->row();?>
                      <img src="<?php echo base_url().'application/uploads/'.$row2->image?>" title="<?php echo $row2->image?>" />
 			 <?php } ?>
                
		   </div>
            <div class="form-element">
                <span id="text_name">Parent</span>
                <span id="text_name"> : </span>
                <span>  <?php 
				if($edit_data[0]['id']>0){
				echo form_dropdown('parent_id', $option, $edit_data[0]['id']);
				}else{
				echo form_dropdown('parent_id', $option);
				}
				
				?></span>
		   </div>	
           <div class="form-element">
                <span id="text_name">Status</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('status', $cat_option, 'large');?></span>
		   </div>
           <div class="form-element">
                 <span><?php echo form_input($cat_id); ?></span>	 
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
