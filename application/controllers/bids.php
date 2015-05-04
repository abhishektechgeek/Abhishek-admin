<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bids extends CI_Controller {  
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
 		$this->load->model('bidsmodel');
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
	
 		$this->bidslist();
	}
	
	function bidslist(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['bidslist']=$this->bidsmodel->bidslist('',0,20,'id');
		 
	 
  		$this->load->view('header',$this->view_data);		
		$this->load->view('bidslist',$this->view_data);
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
	
	function all_bids(){
	     if($this->view_data['is_modify'] == false){
		    $this->bidslist();
 		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->bidsmodel->delete_multiple_bids($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been deleted');
			    redirect(base_url().'bids/bidslist');
			}else{
			    redirect(base_url().'bids/bidslist');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->bidsmodel->approve_multiple_bids($ids);
			if($status){
			$this->session->set_flashdata('success','This record has been approved');
			 redirect(base_url().'bids/bidslist');	
			}else{
			$this->session->set_flashdata('fail','This record has not been deleted');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'bids/bidslist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->bidsmodel->unapprove_multiple_bids($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been unapproved');
			  redirect(base_url().'bids/bidslist');
			}else{
			$this->session->set_flashdata('fail','This record has not been unapproved');
			  $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'bids/bidslist');
			}
 		}
		redirect(base_url().'bids/bidslist');
 	}	
	
	
	function activebids(){
	if($this->view_data['is_modify'] == false){
		    $this->bidslist();
 		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->bidsmodel->activebids($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has  been activated');
			    redirect(base_url().'bids/bidslist'); 	
 			}else{
			$this->session->set_flashdata('fail','This record has not been activated');
 			 redirect(base_url().'bids/bidslist');
			}
			
  	}
	
	function inactivebids(){
	    if($this->view_data['is_modify'] == false){
		    $this->bidslist();
 		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->bidsmodel->inactivebids($edit_id);
			if($success){
			  $this->session->set_flashdata('success','This record has  been inactivated');
 			  redirect(base_url().'bids/bidslist');
 			}else{
			$this->session->set_flashdata('fail','This record has not  been inactivated');
 			   redirect(base_url().'bids/bidslist');
			}
			
  	}
	
	function edit_bids(){
	    if($this->view_data['is_modify'] == false){
		    $this->bidslist();
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
			$data['edit_data']=$this->bidsmodel->bids_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}
		$this->nocache();		
		$data['page_title']="Edit bids";
		$this->load->view('edit_bids',$data);	
 	     $this->load->view('footer');
	}
	
	function save_bids(){
	  if($this->view_data['is_modify'] == false){
		    $this->bidslist();
 		}
  		if(isset($_POST['submit'])){
 		  
		$success=$this->bidsmodel->save_bids();
		 
 			if($success){
			  $this->session->set_flashdata('success','This record has  been saved');
 			   $this->nocache();
 				redirect(base_url().'bids/bidslist');
				 
			}else{
			 $this->session->set_flashdata('fail','This record has  not been saved');
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'bids/bidslist');
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deletebids(){
	      if($this->view_data['is_modify'] == false){
		    $this->bidslist();
 		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->bidsmodel->deletebids($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has  been deleted');	
			    redirect(base_url().'bids/bidslist');
				 
			}else{
 			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'bids/bidslist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function view_bids(){
				$edit_id=$this->uri->segment(3);  
  				if($edit_id!=""){			
			        $data['edit_data']=$this->bidsmodel->fatch_bids_data($edit_id);
					$data['edit_notification_data']=$this->bidsmodel->fatch_notification_bids_data($edit_id);
					$data['edit_resonse_data']=$this->bidsmodel->fatch_response_bids_data($edit_id);
 			    }	
				 
		        $this->load->view('header');	
				$data['page_title']="View bids";
				$this->load->view('view_bids',$data);	
				$this->load->view('footer');
   	}
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */