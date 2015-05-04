<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {  
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
 		$this->load->model('notificationmodel');
		$this->load->model('adminmodel');
		$this->load->model('servicemodel');
  		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
 		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}				
    }
	public function index(){	

 		$this->notificationlist();
	}
	
	function notificationlist(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['notificationlist']=$this->notificationmodel->notificationlist('',0,20,'id');
		 
	 
  		$this->load->view('header',$this->view_data);		
		$this->load->view('notificationlist',$this->view_data);
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
	
	function all_notification(){
	     if($this->view_data['is_modify'] == false){
		    $this->notificationlist();
 		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->notificationmodel->delete_multiple_notification($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been deleted');
			    redirect(base_url().'notification/notificationlist');
			}else{
			    redirect(base_url().'notification/notificationlist');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->notificationmodel->approve_multiple_notification($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been approved');
			 redirect(base_url().'notification/notificationlist');	
			}else{
			$this->session->set_flashdata('fail','This record has not been deleted');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'notification/notificationlist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->notificationmodel->unapprove_multiple_notification($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been unapproved');
			  redirect(base_url().'notification/notificationlist');
			}else{
			$this->session->set_flashdata('fail','This record has not been unapproved');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'notification/notificationlist');
			}
 		}
		redirect(base_url().'notification/notificationlist');
 	}	
	
	
	function activenotification(){
	if($this->view_data['is_modify'] == false){
		    $this->notificationlist();
 		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->notificationmodel->activenotification($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has  been activated');
			    redirect(base_url().'notification/notificationlist'); 	
 			}else{
			$this->session->set_flashdata('fail','This record has not been activated');
 			 redirect(base_url().'notification/notificationlist');
			}
			
  	}
	
	function inactivenotification(){
	    if($this->view_data['is_modify'] == false){
		    $this->notificationlist();
 		}
  		    $edit_id=$this->uri->segment(4);  
 			$success=$this->notificationmodel->inactivenotification($edit_id);
			if($success){
			  $this->session->set_flashdata('success','This record has  been inactivated');
 			  redirect(base_url().'notification/notificationlist');
 			}else{
			$this->session->set_flashdata('fail','This record has not  been inactivated');
 			   redirect(base_url().'notification/notificationlist');
			}
			
  	}
	
 	
	 
	function deletenotification(){
	      if($this->view_data['is_modify'] == false){
		    $this->notificationlist();
 		}
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->notificationmodel->deletenotification($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has  been deleted');	
			    redirect(base_url().'notification/notificationlist');
				 
			}else{
 			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'notification/notificationlist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */