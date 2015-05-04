<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {  

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
		$this->load->model('sellermodel');		
		$this->load->model('categorymodel');	
		//$this->load->model('usermodel');				
    }
	public function index(){	
	 
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}		
		$this->userlist();
	}
	
	function userlist(){
	if ($this->session->userdata('adminId')){
				$id= $this->session->userdata('adminId');
				$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
				$this->load->view('header',$this->view_data);		
				$this->load->view('home');
				$this->load->view('footer');				
			
  		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		
		

		$per_page=10;
		$start_row=$this->uri->segment(4);
		if(!$start_row){
			$start_row=0;
		}
		$order_field=$this->uri->segment(2);
		if(!$order_field){
			$order_field='email';
		}
		$order_seq=$this->uri->segment(3);
		
		
		 
		if(!$order_seq){
			$order_seq='asc';
		}
		$userlist_listing = $this->adminmodel->userlist('count');
		 
		$config['base_url'] = base_url().'user/'.$order_field."/".$order_seq;
		$config['total_rows'] = $userlist_listing;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 4;
		$config['first_link'] = '';
		$config['last_link'] = '';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['full_tag_open'] = '
<div class="pagin-bar">';
  $config['full_tag_close'] = '</div>
';
		$config['cur_tag_open'] = '
<div class="page-wrap active" style="margin-right:2px;">';
  $config['cur_tag_close'] = '</div>
';
		$config['next_tag_open'] = '
<div class="pages-flip-btn link-next">';
  $config['next_tag_close'] = '</div>
';
		$config['prev_tag_open'] = '
<div class="pages-flip-btn link-next">';
  $config['prev_tag_close'] = '</div>
';
		$config['num_tag_open'] = '
<div class="page-wrap page1" style="margin-right:2px;">';
  $config['num_tag_close'] = '</div>
';
		
		
		$this->view_data['pagination']=$this->pagination->initialize($config);
		$this->view_data['pagination']=$this->pagination->create_links();
		$this->view_data['user_listing']=$this->adminmodel->userlist('pagewise',$start_row,$per_page,$order_field,$order_seq);
		
		 
 		$this->load->view('header',$this->view_data);		
		$this->load->view('userlist',$this->view_data);
		$this->load->view('footer'); 	
		
		} else {	
				redirect(base_url().'signin');
		}
	}
	
	
	function edit_user(){
	$id= $this->session->userdata('adminId');
	$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		$this->load->view('header',$this->view_data);		
		 
		
	   	
		$userId=$this->session->userdata('userId');	
		
		  $edit_id=$this->uri->segment(4); 
		
		if($edit_id!=""){			
			$data['edit_data']=$this->adminmodel->user_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
		$data['page_title']="Edit User";
		$this->load->view('user/edit_user',$data);	
 	     $this->load->view('footer');
	}
	
	
	function save_user(){
	 
 		if(isset($_POST['submit'])){
 			$success=$this->adminmodel->save_user();
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
				 
			}else{
			echo "f";die;
			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function inactiveuser(){
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->adminmodel->inactiveUser($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
 			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function activeuser(){
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->adminmodel->activeUser($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
				 
			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deleteuser(){
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->adminmodel->deleteUser($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
				 
			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	 
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */