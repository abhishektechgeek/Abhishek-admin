<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Response extends CI_Controller {  
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
 		$this->load->model('responsemodel');
		$this->load->model('adminmodel');
		$this->load->model('servicemodel');
		error_reporting(0);
 		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
 		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}				
    }
	public function index(){	
 
 		$this->responselist();
	}
	
	function responselist(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['responselist']=$this->responsemodel->responselist('',0,20,'id');
   		$this->load->view('header',$this->view_data);		
		$this->load->view('responselist',$this->view_data);
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
	
	function all_response(){
	     if($this->view_data['is_modify'] == false){
		    $this->responselist();
 		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->responsemodel->delete_multiple_response($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been deleted');
			    redirect(base_url().'response/responselist');
			}else{
			    redirect(base_url().'response/responselist');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->responsemodel->approve_multiple_response($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been approved');
			 redirect(base_url().'response/responselist');	
			}else{
			$this->session->set_flashdata('fail','This record has not been deleted');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'response/responselist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->responsemodel->unapprove_multiple_response($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been unapproved');
			  redirect(base_url().'response/responselist');
			}else{
			$this->session->set_flashdata('fail','This record has not been unapproved');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'response/responselist');
			}
 		}
		redirect(base_url().'response/responselist');
 	}	
	
	
	function activeresponse(){
	if($this->view_data['is_modify'] == false){
		    $this->responselist();
 		}
  		   $edit_id=$this->uri->segment(4); 
 			$success=$this->responsemodel->activeresponse($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has  been activated');
			    redirect(base_url().'response/responselist'); 	
 			}else{
			$this->session->set_flashdata('fail','This record has not been activated');
 			 redirect(base_url().'response/responselist');
			}
			
  	}
	
	function inactiveresponse(){
	    if($this->view_data['is_modify'] == false){
		    $this->responselist();
 		}
  		    $edit_id=$this->uri->segment(4);  
 			$success=$this->responsemodel->inactiveresponse($edit_id);
			if($success){
			  $this->session->set_flashdata('success','This record has  been inactivated');
 			  redirect(base_url().'response/responselist');
 			}else{
			$this->session->set_flashdata('fail','This record has not  been inactivated');
 			   redirect(base_url().'response/responselist');
			}
			
  	}
	
 	
	 
	function deleteresponse(){
	      if($this->view_data['is_modify'] == false){
		    $this->responselist();
 		}
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->responsemodel->deleteresponse($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has  been deleted');	
			    redirect(base_url().'response/responselist');
				 
			}else{
 			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'response/responselist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */