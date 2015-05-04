<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segment extends CI_Controller {  

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
 		$this->load->model('segmentmodel');	
		$this->load->model('categorymodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		
		if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		 
		 
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}				
    }
	public function index(){	
	
 		$this->segmentlist();
	}
	
	function segmentlist(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
		
 		$this->load->view('header',$this->view_data);		
		$this->load->view('segmentlist',$this->view_data);
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
	
	function all_segment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->segmentmodel->delete_multiple_segment($ids);
			if($status){
			    $this->nocache();
				$this->session->set_flashdata('success','This record has been deleted');	
				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}else{
			    $this->nocache();
			    $this->session->set_flashdata('fail','This record has not been deleted');	
			     $this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer');
			}
 		}
		
		if($action == 'approve_all'){
		   $status = $this->segmentmodel->approve_multiple_segment($ids);
			if($status){
			 	
			   $this->nocache();
				 $this->session->set_flashdata('success','This record has been approved');		
				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 	
			}else{
			  $this->session->set_flashdata('fail','This record has not been approved');
			   $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->segmentmodel->unapprove_multiple_segment($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been unapproved');	
			   $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}else{
			  $this->session->set_flashdata('fail','This record has not been unapproved');
			   $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}
 		}
		redirect(base_url().'segment/segmentlist');
 	}	
	
	
	function activesegment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->segmentmodel->activeSegment($edit_id);
			if($success){
 			   
			    $this->nocache();
				$this->session->set_flashdata('success','This record has been activated');	
				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been activated');	
			    $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}
			
  	}
	
	function inactivesegment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->segmentmodel->inactiveSegment($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been inactivated');	
			   $this->nocache();
			 
				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');
			    $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 	
			}
			
  	}
	
	function edit_segment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
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
			$data['edit_data']=$this->segmentmodel->segment_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}
		$this->nocache();		
		$data['page_title']="Edit segment";
		$this->load->view('edit_segment',$data);	
 	     $this->load->view('footer');
	}
	
	function save_segment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
		}
	 
 		if(isset($_POST['submit'])){
		
		if (!empty($_FILES['image']['name'])){
 		$config['upload_path'] = './application/uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		
	 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')){
                 $img = $this->upload->data();
                 $success=$this->segmentmodel->save_segment($img['orig_name']);
        }else{
               $this->session->set_flashdata('fail','This image can not uploaded');		
			   redirect(base_url().'segment/edit_segment/'.$this->input->post('id'));
             }
  		}
		else{
		$success=$this->segmentmodel->save_segment();
		}
			 
			if($success){
 			   $this->session->set_flashdata('success','This record has been updated');	
  				redirect(base_url().'segment/segmentlist');
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been updated');
  				redirect(base_url().'segment/segmentlist');
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deletesegment(){
	if($this->view_data['is_modify'] == false){
		   $this->segmentlist();
		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->segmentmodel->deletesegment($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');	
			    $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
				 
			}else{
 			  $this->session->set_flashdata('fail','This record has not been deleted');	
			   $this->nocache();
 				$this->view_data['skillslist_detail']=$this->segmentmodel->segmentlist('',0,20,'id');
				$this->load->view('header',$this->view_data);		
				$this->load->view('segmentlist',$this->view_data);
				$this->load->view('footer'); 
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */