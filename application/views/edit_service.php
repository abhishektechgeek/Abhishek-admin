<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabs-2').hide();
        $('#tabs-3').hide();
        $('#tabs-1').show();
        $('#one').on('click', function() {
            $('#tabs-1').show();
            $('#tabs-2').hide();
            $('#tabs-3').hide();
        });



        $('#two').on('click', function() {
            $('#tabs-2').show();
            $('#tabs-1').hide();
            $('#tabs-3').hide();
        });

        $('#three').on('click', function() {
            $('#tabs-3').show();
            $('#tabs-2').hide();
            $('#tabs-1').hide();
        });
        /* $( "#tabs" ).tabs()*/



        $("#edit_skills").validate({
            rules: {
                name: "required"
            },
            messages: {
                name: "Please enter  service name"
            },
        });

        var scntDiv = $('#p_scents');
<?php if (count($edit_attr_data) > 0) { ?>
            $('#count_attr').val('<?php echo count($edit_attr_data); ?>');
<?php } else { ?>
            $('#count_attr').val('1');
<?php } ?>

        $('#addScnt').live('click', function() {
            var i = $('#count_attr').val();
            i++;
            $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="attribute_name_' + i + '" value="" placeholder="Attribute Name" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);

            $('#count_attr').val(i);
            return false;
        });


        $('#remScnt').live('click', function() {
            var i = $('#count_attr').val();
            $(this).parents('p').remove();
            i--;
            $('#count_attr').val(i);
            return false;
        });


        var scntDiv2 = $('#sp_scents');
<?php if (count($edit_spc_data) > 0) { ?>
            $('#count_spc').val('<?php echo count($edit_spc_data); ?>');
<?php } else { ?>
            $('#count_spc').val('1');
<?php } ?>

        $('#sp_addScnt').live('click', function() {
            var j = $('#count_spc').val();


            j++;
            $('<p><label for="sp_scnts"><input type="text" id="sp_scnt" size="20" name="sp_attribute_name_' + j + '" value="" placeholder="Attribute Name" /></label> <a href="#" id="remScnt2">Remove</a></p>').appendTo(scntDiv2);


            $('#count_spc').val(j);
            return false;
        });

        $('#remScnt2').live('click', function() {
            var j = $('#count_spc').val();
            $(this).parents('p').remove();
            j--;
            $('#count_spc').val(j);
            return false;
        });


    });



</script>
<style>
    .textarea {width:170; height:100px;}


</style>
<?php
$query2 = $this->db->query("SELECT * FROM `skills` WHERE id = '" . $edit_data[0]['id'] . "'");
$row2 = $query2->row();

$option = array();

$segment_array = array();
$query = $this->db->query("SELECT DISTINCT parent_id FROM `skills` WHERE parent_id != '0' ");
foreach ($query->result_object() as $row) {
    $segment_array[] = $row->parent_id;
}

$str = implode(',', $segment_array);

$query = $this->db->query("SELECT id,name,parent_id FROM `skills` WHERE id IN(" . $str . " )  ");

$i = 0;
foreach ($query->result_object() as $row) {
    $option[$i]['name'] = $row->name;
    $option[$i]['id'] = $row->id;
    $option[$i]['parent_id'] = $row->parent_id;

    $i++;
}




$query_service = $this->db->query("SELECT c.id, c.name AS service, p.name AS segment, ca.name AS category
FROM skills AS c
INNER JOIN skills AS p ON c.parent_id = p.id
INNER JOIN skills AS ca ON p.parent_id = ca.id
WHERE c.type =3");
$option_ser = array();
foreach ($query_service->result_object() as $row_service) {
    //  echo "<pre>";  
    $option_ser[$row_service->id] = $row_service->category . ' > ' . $row_service->segment . ' > ' . $row_service->service;
}

//echo "<pre>"; print_r($option_ser); exit;

$attributes = array('class' => '', 'id' => 'edit_skills', 'name' => 'edit_skills');

#########################################
if ($edit_data[0]['id'] > 0) {

    foreach ($edit_attr_data as $key => $attr_data) {
        if ($attr_data['attribute_name'] == 'description_upgrade')
            $desc_upgrade = $attr_data['attribute_value'];
    }


    foreach ($edit_spc_data as $key => $spc_data) {
        if ($spc_data['attribute_name'] == 'specification')
            $spc_name = $attr_data['attribute_value'];
    }

    $cat_option = array(
        1 => 'yes',
        0 => 'no'
    );
    $service_name = array(
        'name' => 'name',
        'id' => 'name',
        'maxlength' => '100',
        'size' => '50',
        'value' => $edit_data[0]['name'],
        'class' => 'inputText'
    );



    $cat_id = array(
        'name' => 'id',
        'id' => 'id',
        'maxlength' => '100',
        'size' => '50',
        'value' => $edit_data[0]['id'],
        'type' => 'hidden'
    );


    $specification = array(
        'name' => 'specification',
        'id' => 'specification',
        'maxlength' => '100',
        'size' => '50',
        'value' => $edit_data[0]['specification'],
        'class' => 'inputText'
    );

    $image = array(
        'name' => 'image',
        'id' => 'image',
    );
    
    $id = array(
        'id' => $edit_data[0]['id'],
       );

    $submit = array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Update'
    );

    $description = array(
        'name' => 'description',
        'id' => 'description',
        'value' => $edit_data[0]['description'],
        'rows' => '10',
        'cols' => '37',
        'class' => 'textarea'
    );

    $description_upgrade = array(
        'name' => 'description_upgrade',
        'id' => 'description_upgrade',
        'value' => '',
        'rows' => '10',
        'cols' => '37',
        'class' => 'textarea'
    );
}else {

    $cat_option = array(
        1 => 'yes',
        0 => 'no'
    );
    $service_name = array(
        'name' => 'name',
        'id' => 'name',
        'maxlength' => '100',
        'size' => '50',
        'value' => '',
        'class' => 'inputText'
    );

    $specification = array(
        'name' => 'specification',
        'id' => 'specification',
        'maxlength' => '100',
        'size' => '50',
        'value' => '',
        'class' => 'inputText'
    );


    $image = array(
        'name' => 'image',
        'id' => 'image',
    );


    $cat_id = array(
        'name' => 'id',
        'id' => 'id',
        'maxlength' => '100',
        'size' => '50',
        'value' => '',
        'type' => 'hidden'
    );


    $description = array(
        'name' => 'description',
        'id' => 'description',
        'value' => '',
        'rows' => '10',
        'cols' => '37',
        'class' => 'textarea'
    );

    $description_upgrade = array(
        'name' => 'description_upgrade',
        'id' => 'description_upgrade',
        'value' => '',
        'rows' => '10',
        'cols' => '37',
        'class' => 'textarea'
    );


    $submit = array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Insert'
    );
}
#################################################################
?>

<!-- CONTENT START -->
<div class="grid_16" id="content">
    
    <!--  TITLE START  --> 
    <div class="grid_9">
        <h1 class="users">
            <?php
            if (isset($edit_data[0]['id']))
                echo 'Edit service';
            else
                echo 'Add service';
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
        <?php //echo "<pre>";print_r($user_listing);die;  ?>

        <div class="portlet" >
            <div class="portlet-header fixed error">
                <?php echo $this->session->flashdata('fail'); ?> 
            </div>

            <div class="portlet-header fixed success">
                <?php echo $this->session->flashdata('success'); ?> 
            </div>
            <div class="portlet-content nopadding">
     
                <?php echo form_open_multipart('service/save_service', $attributes); ?>
                <div class="form-element" >
                     
                    <?php echo form_hidden('serviceId', $edit_data[0]['id']);  ?>
                    <?php echo form_hidden('segmentId', $segment_id);  ?>
                    <!--div id="tabs">
                    <!--ul>
                        <li><a href="#" id="one">Genral</a></li>
                        <li><a href="#" id="two">Upgrade</a></li>
                        <li><a href="#" id="three">Specification</a></li-->
                    </ul-->


                    </div-->
                 <!-- <a href='<?php echo base_url()."service/service_upgrade/".$edit_data[0]['id']; ?>'>service Upgrade </a> -->
                 
                    <div class="form-element" align="right">
                        <span><?php echo form_submit($submit); ?></span>
                    </div>
                    <div id="tabs-1">
                        <div class="form-element">
                            <span id="text_name">service name</span>
                            <span id="text_name"> : </span>
                            <span><?php echo form_input($service_name); ?></span>
                        </div>

                        <?php echo form_hidden('parent_id', $segment_id);  ?>
                        <?php echo form_hidden('service_type', $edit_data[0]['service_type']);  ?>
                        <?php echo form_hidden('service_type', $row2->image);  ?>

                       <!-- <div class="form-element">
                            <span id="text_name">Link To Category</span>
                            <span id="text_name"> : </span>
                            
                           <!-- <span>  

                                <?php
                                if ($edit_data[0]['id'] > 0) {

                                    echo form_dropdown('parent_id', $segment, $edit_data[0]['parent_id']);
                                } else {
                                    echo form_dropdown('parent_id', $segment);
                                }
                                ?>
                            </span>                        </div> -->
                       <!--      <div class="form-element">
                            <span id="text_name">Service Type</span>
                            <span id="text_name"> : </span>
                       <span>  

                                <?php
                                if ($edit_data[0]['service_type'] > 0) {

                                    echo form_dropdown('service_type', $serviceType, $edit_data[0]['service_type']);
                                } else {
                                    echo form_dropdown('service_type', $serviceType);
                                }
                                ?>
                            </span> 
                        </div>
-->
                        <div class="form-element">
                            <span id="text_name">What You Get(Description)</span>
                            <span id="text_name"> : </span>
                            <span> <!--   <textarea name="description" id="description" rows="4" cols="30" > -->
                                <textarea class="ckeditor" name="description"  id="description" rows="4" cols="30">
                            <?php
                                if ($edit_data[0]['id'] > 0) {
                                    echo $edit_data[0]['description'];
                                }
                                ?> </textarea>
                          <!--      <script language="Javascript" type="text/javascript">
                                    var description = $("#description").css("height", "100").css("width", "600").htmlbox({
                                        toolbars: [
                                            ["cut", "copy", "paste", "separator_dots", "bold", "italic", "underline", "strike", "sub", "sup", "separator_dots", "undo", "redo", "separator_dots",
                                                "left", "center", "right", "justify", "separator_dots", "ol", "ul", "indent", "outdent", "separator_dots", "link", "unlink", "image"],
                                            ["code", "removeformat", "striptags", "separator_dots", "quote", "paragraph", "hr", "separator_dots",
                                                {icon: "new.gif", tooltip: "New", command: function() {
                                                    }},
                                                {icon: "open.gif", tooltip: "Open", command: function() {
                                                        alert('Open')
                                                    }},
                                                {icon: "save.gif", tooltip: "Save", command: function() {
                                                        alert('Save')
                                                    }}
                                            ]
                                        ],
                                        idir: "<?php echo base_url() . 'layout/'; ?>js/editor/images/", // HtmlBox Image Directory, This is needed for the images to work
                                        icons: "default",
                                        skin: "blue"
                                    });
                                </script>  --> </span>
                        </div>
<!--
                        <div class="form-element">
                            <span id="text_name">Image</span>
                            <span id="text_name"> : </span>
                            <span><?php echo form_upload($image); ?></span>
                        </div>

                        <div class="form-element">
                            <?php if ($edit_data[0]['id'] > 0) { ?>
                                <img src="<?php echo base_url() . 'application/uploads/' . $row2->image ?>" title="<?php echo $row2->image ?>" style="max-height:100px; max-width:100px;"/>
<?php } ?>

                        </div>
-->
                    </div>
                    <div id="tabs-2">
                        <div class="form-element">
                            <span><?php //echo form_input($cat_id);  ?></span>	 
                        </div>
                        <div class="form-element" style="max-height:100px; max-width:100px;">
                            <span id="text_name">Link To Service</span>
                            <span id="text_name" > : </span>
                            <span >  

                                <?php
//if ($edit_data[0]['id'] > 0) {
//
//    echo form_dropdown('parent_id', $option_ser, $edit_data[0]['parent_id']);
//} else {
//    echo form_dropdown('parent_id', $option_ser);
//}
                                ?>
                            </span>
                        </div>

                        <div class="form-element">
                            <span id="text_name">Description</span>
                            <span id="text_name"> : </span>
                            <span> 
                                <textarea name="description_upgrade" id="description_upgrade" rows="10" cols="37" ><?php
                                    if ($edit_data[0]['id'] > 0) {
                                        echo $row2->upgrade_description;
                                    }
                                    ?></textarea>

                                <script language="Javascript" type="text/javascript">
                                    var description_upgrade = $("#description_upgrade").css("height", "100").css("width", "600").htmlbox({
                                        toolbars: [
                                            ["cut", "copy", "paste", "separator_dots", "bold", "italic", "underline", "strike", "sub", "sup", "separator_dots", "undo", "redo", "separator_dots",
                                                "left", "center", "right", "justify", "separator_dots", "ol", "ul", "indent", "outdent", "separator_dots", "link", "unlink", "image"],
                                            ["code", "removeformat", "striptags", "separator_dots", "quote", "paragraph", "hr", "separator_dots",
                                                {icon: "new.gif", tooltip: "New", command: function() {
                                                    }},
                                                {icon: "open.gif", tooltip: "Open", command: function() {
                                                        alert('Open')
                                                    }},
                                                {icon: "save.gif", tooltip: "Save", command: function() {
                                                        alert('Save')
                                                    }}
                                            ]
                                        ],
                                        idir: "<?php echo base_url() . 'layout/'; ?>js/editor/images/", // HtmlBox Image Directory, This is needed for the images to work
                                        icons: "default",
                                        skin: "blue"
                                    });
                                </script>
<?php //echo   @form_textarea($description_upgrade);  ?></span>
                        </div>


                        <div class="form-element">
                            <span id="text_name"><h2><a href="#" id="addScnt">Add Upgrade Attribute</a></h2></span>
                        </div>
                        <div id="p_scents">
                            <p>
                                <?php
                                if (count($edit_attr_data) > 0) {
                                    $i = 1;
                                    foreach ($edit_attr_data as $attr_data) {

                                        echo '<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="attribute_name_' . $i . '" value="' . $attr_data['attribute_name'] . '" placeholder="Attribute Name" /></label></p>';
                                        $i++;
                                    }
                                    echo '<input type="hidden" name="count_attr" value="' . count($edit_attr_data) . '" id="count_attr"/>';
                                } else {
                                    echo '<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="attribute_name_1" value="" placeholder="Attribute Name" /></label></p>';

                                    echo '<input type="text" name="count_attr" value="1" id="count_attr"/>';
                                }
                                ?>




                            </p>
                        </div>
                    </div>

                </div>  

<?php echo form_close(); ?>
            </div>
        </div>
        <!--  END #PORTLETS -->  
    </div>
    <div class="clear"> </div>
    <!-- END CONTENT-->    
</div>
<div class="clear"> </div>

<!-- This contains the hidden content for modal box calls -->

</div>
<!-- WRAPPER END -->
