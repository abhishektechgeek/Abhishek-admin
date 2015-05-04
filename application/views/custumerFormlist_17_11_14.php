<?php
session_start();

/* formbuilder */
/* Copyright (c) 2014 (v3.0) Shlomi Nissan, 1ByteBeta (http://www.1bytebeta.com) */
/* Form builder loader class for PHP */

class formLoader {

	/**
	 * Form structure
	 *
	 * @var object
	 **/
	var $form_data;

	/**
	 * Form action
	 *
	 * @var string
	 **/
	var $action;

	/**
	 * Constructor
	 *
	 * @param string $form_json
	 * @return void
	 * @access public
	 **/
	public function __construct($form_json, $form_action)
	{
		$this->form_data = json_decode(str_replace('\\', '', $form_json));
		$this->action = $form_action;
	}

	/**
	 * Render the form
	 *
	 * @return void
	 * @access public 
	 **/
	public function render_form()
	{
		if( empty($this->form_data) || empty($this->action) ) {
			throw new Exception("Error Processing Request", 1);
		}

		$fields = '';

		foreach ($this->form_data->fields as $field) {
			
			// Single line text
			if($field->type == 'element-single-line-text' ) {
				$fields .= $this->element_single_line_text($field);
			}

			// Number
			if($field->type == 'element-number') {
				$fields .= $this->element_number($field);
			}

			// Paragraph text
			if($field->type == 'element-paragraph-text') {
				$fields .= $this->element_paragraph_text($field);
			}

			// Checkboxes
			if($field->type == 'element-checkboxes') {
				$fields .= $this->element_checkboxes($field);
			}

			// Multiple choice
			if($field->type == 'element-multiple-choice') {
				$fields .= $this->element_multiple_choice($field);
			}

			// Dropdown
			if($field->type == 'element-dropdown') {
				$fields .= $this->element_dropdown($field);
			}

			// Section break
			if($field->type == 'element-section-break') {
				$fields .= $this->element_section_break($field);
			}

		}

		$form = $this->open_form($fields);
		echo $form;
	}

	/**
	 * Render the form header
	 *
	 * @param object $fields
	 * @return string $html
	 * @access private 
	 **/
	private function open_form($fields)
	{
		$html = sprintf('<form action="%s" method="post" accept-charset="utf-8" role="form" novalidate="novalidate" >', $this->action);
		$html .= '<div class="form-title">';
		$html .= sprintf('<h2>%s</h2><h3>%s</h3>', $this->form_data->title, $this->form_data->description);
		$html .= $fields;
		//$html .= '<button type="submit" class="btn btn-primary">Submit</button>';
		$html .= '</div></form>';
		return $html;
	}

	/**
	 * Encode element title
	 *
	 * @param string $title
	 * @return string $str
	 * @access private 
	 **/
	private function encode_element_title($title)
	{
		$str = str_replace(' ', '_', strtolower($title));
		$str = preg_replace("/[^a-zA-Z0-9.-_]/", "", $str);
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8');
		$str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');

		return $str;
	}

	/**
	 * Get formatted label for form element
	 *
	 * @param string $id
	 * @param string $title
	 * @param mixed $required
	 * @return string
	 * @access private
	 **/
	private function make_label($id, $title, $required)
	{
		if( $required ) {
			$html = sprintf('<label for="%s">%s <span style="color: red">*</span></label>', $id, $title);
		} else {
			$html = sprintf('<label for="%s">%s </label>', $id, $title);
		}

		return $html;
	}

	/**
	 * Render single line text
	 *
	 * @param object $field
	 * @return string $html
	 * @access private 
	 **/
	private function element_single_line_text($field)
	{
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
	    $html .= sprintf('<input type="text" name="%s" id="%s" class="form-control %s">', $id, $id, $required);
	  	$html .= '</div>';

	  	return $html;
	}

	/**
	 * Render number
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_number($field)
	{
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
	    $html .= sprintf('<input type="number" name="%s" id="%s" class="form-control %s">', $id, $id, $required);
	  	$html .= '</div>';

	  	return $html;
	}

	/**
	 * Render paragraph text
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_paragraph_text($field)
	{
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
	    $html .= sprintf('<textarea id="%s" name="%s" class="form-control %s" rows="3"></textarea>', $id, $id, $required);
	  	$html .= '</div>';

	  	return $html;
	}

	/**
	 * Checkboxes
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_checkboxes($field)
	{
		error_log('message');
		
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
		
	    // Render choices
		for($i=0; $i < count($field->choices); $i++) {
			$checked = $field->choices[$i]->checked ? "checked" : '';

			$html .= '<div class="checkbox"><label>';
			$html .= sprintf('<input type="checkbox" name="%s_%d" id="%s-%d" value="%s" %s>%s', $id, $i, $id, $i, $field->choices[$i]->value, $checked, $field->choices[$i]->title);
			$html .= '</label></div>';
		}

	  	$html .= '</div>';

	  	return $html;
	}

	/**
	 * Mutliple choice
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_multiple_choice($field)
	{
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
		
	    // Render choices
		for($i=0; $i < count($field->choices); $i++) {
			$checked = $field->choices[$i]->checked ? "checked" : '';

			$html .= '<div class="radio"><label>';
			$html .= sprintf('<input type="radio" name="%s" id="%s_%d" value="%s" %s>%s', $id, $id, $i, $field->choices[$i]->value, $checked, $field->choices[$i]->title);
			$html .= '</label></div>';
		}

	  	$html .= '</div>';

	  	return $html;
	}

	/**
	 * Render dropdown
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_dropdown($field)
	{
		$id = $this->encode_element_title($field->title);
		$required = ($field->required) ? 'required' : FALSE;

		$html = '<div class="form-group">';
		$html .= $this->make_label($id, $field->title, $required);
	    $html .= sprintf('<select name="%s" id="%s" class="form-control %s">', $id, $id, $required);

	    // Render choices
	    foreach ($field->choices as $choice) {
	    	$checked = $choice->checked ? "selected" : '';
	    	$html .= sprintf('<option value="%s" %s>%s</option>', $choice->value, $checked, $choice->title);
	    }

	  	$html .= '</select></div>';

	  	return $html;
	}

	/**
	 * Section break
	 *
	 * @param object $field
	 * @return string $html
	 * @access private
	 **/
	private function element_section_break($field)
	{
		$html = '<div class="form-group section-break">';
		$html .= sprintf('<hr/><h4>%s</h4><p>%s</p>', $field->title, $field->description);
		$html .= '</div>';

		return $html;
	}

} // End formLoader.php

?>


<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users">Customer Form</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <!--<div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>
    </div>-->
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
     <div class="portlet-header fixed"  align="right"> 
        <?php
         
         $form_data =$custumer_form_list[$skill_id];
       
         $_SESSION['form_data']= $form_data;
        
       // if($skill_id==0){
       //     $skill_id =$edit_id;
      //  }
        // echo $skill_id;
          $_SESSION['skill_id'] =$skill_id;
        if($is_modify){?><a href="javascript:var w=window.open('http://gofavo.com/api/admin/df?skill_id='+<?php echo $skill_id ; ?>+'&edit_id='+<?php echo $edit_id ; ?>, '_blank', 'width=900,height=400, top=100px , left=100px , menubar=no ,titlebar=no,toolbar=no');"   class="edit_inline">Edit Form</a>
            
            <?php }?>

     </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
        
      <div >

      <div id="formBuilder">
          <?php 
          
$loader = new formLoader($form_data, 'submit.php');
$loader->render_form();  
          ?>
          
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
