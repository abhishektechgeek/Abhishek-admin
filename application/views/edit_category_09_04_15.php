<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_skills").validate({
			rules: {
				name : "required" 
			} ,
			messages: {
			name: "Please enter  category name"
  		},
 		});
	});
</script>


 
<?php
$query2 = $this->db->query("SELECT * FROM `skills` WHERE id = '".$edit_data[0]['id']."'");
$row2 = $query2->row();

 

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
    <h1 class="users">
    <?php if(isset($edit_data[0]['id']))
	         echo 'Edit Category';
		 else
		   echo 'Add Category';
    ?>
    </h1>
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
         <div class="portlet-header fixed error">
        <?php echo $this->session->flashdata('fail');?> 
        </div>
        
        <div class="portlet-header fixed success">
        <?php echo $this->session->flashdata('success');?> 
        </div>
		<div class="portlet-content nopadding">
         <?php echo form_open_multipart('category/save_category',$attributes);?>
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
                <?php if($edit_data[0]['id']>0){?>
                      
                      <img src="<?php echo base_url().'application/uploads/'.$row2->image?>" title="<?php echo $row2->image?>" style="max-height:100px; max-width:100px;" />
 			 <?php } ?>
                
		   </div>
            	
           <div class="form-element">
                <span id="text_name">Status</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('status', $cat_option, $row2->status);?></span>
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
