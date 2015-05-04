<script>
$(document).ready(function () {

$( "#filter" ).click(function() {
  $("#target").attr("action", "<?php echo base_url().'user/userlist'?>");
  $( "#target" ).submit();
})
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
function submitForm(){
   $("#target").attr("action", "<?php echo base_url().'user/userlist'?>");
  $( "#target" ).submit();
}
</script>
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users">Users</h1>
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
         <?php if($is_modify){?><a href="<?php echo base_url().'user/edit_user'?>" class="edit_inline">Add New</a><?php }?>
        </div>
		<div class="portlet-content nopadding">
        <form action="<?php echo base_url().'user/all_user'?>" method="post" id="target" >
        <select name="usertype" id="usertype" onchange="return submitForm();" >
             <option value="0">All</option>
            <option value="1" <?php if($user_type =='1') echo 'selected="selected" '?>>Consumer</option>
            <option value="2" <?php if($user_type =='2') echo 'selected="selected" '?>>service Provider</option>
            <option value="3" <?php if($user_type =='3') echo 'selected="selected" '?>>Both</option>
            </select>
            <input type="hidden" name="usertype_filter"  value="usertype_filter"/>
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
                <th width="80" scope="col">First Name</th>
                <th width="80" scope="col">Last name</th>
                <th width="80" scope="col">Birthday</th>
                <th width="80" scope="col">Gender</th>
                <th width="100" scope="col">Username</th>
                <th width="200" scope="col">Device</th>
                <th width="90" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <tr>
             <td></td>
                        <td><input type="text" name="first_name"  style="width:50px;"/></td>
                        <td><input type="text" name="last_name" style="width:50px;" /></td>
                        <td><input type="text" name="birthday" style="width:50px;" /></td>
                        <td><input type="text" name="gender" style="width:50px;" /></td>
                        <td><input type="text" name="email" style="width:50px;" /></td>
                        <td></td>
                        
                         <td><input type="button" id="filter" class="delete_inline" name="filter_btn"  value="filter"/>  </td>
            </tr> 
             <?php $total=0;
                   $i=0;
				    foreach ($user_listing->result() as $row) { $i++;?>
					<tr>
                        <td width="34"><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row->id;?>"/>
                        </label></td>
                        <td><?php echo $row->first_name;?></td>
                        <td><?php echo $row->last_name;?></td>
                        <td><?php echo $row->birthday;?></td>
                        <td><?php if($row->gender == 'm')echo 'Male';?><?php if($row->gender == 'f')echo 'Female';?></td>
                        <td><?php echo $row->email;?></td>
                        <td style="word-wrap: break-word;word-break: break-all;white-space: normal;"><?php echo $row->udid;?></td>
                        <td width="90">
                            <?php
							if($is_modify){
							  if($row->status == 1){?>
                           <a href="<?php  echo base_url().'user/inactiveuser/'.$row->id;?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'user/activeuser/'.$row->id;?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
                    
                         <a href="<?php echo base_url().'user/edit_user/'.$row->id;?>" class="edit_icon" title="Edit"></a> <a href="<?php echo base_url().'user/deleteuser/'.$row->id;?>" onclick="return confirm('Do you want to delete?');"" class="delete_icon" title="Delete"></a>
                         
                   <a href="<?php echo base_url().'user/view_userprofile/'.$row->id;?>"   title="View"> View</a>        
                         </td>
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
          <div id='results'>
			<?php $CI =& get_instance(); ?>
            <?php //echo $CI->table->generate($user_listing); ?>
            <?php echo $CI->pagination->create_links(); ?>
        </div>
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

   