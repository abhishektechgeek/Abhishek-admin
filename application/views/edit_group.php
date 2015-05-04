 <?php 
//echo "<pre>";print_r($edit_data[0]['group_name']);die;
 //echo $this->session->flashdata('fail');die;?> 
 <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery.validate.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_group").validate({
			rules: {
				name : "required" 
			} ,
			messages: {
			name: "Please enter  group name"
  		},
 		});
	});
</script>

<style>
.success{color:green!important;}
.error{ color:red!important;}
</style>
 
<?php
$query2 = $this->db->query("SELECT * FROM `menu` ");
$row2 = $query2->result_array();

  

$attributes = array('class' => '', 'id' => 'edit_group','name' => 'edit_group');

#########################################
$edit_data[0]['id'] = $edit_data[0]['group_id'];
if($edit_data[0]['id']>0){

$query3 = $this->db->query("SELECT * FROM `group_user_map` WHERE group_id = '".$edit_data[0]['id']."' ");
$row3 = $query3->result_array();
 

$access_arr = array();
$modify_arr = array();
foreach($row3 as $k=>$v){
$access_arr[] = $v['access_permission'];
$modify_arr[] = $v['modify_permission'];
}
   
$group_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['group_name'],
			'class'=>'inputText' 
			);
	$cat_option = array(
	1=>'yes',
	0=>'no'
	);		
 $cat_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['group_id'],
				'type' =>'hidden'				
				);	
			
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
 			  );
}else{
  
$group_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>'',
			'class'=>'inputText' 
			);
 $cat_option = array(
	1=>'yes',
	0=>'no'
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
	         echo 'Edit group';
		 else
		   echo 'Add group';
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
         <?php echo form_open_multipart('group/save_group',$attributes);?>
             <div class="form-element">
                <span id="text_name">group name</span>
                <span id="text_name"> : </span>
                <span><?php echo form_input($group_name); ?></span>
		    </div>
            
            <div class="form-element">
                <span id="text_name">Access Permission</span>
                <span id="text_name"> : </span>
               
                <span>
                
				<?php foreach($row2 as $rec){
				if(in_array($rec['menu_id'],$access_arr)){
				$str = "checked = true";
				}else{$str = '';}
				echo $rec['title'] . ' : <input type="checkbox" name="view_permission[]" value="'.$rec['menu_id'].' "'.$str.'""/>';
				
				}?>
				 </span>
		    </div>
            
            
            <div class="form-element">
                <span id="text_name">Modify Permission</span>
                <span id="text_name"> : </span>
                <span>
                
				<?php foreach($row2 as $rec){
				if(in_array($rec['menu_id'],$modify_arr)){
				$str = "checked = true";
				}else{$str = '';}
				
				
				echo $rec['title'] . ' : <input type="checkbox" name="modify_permission[]" value="'.$rec['menu_id'].' "'.$str.'""/>';
				
				}?>
				 </span>
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
