<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {  
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
		$this->load->library('MY_Output');
 		$this->load->model('adminmodel');
 		$this->load->model('groupmodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
 		//$this->load->model('usermodel');				
    }
	public function index(){	
	
			if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 
		$this->grouplist();
	}
	
	function grouplist(){
	
		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->groupmodel->grouplist('',0,20,'id');
		$this->load->view('header',$this->view_data);		
		$this->load->view('grouplist',$this->view_data);
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
	
	
	function all_group(){
	if($this->view_data['is_modify'] == false){
		    $this->grouplist();
 		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->groupmodel->delete_multiple_group($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been deleted');	
			  redirect(base_url().'group/grouplist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'group/grouplist');
			}
 		}
		if($action == 'approve_all'){
		   $status = $this->groupmodel->approve_multiple_group($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been approved');	
			  redirect(base_url().'group/grouplist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been approved');	
			  redirect(base_url().'group/grouplist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->groupmodel->unapprove_multiple_group($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been unapproved');	
			  redirect(base_url().'group/grouplist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been unapproved');	
			  redirect(base_url().'group/grouplist');
			}
 		}
		redirect(base_url().'group/grouplist');
 	}	
	
	
	function activegroup(){
	     if($this->view_data['is_modify'] == false){
		    $this->grouplist();
 		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->groupmodel->activegroup($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been activated');	
			   redirect(base_url().'group/grouplist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been activated');	
			   redirect(base_url().'group/grouplist');	
			}
			
  	}
	
	function inactivegroup(){
	   if($this->view_data['is_modify'] == false){
		    $this->grouplist();
 		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->groupmodel->inactivegroup($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been inactivated');	
			   redirect(base_url().'group/grouplist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');	
			   redirect(base_url().'group/grouplist');	
			}
			
  	}
	
	
	function edit_group(){
	if($this->view_data['is_modify'] == false){
		    $this->grouplist();
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
			$data['edit_data']=$this->groupmodel->group_data_by_id($edit_id);
 			}	
		 $this->nocache();
		$data['page_title']="Edit group";
		$this->load->view('edit_group',$data);	
 	     $this->load->view('footer');
	}
	
	function save_group(){
	 if($this->view_data['is_modify'] == false){
		    $this->grouplist();
 		}
	 
 		if(isset($_POST['submit'])){
  		$success=$this->groupmodel->save_group();
  		if($success){
			 
			   $this->session->set_flashdata('success','This record has been updated');	
			   redirect(base_url().'group/grouplist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been updated');	
			   redirect(base_url().'group/grouplist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deletegroup(){
	if($this->view_data['is_modify'] == false){
		    $this->grouplist();
 		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->groupmodel->deletegroup($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been deleted');	
			   redirect(base_url().'group/grouplist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been deleted');	
			   redirect(base_url().'group/grouplist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */