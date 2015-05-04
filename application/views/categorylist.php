<link rel="stylesheet" type="text/css" href="http://localhost/admin_john/layout/css/categorylist.css" />
<script>
$(document).ready(function () {
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
<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript" > </script>
	
	<script type="text/javascript">

		$( document ).ready( function( ) {
				$( '.tree li' ).each( function() {
						if( $( this ).children( 'ul' ).length > 0 ) {
								$( this ).addClass( 'parent' );     
						}
				});
				
				$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});
				
				/*$( '#all' ).click( function() {
					
					$( '.tree li' ).each( function() {
						$( this ).toggleClass( 'active' );
						$( this ).children( 'ul' ).slideToggle( 'fast' );
					});
				});*/
				
		});
        
	</script>
        
       
    <div class="grid_16" id="content">
    <div class="grid_9">
      <h1 class="skills">Category</h1>
    </div>
   
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
     
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
    
      <div class="portlet">
		
       </div>                         
    </div>
    <div class="clear"></div>
   
    <div class="portlet">
         <div class="portlet-header fixed error">
        <?php echo $this->session->flashdata('fail');?> 
        </div>
        
        <div class="portlet-header fixed success">
        <?php echo $this->session->flashdata('success');?> 
        </div>
        <div class="portlet-header fixed"  align="right"> 
        <?php if($is_modify){?>  <a href="#" onclick="window.open('<?php echo base_url().'index.php/category/edit_category'?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_inline">Add New</a><?php }?>
        </div>
        <!-------------------------------------------start--------------------------------------------------------------- -->
	
   
    <table class="table table-bordered table-striped table-condensed tabhead"   style="margin-bottom:0px;" border="1">
			<tr>
			<td width="10%" style="padding:2px"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></td>
			<td width="30%" style="padding:2px">Image</td>
			<td width="40%" style="padding:2px">Category name</td>
			<td width="20%" style="padding:2px">Action</td>
			</tr>
    </table>
<div id="wrapper1" style="  padding-top: 5px !important;">
<div class="tree">
		
<ul>
		
		<?php
             

$arr = array();
$categoryarr = array();
foreach($skillslist_detail->result() as $key ){
   // print_r( $key);
    //echo "</br>";
 if($key->parent_id !=0) {  
$arr [$key->parent_id][] = array(
'parent_id' =>$key->parent_id ,
'id' =>$key->id ,
'name' =>$key->name,
'image'=>$key->image,
'status'=>$key->status
);
 }else{
     
     $categoryarr [$key->parent_id][] = array(
'parent_id' =>$key->parent_id ,
'id' =>$key->id ,
'name' =>$key->name,
'image'=>$key->image,
 'status'=>$key->status
);
 }
    
}
                
  //print_r($arr);
  //die("dds");
          $traverse = $categoryarr[0];      
                                    $total=0;
                   $i=0;
				    foreach ($traverse as $row) { 
                                        //print_r($row);
                                    ?>
		<li>
		<a> </a>
			<table bgcolor="#eee" style="margin-bottom:10px;">
				<tr>
				<td width="10%"style="background: #fff;"><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row['id'];?>"/>
                        </label></td>
                         <?php $img ='http://gofavo.com/api/admin/application/uploads/'.$row['image'] ;?>
				<td width="30%"style="background: #fff;"><?php echo "<img src= $img width= 150px height= 100px />";?></td>
				<td width="40%"style="background: #fff;"><?php echo $row['name'];?></td>
				<td width="20%"style="background: #fff;"> <?php
						  if($is_modify){
						   if($row['status'] == 1){?>
                           <a href="<?php echo base_url().'category/inactivecategory/'.$row['id'];?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'category/activecategory/'.$row['id'];?>" class="approve_icon" title="Approve"></a> 
                                                  <?php }?> 
                           <a href="#" onclick="window.open('<?php echo base_url().'category/edit_category/'.$row['id'];?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_icon" title="Edit"></a> <a href="<?php echo base_url().'category/deletecategory/'.$row['id'];?>" onclick="return confirm('Do you want to delete?');" class="delete_icon" title="Delete"></a>  </td>
				</tr>
			</table>
		
				<ul>
                                    <?php foreach ($arr[$row['id']] as $innerRow) { 
                                        //print_r($innerRow);?>
				<li><a>
					<table width="650px" style="margin:10px 0px 18px 180px;">
						<tr>
							<td width="8%" style="background: #fff;"><input type="checkbox" value="<?php echo $innerRow['id'];?>" /></td>
                                                        <?php $img ='http://gofavo.com/api/admin/application/uploads/'.$innerRow['image'] ;?>
							<td width="25%" style="background: #fff;"><?php echo "<img src= $img width= 150px height= 100px />";?></td>
							<td width="20%" style="background: #fff;"><?php echo $innerRow['name'];?></td>
							<td width="15%" style="background: #fff;"><?php if($is_modify){
						  if($innerRow['status'] == 1){?>
                           <a href="<?php echo base_url().'category/inactivesegment/'.$innerRow['id'];?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'category/activesegment/'.$innerRow['id'];?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
							 
                    <a href="#" onclick="window.open('<?php echo base_url().'index.php/category/edit_segment/'.$innerRow['id'].'/'.$row['id']?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_icon" title="Edit"></a>
                         <a href="<?php echo base_url().'index.php/category/deletesegment/'.$innerRow['id'];?>" onclick="return confirm('Do you want to delete?');" class="delete_icon" title="Delete"></a></td>
			<td width="10%"><font color="#ddd">------------</font></td>
       <td width="20%"  style="background: #eee;"><a href="<?php echo base_url().'index.php/service/servicelist/'.$innerRow['id']?>">Add/Edit Services</a></td>
                        
                                                </tr>
					</table>
				</a>
                                    
                               
                                    
				</li>
                                                        <?php }}?>
				
				
				<li><a>
					<table width="74%" bgcolor="#ddd" style="   margin: 10px 0px 10px 180px; background-color: #ddd;">
						<tr bgcolor="#eee">
							<td><a href="#" onclick="window.open('<?php echo base_url().'category/edit_segment/add/'.$row['id']?>','mywindow','width=700,height=400  top=200, left=200');">Add Segment</a></td>
						</tr>
					</table>
				</a>
				</li>
				
				</ul>
		</li>
		<?php }
                            $i++;       }		
              ?>
		<li><a>
			<table width="100%" bgcolor="#ddd" style="margin:0px;background-color: #ddd;">
						<tr bgcolor="#ccc">
							<td>  <?php if($is_modify){?>  <a href="#" onclick="window.open('<?php echo base_url().'index.php/category/edit_category'?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_inline">Add New</a><?php }?></td>
						</tr>
			</table>
			</a>
		</li>
		
</ul>
</div>
</div>

        <!--
        <div class="portlet-content nopadding">
        <form action="<?php echo base_url().'category/all_category'?>" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
          
            <thead>
              <tr>
                <th scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
                <th scope="col">Image</th>
                <th scope="col">Category Name</th>
                 
                  <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <?php $total=0;
                   $i=0;
				    foreach ($skillslist_detail->result() as $row) { $i++;
                                    //print_r($row);
                                    ?>
                    
 					<tr>
                        <td><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row->id;?>"/>
                        </label></td>
                       <?php $img ='http://gofavo.com/api/admin/application/uploads/'.$row->image ;?>
                        <td width="150px"><?php echo "<img src= $img width= 150px height= 110px />";?></td>
                        <td><?php echo $row->name;?></td>
                        
                          <td>
                          <?php
						  if($is_modify){
						   if($row->status == 1){?>
                           <a href="<?php echo base_url().'category/inactivecategory/'.$row->id;?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'category/activecategory/'.$row->id;?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
                      
                         <a href="<?php echo base_url().'category/edit_category/'.$row->id;?>" class="edit_icon" title="Edit"></a> <a href="<?php echo base_url().'category/deletecategory/'.$row->id;?>" onclick="return confirm('Do you want to delete?');"" class="delete_icon" title="Delete"></a></td>
              </tr>
					<?php }
					}
              ?>
              
              
              
              
              <tr class="footer">
                <td colspan="4">
                 <?php if($is_modify){?>
               
              <input type="submit" name="action_all" class="delete_inline" value="delete_all"/>
              <input type="submit" name="action_all" class="delete_inline" value="approve_all"/>
              <input type="submit" name="action_all" class="delete_inline" value="unapprove_all"/>
              <?php }?>
              </form>
              
                 
               
                <td align="right">&nbsp;</td>
                <td colspan="3" align="right">
				      
                </td>
              </tr>
            </tbody>
          </table>
        </form>
		</div>
 -->
        <!---------------------------------------END------------------------------------------------------------------- -->
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


   