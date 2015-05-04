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
		$this->load->library('table');
		$this->load->model('adminmodel');
		$this->load->model('sellermodel');		
		$this->load->model('categorymodel');
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		error_reporting(0);
		 			
    }
	public function index(){	
	 
				
		$this->userlist();
	}
	
	
	
	function userlist(){ 
				
	$action = '';
	$type = 0;
	$action = $this->input->post('usertype');
	$filter = $this->input->post('filter');
	if(isset($action) && $action = 'usertype_filter'){
	   $type = $this->input->post('usertype');
	}
	
	if(isset($filter) && $filter = 'filter'){
	   $like = true;
 	}
	   
    	$id= $this->session->userdata('adminId');
		$this->nocache();
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		$this->view_data['user_type'] = $type;
 		$this->load->library('pagination');
		$config['base_url'] = base_url().'user/userlist'; 
		$config['total_rows'] = $this->adminmodel->userCount($type);
		$config['per_page'] = 10; 
		$config['num_links'] = 10;
		$config['use_page_numbers'] = TRUE;
	    $config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$offset = $this->uri->segment(3, 0);
        $config['uri_segment'] = 3;      // add this line to override the default
   		$this->pagination->initialize($config); 
       	$this->view_data['user_listing']=$this->adminmodel->userlist($offset,$config['per_page'],$type,$like);
     	$this->load->view('header',$this->view_data);		
		$this->load->view('userlist',$this->view_data);
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
	
	function all_user(){
	    if($this->view_data['is_modify'] == false){
		   $this->userlist();
		}
		
 		$ids = $this->input->post('checkbox');
 		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->adminmodel->delete_multiple_user($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been deleted');		
			  redirect(base_url().'user/userlist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'user/userlist');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->adminmodel->approve_multiple_user($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been approved');		
			  redirect(base_url().'user/userlist');	
			}else{
			 $this->session->set_flashdata('fail','This record has not been approved');
			  redirect(base_url().'user/userlist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->adminmodel->unapprove_multiple_user($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been unapproved');		
			  redirect(base_url().'user/userlist');	
			}else{
			   $this->session->set_flashdata('fail','This record has not been unapproved');	
			  redirect(base_url().'user/userlist');
			}
 		}
		redirect(base_url().'user/userlist');
 	}	
	function edit_user(){
	if($this->view_data['is_modify'] == false){
		   $this->userlist();
		}
			$id= $this->session->userdata('adminId');
			$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
			$this->load->view('header',$this->view_data);		
   		    $userId=$this->session->userdata('userId');	
 		    $edit_id=$this->uri->segment(3); 
 		   if($edit_id!=""){			
			 $data['edit_data']=$this->adminmodel->user_data_by_id($edit_id);
 			}	
		$this->nocache();
		$data['page_title']="Edit User";
		$this->load->view('user/edit_user',$data);	
 	     $this->load->view('footer');
	}
	
	
	function save_user(){
	    if($this->view_data['is_modify'] == false){
		   $this->userlist();
		}
		
 		if(isset($_POST['submit'])){
  		$ifAllReadyExists = $this->adminmodel->getUserByEmail($this->input->post('email'));
		
		if($ifAllReadyExists){
		       $this->session->set_flashdata('fail','This email is allready exists');	
			   redirect(base_url().'user/userlist');	
		} 
 			$success = $this->adminmodel->save_user();
			if($success){
 			  $this->session->set_flashdata('success','This record has been updated');	
			   redirect(base_url().'user/userlist');	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been updated');
			   redirect(base_url().'user/userlist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function inactiveuser(){
	       if($this->view_data['is_modify'] == false){
		   $this->userlist();
		   }
		
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->adminmodel->inactiveUser($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been inactivated');		
			   redirect(base_url().'user/userlist');	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been inactivated');
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function activeuser(){
	         if($this->view_data['is_modify'] == false){
		   $this->userlist();
		   }
   		    $edit_id=$this->uri->segment(3); 
 			$success=$this->adminmodel->activeUser($edit_id);
			if($success){
			 
			  $this->session->set_flashdata('success','This record has been activated');	
			   redirect(base_url().'user/userlist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been activated');		
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deleteuser(){
	        if($this->view_data['is_modify'] == false){
		         $this->userlist();
		     }
   		    $edit_id=$this->uri->segment(3); 
 			$success=$this->adminmodel->deleteUser($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');
			   redirect(base_url().'user/userlist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'user/userlist');	
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	function view_userprofile(){
	
	 if($this->view_data['is_modify'] == false){
		   redirect(base_url().'user/userlist');
		    
		}else{
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
			 
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
		 
  		if($edit_id!=""){	
		
			$data['edit_data']=$this->adminmodel->getUserBidList($edit_id);
		    $data['edit_data_skills']=$this->adminmodel->getUserSkillsList($edit_id);
			  
   			 
			}	
			$this->nocache();
		$data['page_title']="View User Profile";
		$this->load->view('view_userprofile',$data);	
 	     $this->load->view('footer');
	}
	 }
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */