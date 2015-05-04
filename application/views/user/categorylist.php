<link rel="stylesheet" type="text/css" href="http://gofavo.com/api/admin/layout/css/categorylist.css" />
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

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
       <!--<a href="<?php //echo base_url().'category/';?>" >Category</a>
      <a href="<?php //echo base_url().'segment/';?>" >Segment</a>-->
      <h1 class="skills">Category</h1>
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
         <div class="portlet-header fixed error">
        <?php echo $this->session->flashdata('fail');?> 
        </div>
        
        <div class="portlet-header fixed success">
        <?php echo $this->session->flashdata('success');?> 
        </div>
        <div class="portlet-header fixed"  align="right"> 
        <?php if($is_modify){?>  <a href="#" onclick="window.open('<?php echo base_url().'category/edit_category'?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_inline">Add New</a><?php }?>
        </div>
        <!-------------------------------------------start--------------------------------------------------------------- -->
	

    <table width="550px" bgcolor="#ddd" style="background-color: #ddd;margin-bottom:0px;" border="1">
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
			<table width="550px" bgcolor="#eee" style="margin-bottom:10px;">
				<tr>
				<td width="10%"style="background: #eee;"><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row['id'];?>"/>
                        </label></td>
                         <?php $img ='http://gofavo.com/api/admin/application/uploads/'.$row['image'] ;?>
				<td width="30%"style="background: #eee;"><?php echo "<img src= $img width= 150px height= 100px />";?></td>
				<td width="40%"style="background: #eee;"><?php echo $row['name'];?></td>
				<td width="20%"style="background: #eee;"> <?php
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
							<td width="8%" style="background: #eee;"><input type="checkbox" value="<?php echo $innerRow['id'];?>" /></td>
                                                        <?php $img ='http://gofavo.com/api/admin/application/uploads/'.$innerRow['image'] ;?>
							<td width="25%" style="background: #eee;"><?php echo "<img src= $img width= 150px height= 100px />";?></td>
							<td width="20%" style="background: #eee;"><?php echo $innerRow['name'];?></td>
							<td width="15%" style="background: #eee;"><?php if($is_modify){
						  if($row->status == 1){?>
                           <a href="<?php echo base_url().'segment/inactivesegment/'.$row->id;?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'segment/activesegment/'.$row->id;?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
							 
                    
                         <a href="<?php echo base_url().'segment/edit_segment/'.$row->id;?>" class="edit_icon" title="Edit"></a> <a href="<?php echo base_url().'segment/deletesegment/'.$row->id;?>" onclick="return confirm('Do you want to delete?');"" class="delete_icon" title="Delete"></a></td>
			<td width="10%"><font color="#ddd">------------</font></td>
       <td width="20%"  style="background: #eee;">Add / Edit Services</td>
                        
                                                </tr>
					</table>
				</a>
                                    
                               
                                    
				</li>
                                                        <?php }}?>
				
				
				<li><a>
					<table width="74%" bgcolor="#ddd" style="   margin: 10px 0px 10px 180px; background-color: #ddd;">
						<tr bgcolor="#ccc">
							<td>Add Segment</td>
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
			<table width="97%" bgcolor="#ddd" style="margin: 10px 0px 10px 30px;background-color: #ddd;">
						<tr bgcolor="#ccc">
							<td>  <?php if($is_modify){?>  <a href="#" onclick="window.open('<?php echo base_url().'category/edit_category'?>','mywindow','width=700,height=400  top=200, left=200');"  class="edit_inline">Add New</a><?php }?></td>
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


   