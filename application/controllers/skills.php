<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skills extends CI_Controller {  

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
		$this->load->model('skillsmodel');		
		$this->load->model('categorymodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		error_reporting(0);
		//$this->load->model('usermodel');				
    }
	public function index(){	
	 
			if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 
		$this->skillslist();
	}
	
	function skillslist(){
	
		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->view_data['skillslist_detail']=$this->skillsmodel->skillslist('',0,20,'id');
		$this->load->view('header',$this->view_data);		
		$this->load->view('skillslist',$this->view_data);
		$this->load->view('footer'); 	
	}	
	
	
	function all_skills(){
	  if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->skillsmodel->delete_multiple_skills($ids);
			if($status){
			  $this->session->set_flashdata('success',TRUE);	
			  redirect(base_url().'skills/skillslist');	
			}else{
			  $this->session->set_flashdata('fail',TRUE);	
			  redirect(base_url().'skills/skillslist');
			}
 		}
		redirect(base_url().'skills/skillslist');
 	}	
	
	
	function activeskills(){
	    if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
  		    $edit_id=$this->uri->segment(4);  
 			$success=$this->adminmodel->activeUser($edit_id);
			if($success){
 			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
 			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
			
  	}
	
	function inactiveskills(){
	       if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
  		     $edit_id=$this->uri->segment(4); 
 			$success=$this->adminmodel->activeUser($edit_id);
			if($success){
 			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'user/userlist');	
 			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'user/userlist');	
			}
			
  	}
	
	
	function edit_skills(){
	 if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);		
 		 $userId=$this->session->userdata('userId');	
 		$edit_id=$this->uri->segment(4);
		
		   
		
		if($edit_id!=""){			
			$data['edit_data']=$this->skillsmodel->skills_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
		$data['page_title']="Edit Skills";
		$this->load->view('edit_skills',$data);	
 	     $this->load->view('footer');
	}
	
	function save_skills(){
	 if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
 		if(isset($_POST['submit'])){
		
		$config['upload_path'] = './application/uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
        $data = array();
		if ($this->upload->do_upload('image')){
			$data = array('upload_data' => $this->upload->data());
  		}else{
		   $data['upload_data']['file_name'] = '';
		}
		
   			$success=$this->skillsmodel->save_skills($data);
			 
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'skills/skillslist');	
				 
			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'skills/skillslist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deleteskills(){
	if($this->view_data['is_modify'] == false){
		    $this->skillslist();
		}
  		    $edit_id=$this->uri->segment(4); 
 			$success=$this->skillsmodel->deleteSkills($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'skills/skillslist');	
				 
			}else{
 			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'skills/skillslist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */