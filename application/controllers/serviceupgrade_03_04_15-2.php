<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServiceUpgrade extends CI_Controller {   

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
 		$this->load->model('servicemodel');	
 		$this->load->model('serviceupgrademodel');	
		$this->load->model('categorymodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		
		error_reporting(0);
		//$this->load->model('usermodel');	
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}				
    }
	public function index(){
          
 		$this->ServiceUpgradeList();
	}
        
       
	function ServiceUpgradeList(){
          
          $segment_id=$this->uri->segment(3); 
           echo"id". $service_id=$this->uri->segment(4); 
	        $this->session->set_userdata('service_id', $service_id);
                $this->session->set_userdata('parent_id',$segment_id);
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->serviceupgrademodel->servicelist('',0,20,'id','',$segment_id);
              
		$this->view_data['segment_list']=$this->serviceupgrademodel->getServiceList2();	
		$this->view_data['segment_id']=$this->uri->segment(4); 	
		$this->view_data['service_id']=$this->session->userdata('service_id'); 	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();	
 		$this->load->view('header_category_list',$this->view_data);		
		$this->load->view('serviceupgradelist',$this->view_data);
		$this->load->view('footer'); 	
	}
        
        function ServiceUpgradeListAfterAddEdit(){
          
          $segment_id=$this->session->userdata('parent_id'); 
        echo"sssion".  $service_id=$this->session->userdata('service_id'); 
          
                //$this->session->set_userdata('parent_id',$segment_id);
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->serviceupgrademodel->servicelist('',0,20,'id','',$segment_id);
              
		$this->view_data['segment_list']=$this->serviceupgrademodel->getServiceList2();	
		$this->view_data['segment_id']=$segment_id;	
		$this->view_data['service_id']=$service_id;	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();	
 		$this->load->view('header_category_list',$this->view_data);		
		$this->load->view('serviceupgradelist',$this->view_data);
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
    
    function edit_serviceupgrade(){
	  if($this->view_data['is_modify'] == false){
              // $edit_id=$this->uri->segment(3);
		   $this->ServiceUpgradeList();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header_category_list',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
                  //$data['service']=$this->servicemodel->getServiceList();	
		//$data['segment']=$this->serviceupgrademodel->getSegmentList();
               // echo "<pre>"; print_r($data['segment']);die;
               
              //echo "<pre>"; print_r($data['service']);die;
  		if($edit_id!=""){			
			$data['edit_data']=$this->servicemodel->service_data_by_id($edit_id);
			$data['edit_attr_data']=$this->servicemodel->attribute_data_by_id($edit_id);
			$data['edit_spc_data']=$this->servicemodel->specification_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
			$this->nocache();
		$data['page_title']="Edit service Upgrade";
		$this->load->view('edit_serviceupgrade',$data);	
 	     $this->load->view('footer');
	}
        
        function save_serviceupgrade(){
 	
                   if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
	if(isset($_POST['submit'])){
            
	if (!empty($_FILES['image']['name'])){
 		$config['upload_path'] = './application/uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
	     $this->load->library('resize');
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')){
                 $img = $this->upload->data();
				 $resizeObj = new resize($config['upload_path'].'/'.$img['orig_name']);  
                 // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)  
                 $resizeObj -> resizeImage(150, 100, 'crop');  
                  // *** 3) Save image  
                 $resizeObj -> saveImage($config['upload_path'].'/thumb_'.$img['orig_name'], 100); 
                  $success=$this->servicemodel->save_service($data,$img['orig_name']);
        }else{
               $this->session->set_flashdata('fail','This image can not uploaded');	
			   redirect(base_url().'category/edit_category/'.$this->input->post('id'));
             }
  		}
		else{
               
		$success=$this->serviceupgrademodel->save_serviceupgrade($data,$id);
		}
	
 			if($success){
 			  $this->session->set_flashdata('success','This record has been updated');		
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
			}else{
  			   $this->session->set_flashdata('fail','This record has not been updated');	
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
			}
		}
		 
            }
            
            
            function deleteservice(){
	  if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->serviceupgrademodel->deleteserviceupgrade($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
				 
			}else{
 			    $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
	function all_service(){
	   if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
		$ids = $this->input->post('checkbox');
		 
		$action = $this->input->post('action_all');
		if($action == 'delete_all' && count($ids) > 0){
		   $status = $this->servicemodel->delete_multiple_service($ids);
			if($status){
			   $this->session->set_flashdata('success','This record has been deleted');		
			  redirect(base_url().'serviceupgrade/serviceupgradelist');	
			}else{
			   $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'serviceupgrade/serviceupgradelist');
			}
 		}
		
		if($action == 'approve_all' && count($ids) > 0){
		   $status = $this->servicemodel->approve_multiple_service($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been approved');		
			  redirect(base_url().'serviceupgrade/serviceupgradelist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been approved');
			  redirect(base_url().'serviceupgrade/serviceupgradelist');
			}
 		}
		if($action == 'unapprove_all' && count($ids) > 0){
		   $status = $this->servicemodel->unapprove_multiple_service($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been unapproved');		
			  redirect(base_url().'serviceupgrade/serviceupgradelist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been unapproved');
			  redirect(base_url().'serviceupgrade/serviceupgradelist');
			}
 		}
		redirect(base_url().'serviceupgrade/serviceupgradelist');
 	}	
	
        function activeservice(){
	    if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->servicemodel->activeservice($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has been activated');	
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been activated');	
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
			}
			
  	}
	
	function inactiveservice(){
	      if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->servicemodel->inactiveservice($edit_id);
			if($success){
 			    $this->session->set_flashdata('success','This record has been inactivated');	
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');
			   redirect(base_url().'serviceupgrade/ServiceUpgradeListAfterAddEdit');	
			}
			
  	}
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */