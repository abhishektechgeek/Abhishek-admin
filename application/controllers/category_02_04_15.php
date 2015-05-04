<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {  
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
 		$this->load->model('categorymodel');	
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
		 
		$this->categorylist();
	}
	
	function categorylist(){
	
		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->categorymodel->categorylist('',0,20,'id');
		$this->load->view('header',$this->view_data);		
		$this->load->view('categorylist',$this->view_data);
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
	
	
	function all_category(){
	if($this->view_data['is_modify'] == false){
		$this->categorylist();
		}
		$ids = $this->input->post('checkbox');
		$action = $this->input->post('action_all');
		if($action == 'delete_all'){
		   $status = $this->categorymodel->delete_multiple_category($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been deleted');	
			  redirect(base_url().'category/categorylist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'category/categorylist');
			}
 		}
		if($action == 'approve_all'){
		   $status = $this->categorymodel->approve_multiple_category($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been approved');	
			  redirect(base_url().'category/categorylist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been approved');	
			  redirect(base_url().'category/categorylist');
			}
 		}
		if($action == 'unapprove_all'){
		   $status = $this->categorymodel->unapprove_multiple_category($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been unapproved');	
			  redirect(base_url().'category/categorylist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been unapproved');	
			  redirect(base_url().'category/categorylist');
			}
 		}
		redirect(base_url().'category/categorylist');
 	}	
	
	
	function activecategory(){
	if($this->view_data['is_modify'] == false){
		$this->categorylist();
		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->categorymodel->activeCategory($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been activated');	
			   redirect(base_url().'category/categorylist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been activated');	
			   redirect(base_url().'category/categorylist');	
			}
			
  	}
	
	function inactivecategory(){
	if($this->view_data['is_modify'] == false){
		$this->categorylist();
		}
  		    $edit_id=$this->uri->segment(3);  
 			$success=$this->categorymodel->inactiveCategory($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been inactivated');	
			   redirect(base_url().'category/categorylist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');	
			   redirect(base_url().'category/categorylist');	
			}
			
  	}
	
	
	function edit_category(){
	if($this->view_data['is_modify'] == false){
		$this->categorylist();
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
			$data['edit_data']=$this->categorymodel->category_data_by_id($edit_id);
			
				
			}	
		 $this->nocache();
		$data['page_title']="Edit Category";
		$this->load->view('edit_category',$data);	
 	     $this->load->view('footer');
	}
	
	function save_category(){
	 error_reporting(0);
	 if($this->view_data['is_modify'] == false){
		$this->categorylist();
		}
 		if(isset($_POST['submit'])){
		
		if (!empty($_FILES['image']['name'])){
 		$config['upload_path'] = './application/uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
	 
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')){
                 $img = $this->upload->data();
                 
                  $this->load->library('image_lib');
                  $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $img['full_path'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $img['file_path'].'thumb_'.$img['file_name'],
                    'width'         => 85,
                    'height'        => 85
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);
                 if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    echo $this->image_lib->display_errors();
                }
                 $success=$this->categorymodel->save_category($data,$img['orig_name']);
        }else{
               $this->session->set_flashdata('fail','This image can not uploaded');	
			   redirect(base_url().'category/edit_category/'.$this->input->post('id'));
             }
  		}
		else{
		$success=$this->categorymodel->save_category();
		}
	
	
		if($success){
			 
			   $this->session->set_flashdata('success','This record has been updated');	
			   redirect(base_url().'category/categorylist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been updated');	
			   redirect(base_url().'category/categorylist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deletecategory(){
	if($this->view_data['is_modify'] == false){
		$this->categorylist();
		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->categorymodel->deletecategory($edit_id);
			if($success){
 			   $this->session->set_flashdata('success','This record has been deleted');	
			   redirect(base_url().'category/categorylist');	
				 
			}else{
 			   $this->session->set_flashdata('fail','This record has not been deleted');	
			   redirect(base_url().'category/categorylist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */