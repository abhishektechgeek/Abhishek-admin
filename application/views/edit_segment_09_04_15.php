<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_skills").validate({
			rules: {
				name : "required" 
			} ,
			messages: {
			name: "Please enter  segment name"
  		},
 		});
	});
</script><?php
 
$query2 = $this->db->query("SELECT * FROM `skills` WHERE id = '".$edit_data[0]['id']."'");
$row2 = $query2->row();

 $option = array();
$query1 = $this->db->query("SELECT parent_id FROM `skills` WHERE id = '".$edit_data[0]['id']."' ");
foreach ($query1->result_object() as $row1){
   $default_cat = $row1->parent_id;
 }
 
 $query = $this->db->query("SELECT id,name FROM `skills` WHERE parent_id = '0' ");
  
foreach ($query->result_object() as $row){
   $option[$row->id] = $row->name;
 }
 

$attributes = array('class' => '', 'id' => 'edit_skills','name' => 'edit_skills');

#########################################
if($edit_data[0]['id']>0){
$cat_option = array(
1=>'yes',
0=>'no'
);
$segment_name=array(
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
$segment_name=array(
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
	         echo 'Edit segment';
		 else
		   echo 'Add segment';
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
         <?php echo form_open_multipart('category/save_segment',$attributes);?>
             <div class="form-element">
                <span id="text_name">segment name</span>
                <span id="text_name"> : </span>
                <span><?php echo form_input($segment_name); ?></span>
		    </div>
            <div class="form-element">
                <span id="text_name">Image</span>
                <span id="text_name"> : </span>
                <span><?php echo form_upload($image); ?></span>
  		   </div>
           <div class="form-element">
                <?php if($edit_data[0]['id']>0){?>
                      <img src="<?php echo base_url().'application/uploads/'.$row2->image?>" title="<?php echo $row2->image?>" style="max-height:100px; max-width:100px;"/>
 			 <?php } ?>
                
		   </div>
           <div class="form-element">
               <input name='parent_id' type='hidden' value='<?php echo $category_id ?>' />
               <!-- <span id="text_name">Category</span>
                <span id="text_name"> : </span>
                <span>  <?php 
				if($edit_data[0]['id']>0){
				 
				echo form_dropdown('parent_id', $option, $default_cat);
				}else{
				echo form_dropdown('parent_id', $option);
				}
				
				?></span>
               -->
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
