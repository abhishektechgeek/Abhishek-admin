<?php //echo "<pre>";print_r($edit_data);die;?>
 
<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_skills").validate({
			rules: {
				name : "required" ,
				info : "required" ,
				description : "required" ,
				bids : "required" 
			} ,
			messages: {
			name: "Please enter name" ,
			info: "Please enter  info " ,
			description: "Please enter  description " ,
			bids: "Please enter  bids "
  		},
 		});
		
		$('#allbox').click(function () {
         var checked = $(this).is(':checked');            
        $('.checkbox').each(function () {
            var checkBox = $(this);               
            if (checked) {
                checkBox.prop('checked', true);                
            }
            else {
                checkBox.prop('checked', false);                
            }
        });

    });
	});
</script>


 
<?php
 
 

$attributes = array('class' => '', 'id' => 'edit_skills','name' => 'edit_skills');

#########################################
if($edit_data[0]['serviceplan_id']>0){
 
$category_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['name'],
			'class'=>'inputText' 
			);
			
			
$info=array(
			'name'	=>	'info',
			'id'	=>	'info',
			'maxlength'=>'44',
			'size'=>'50',
			'value'=>$edit_data[0]['info'],
			'class'=>'inputText' 
			);
			
		$bids=array(
			'name'	=>	'bids',
			'id'	=>	'bids',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['bids'],
			'class'=>'inputText' 
			);
                $price=array(
			'name'	=>	'price',
			'id'	=>	'price',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['price'],
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
				'value'=>$edit_data[0]['serviceplan_id'],
				'type' =>'hidden'				
				);		
 
			
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
 			  );
}else{

 
$category_name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>'',
			'class'=>'inputText' 
			);
			
	$info=array(
			'name'	=>	'info',
			'id'	=>	'info',
			'maxlength'=>'44',
			'size'=>'50',
			'value'=>'',
			'class'=>'inputText' 
			);
        $image=array(
			'name'	=>	'image',
			'id'	=>	'image',
			);
			
			
	$bids=array(
			'name'	=>	'bids',
			'id'	=>	'bids',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>'',
			'class'=>'inputText' 
			);
			$price=array(
			'name'	=>	'price',
			'id'	=>	'price',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['price'],
			'class'=>'inputText' 
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
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Service Plan Edit</div>
		<div class="portlet-content nopadding">
         <?php echo form_open_multipart('serviceplan/save_serviceplan',$attributes);?>
             <div class="form-element">
                <span id="text_name">Service Plan name</span>
                <span id="text_name"> : </span>
                <span><?php echo form_input($category_name); ?></span>
		    </div>
            
           <div class="form-element">
                <span id="text_name">Description</span>
                <span id="text_name"> : </span>
                <span>
                <textarea name="description" id="description" rows="10" cols="37" ><?php  if($edit_data[0]['serviceplan_id']>0){ echo $edit_data[0]['description'];}?></textarea>
                <script language="Javascript" type="text/javascript">
var description = $("#description").css("height","100").css("width","600").htmlbox({
    toolbars:[
	     //["cut","copy","paste","separator_dots","bold","italic","underline","strike","sub","sup","separator_dots","undo","redo","separator_dots",
		 //"left","center","right","justify","separator_dots","ol","ul","indent","outdent","separator_dots","link","unlink","image"],
		 //["code","removeformat","striptags","separator_dots","quote","paragraph","hr","separator_dots",
			// {icon:"new.gif",tooltip:"New",command:function(){}},
			// {icon:"open.gif",tooltip:"Open",command:function(){alert('Open')}},
			// {icon:"save.gif",tooltip:"Save",command:function(){alert('Save')}}
		  //]
	],
	idir:"<?php echo base_url().'layout/';?>js/editor/images/",// HtmlBox Image Directory, This is needed for the images to work
	icons:"default",
	skin:"blue"
});
</script>    
                  </span>
		   </div>
           
           
            <div class="form-element">
                <span id="text_name">Info</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($info); ?></span>
 		   </div>
                    <div class="form-element">
                <span id="text_name">Image</span>
                <span id="text_name"> : </span>
                <span><?php echo form_upload($image); ?></span>
  		   </div>
           
           <div class="form-element">
                <span id="text_name">Bids</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($bids); ?></span>
 		   </div>
            	
             <div class="form-element">
                <span id="text_name">Price</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($price); ?></span>
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
