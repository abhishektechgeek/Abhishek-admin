<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery-1.8.2.min.js"></script>

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
 
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
      <h1 class="service_plans_icon">Service Plans</h1>
    </div>
   
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><!--<a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>-->
    </div>
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
         <?php $a = count($skillslist_detail->result()); 
            if($a < 4){
           
            ?>
        <div class="portlet-header fixed"  align="right"> 
           
            <?php if($is_modify){?> <a href="<?php echo base_url().'serviceplan/edit_serviceplan'?>" class="edit_inline">Add New</a><?php } } else {?>
            <?php 
            }?>
        </div>
       
		<div class="portlet-content nopadding">
        <form action="<?php echo base_url().'serviceplan/all_serviceplan'?>" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
                <th width="206" scope="col">Service Plan Name</th>
                <th width="206" scope="col">Service Plan Image</th>
               
                <th width="282" scope="col">Description</th>
                <th width="282" scope="col">Info</th>
                <th width="282" scope="col">Bids</th>
                <th width="282" scope="col">Price</th>
                <th width="150" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <?php $total=0;
                   $i=0;
				    foreach ($skillslist_detail->result() as $row) { $i++;
					
					//echo "<pre>";print_r($row);die;
					?>
                    
 					<tr>
                        <td width="34"><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row->serviceplan_id;?>"/>
                        </label></td>
                        <?php $row->image = 'http://' . $_SERVER['HTTP_HOST'] . '/api/admin/application/uploads/' . $row->image;?>
                        <td><?php echo $row->name;?></td>
                        <td><img src="<?php echo $row->image; ?>" alt="" width="130" height="80" /></td>
                        <td><?php echo $row->description;?></td>
                         <td><?php echo $row->info;?></td>
                          <td><?php echo $row->bids;?></td>
                          <td><?php echo $row->price;?></td>
                          <td width="90">
                          <?php
						  if($is_modify){
						   if($row->status == 1){?>
                           <a href="<?php echo base_url().'serviceplan/inactiveserviceplan/'.$row->serviceplan_id;?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'serviceplan/activeserviceplan/'.$row->serviceplan_id;?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
							 
                    
                         <a href="<?php echo base_url().'index.php/serviceplan/edit_serviceplan/'.$row->serviceplan_id;?>" class="edit_icon" title="Edit"></a> <!--a href="<?php //echo base_url().'serviceplan/deleteserviceplan/'.$row->serviceplan_id;?>" onclick="return confirm('Do you want to delete?');"" class="delete_icon" title="Delete"></a--></td>
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
              
                 <!--<a href="#" class="edit_inline">Edit all</a><a href="#" class="delete_inline">Delete all</a><a href="#" class="approve_inline">Approve all</a><a href="#" class="reject_inline">Reject all</a>--></td>
                <td align="right">&nbsp;</td>
                <td colspan="3" align="right">
				<!--  PAGINATION START  -->             
                   <!-- <div class="pagination">
                    <span class="previous-off">&laquo; Previous</span>
                    <span class="active">1</span>
                    <a href="query_41878854">2</a>
                    <a href="query_8A8058C2">3</a>
                    <a href="query_2823E521">4</a>
                    <a href="query_B322F5B7">5</a>
                    <a href="query_3A2A444D">6</a>
                    <a href="query_912D14DB">7</a>
                    <a href="query_41878854" class="next">Next &raquo;</a>
                    </div>  -->
                <!--  PAGINATION END  -->       
                </td>
              </tr>
            </tbody>
          </table>
        </form>
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


   