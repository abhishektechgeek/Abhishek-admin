<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serviceplan extends CI_Controller {   


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index 
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/
<method_name>
* @see http://codeigniter.com/user_guide/general/urls.html
	 */ 
	 
	 function __construct()
    {
        // Call the Model constructor
	 
         parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	 
		$this->load->model('adminmodel');
 		$this->load->model('serviceplanmodel');	
		$this->load->model('categorymodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
	/*	echo $this->session->userdata('menu_id');
		print_r($accessmenuList);die;*/
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		error_reporting(0);
		 
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}				
    }
	public function index(){	
	
 		$this->serviceplanlist();
	}
	
	function serviceplanlist(){
 
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		$this->nocache();
 		$this->view_data['skillslist_detail']=$this->serviceplanmodel->serviceplanlist('',0,20,'id');
  		$this->load->view('header',$this->view_data);		
		$this->load->view('serviceplanlist',$this->view_data);
		$this->load->view('footer'); 	
	}	
	
	public	function nocache()
    {
        $CI =& get_instance();
	    $CI->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $CI->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $CI->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $CI->output->set_header('Pragma: no-cache');
    }
	
	function all_serviceplan(){
           
	  if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	 if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->serviceplanmodel->delete_multiple_serviceplan($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been deleted');	
			  redirect(base_url().'serviceplan/serviceplanlist');	
			}else{
			   $this->session->set_flashdata('fail','This record has not been deleted');		
			  redirect(base_url().'serviceplan/serviceplanlist');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->serviceplanmodel->approve_multiple_serviceplan($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been approved');		
			  redirect(base_url().'serviceplan/serviceplanlist');	
			}else{
			 $this->session->set_flashdata('fail','This record has not been approved');	
			  redirect(base_url().'serviceplan/serviceplanlist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->serviceplanmodel->unapprove_multiple_serviceplan($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been unapproved');		
			  redirect(base_url().'serviceplan/serviceplanlist');	
			}else{
			   $this->session->set_flashdata('fail','This record has not been unapproved');	
			  redirect(base_url().'serviceplan/serviceplanlist');
			}
 		}
		redirect(base_url().'serviceplan/serviceplanlist');
 	}	
	
	
	function activeserviceplan(){
            
	 if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	  if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->serviceplanmodel->activeserviceplan($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has been activated');		
			   redirect(base_url().'serviceplan/serviceplanlist');	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been activated');		
			   redirect(base_url().'serviceplan/serviceplanlist');	
			}
			
  	}
	
	function inactiveserviceplan(){
	  if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	 if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->serviceplanmodel->inactiveserviceplan($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been inactivated');	
			   redirect(base_url().'serviceplan/serviceplanlist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');
			   redirect(base_url().'serviceplan/serviceplanlist');	
			}
			
  	}
	
	function edit_serviceplan(){
	  if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	 if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
		
  		if($edit_id!=""){			
			$data['edit_data']=$this->serviceplanmodel->serviceplan_data_by_id($edit_id);
  			}	
			
		$this->nocache();
		$data['page_title']="Edit serviceplan";
		$this->load->view('edit_serviceplan',$data);	
 	     $this->load->view('footer');
	}
	
	function save_serviceplan(){
	  if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	 if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
	 
                if(isset($_POST['submit'])){
		
		if (!empty($_FILES['image']['name'])){
 		$config['upload_path'] = './application/uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
	 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')){
                 $img = $this->upload->data();
                 $success=$this->serviceplanmodel->save_serviceplan($data,$img['orig_name']);
        }else{
               $this->session->set_flashdata('fail','This image can not uploaded');	
			   redirect(base_url().'serviceplan/edit_serviceplan/'.$this->input->post('id'));
             }
  		}
		else{
		$success=$this->serviceplanmodel->save_serviceplan($data);
		}
	
	
		if($success){
			 
			   $this->session->set_flashdata('success','This record has been updated');	
			   redirect(base_url().'serviceplan/serviceplanlist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been updated');	
			   redirect(base_url().'serviceplan/serviceplanlist');	
			}
		} 
        }
	/*if(isset($_POST['submit'])){
		$success=$this->serviceplanmodel->save_serviceplan();
			if($success){
 			   $this->session->set_flashdata('success','This record has been updated');	
			   redirect(base_url().'serviceplan/serviceplanlist');	
			}else{
			 
 			   $this->session->set_flashdata('fail','This record has not been updated');
			   redirect(base_url().'serviceplan/serviceplanlist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}*/
	function deleteserviceplan(){
	 if($this->view_data['is_modify'] == false){
		  $this->serviceplanlist();
 		}
	 if($this->view_data['is_modify'] == false){
		redirect(base_url().'serviceplan/serviceplanlist');
 		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->serviceplanmodel->deleteserviceplan($edit_id);
			if($success){
			 
			    $this->session->set_flashdata('success','This record has been deleted');	
			   redirect(base_url().'serviceplan/serviceplanlist');	
				 
			}else{
 			    $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'serviceplan/serviceplanlist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */