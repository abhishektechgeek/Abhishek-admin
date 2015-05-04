<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {   

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
	
 		$this->servicelist();
	}
        
       
	function servicelist(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->servicemodel->servicelist('',0,20,'id');
              
		$this->view_data['segment_list']=$this->servicemodel->getSegmentList();	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();
                 $serviceType =array('1'=>'HOURLY','2'=>'Fixed Price');
		$this->view_data['serviceType']=$serviceType;
 		$this->load->view('header',$this->view_data);		
		$this->load->view('servicelist',$this->view_data);
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
			  redirect(base_url().'service/servicelist');	
			}else{
			   $this->session->set_flashdata('fail','This record has not been deleted');	
			  redirect(base_url().'service/servicelist');
			}
 		}
		
		if($action == 'approve_all' && count($ids) > 0){
		   $status = $this->servicemodel->approve_multiple_service($ids);
			if($status){
			 $this->session->set_flashdata('success','This record has been approved');		
			  redirect(base_url().'service/servicelist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been approved');
			  redirect(base_url().'service/servicelist');
			}
 		}
		if($action == 'unapprove_all' && count($ids) > 0){
		   $status = $this->servicemodel->unapprove_multiple_service($ids);
			if($status){
			  $this->session->set_flashdata('success','This record has been unapproved');		
			  redirect(base_url().'service/servicelist');	
			}else{
			  $this->session->set_flashdata('fail','This record has not been unapproved');
			  redirect(base_url().'service/servicelist');
			}
 		}
		redirect(base_url().'service/servicelist');
 	}	
	
	
	function activeservice(){
	    if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
  		   $edit_id=$this->uri->segment(3); 
 			$success=$this->servicemodel->activeservice($edit_id);
			if($success){
 			  $this->session->set_flashdata('success','This record has been activated');	
			   redirect(base_url().'service/servicelist');	
 			}else{
 			    $this->session->set_flashdata('fail','This record has not been activated');	
			   redirect(base_url().'service/servicelist');	
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
			   redirect(base_url().'service/servicelist');	
 			}else{
 			   $this->session->set_flashdata('fail','This record has not been inactivated');
			   redirect(base_url().'service/servicelist');	
			}
			
  	}
	
	function edit_service(){
	  if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
                  //$data['service']=$this->servicemodel->getServiceList();
                 $data['segment']=$this->servicemodel->getSegmentList();
                $serviceType =array('1'=>'HOURLY','2'=>'Fixed Price');
		$data['serviceType']=$serviceType;
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
		$data['page_title']="Edit service";
		$this->load->view('edit_service',$data);	
 	     $this->load->view('footer');
	}
	
	
	function view_service(){
	 if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
                 $serviceType =array('1'=>'HOURLY','2'=>'Fixed Price');
		$data['serviceType']=$serviceType;
		$data['segment']=$this->servicemodel->getSegmentList();
  		if($edit_id!=""){			
			$data['edit_data']=$this->servicemodel->service_data_by_id($edit_id);
			$data['edit_attr_data']=$this->servicemodel->attribute_data_by_id($edit_id);
			$data['edit_spc_data']=$this->servicemodel->specification_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
			$this->nocache();
		$data['page_title']="View service";
		$this->load->view('view_service',$data);	
 	     $this->load->view('footer');
	}
	
	function save_service(){
           
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
               
		$success=$this->servicemodel->save_service($data);
		}
	
 			if($success){
 			  $this->session->set_flashdata('success','This record has been updated');		
			   redirect(base_url().'service/servicelist');	
			}else{
  			   $this->session->set_flashdata('fail','This record has not been updated');	
			   redirect(base_url().'service/servicelist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
	function deleteservice(){
	  if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		}
  		    $edit_id=$this->uri->segment(3); 
 			$success=$this->servicemodel->deleteservice($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');
			   redirect(base_url().'service/servicelist');	
				 
			}else{
 			    $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'service/servicelist');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
	// For subservices
         function subservices(){
            $this->subservices_list();
        }
	
        
        
	function subservices_list(){
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->servicemodel->servicelist('',0,20,'id');
              $edit_id=$this->uri->segment(3);
              /* Commented on 31st JAN */
              $this->view_data['edit_data']=$this->servicemodel->sub_service_data_by_id($edit_id);
             
		$this->view_data['segment_list']=$this->servicemodel->getSegmentList();	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();	
 		$this->load->view('header',$this->view_data);		
		$this->load->view('subservices',$this->view_data);
		$this->load->view('footer'); 	
	}	
        
        
        
        function view_subservices(){
	 if($this->view_data['is_modify'] == false){
		   $this->subservices_list();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
		$data['segment']=$this->servicemodel->getSegmentList();
  		if($edit_id!=""){			
			$data['edit_data']=$this->servicemodel->sub_service_data_by_id($edit_id);
			$data['edit_attr_data']=$this->servicemodel->attribute_data_by_id($edit_id);
			$data['edit_spc_data']=$this->servicemodel->specification_data_by_id($edit_id);
			
			 
 			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
			$this->nocache();
		$data['page_title']="View service";
		$this->load->view('view_subservices',$data);	
 	     $this->load->view('footer');
	}
        
        
        function edit_subservices(){
	  if($this->view_data['is_modify'] == false){
		   $this->subservices_list();
		}
	     $id= $this->session->userdata('adminId');
  		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		 $this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 $this->load->view('header',$this->view_data);	
  		 $userId=$this->session->userdata('userId');	
 		 $edit_id=$this->uri->segment(3);
                  //$data['service']=$this->servicemodel->getServiceList();	
		$data['segment']=$this->servicemodel->getSegmentList();
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
		$data['page_title']="Edit service";
		$this->load->view('edit_subservices',$data);	
 	     $this->load->view('footer');
	}
	
        function delete_subservice(){
	  if($this->view_data['is_modify'] == false){
		   $this->servicelist();
		} 
  		    $edit_id=$this->uri->segment(3);
 			$success=$this->servicemodel->delete_subservice($edit_id);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');
			   redirect(base_url().'service/subservices');	
				 
			}else{
 			    $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'service/subservices');
			}
		 
				//$this->load->view('seller/edit_seller',$data);	
  	}
	
        
	function save_subservice(){
	 if($this->view_data['is_modify'] == false){
		   $this->subservices_list();
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
                  $success=$this->servicemodel->save_subservice($data,$img['orig_name']);
        }else{
               $this->session->set_flashdata('fail','This image can not uploaded');	
			   redirect(base_url().'category/edit_category/'.$this->input->post('id'));
             }
  		}
		else{
                    
		$success=$this->servicemodel->save_subservice($data);
		}
	
 			if($success){
 			  $this->session->set_flashdata('success','This record has been updated');		
			   redirect(base_url().'service/subservices');	
			}else{
  			   $this->session->set_flashdata('fail','This record has been updated');	
			   redirect(base_url().'service/subservices');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
        
        function service_upgrade(){
 	/*	
            $id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->servicemodel->servicelist('',0,20,'id');
              
		$this->view_data['segment_list']=$this->servicemodel->getSegmentList();	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();	
 		$this->load->view('header',$this->view_data);		
		$this->load->view('servicelist',$this->view_data);
		$this->load->view('footer'); 	
         * 
         */
             
             $id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['skillslist_detail']=$this->servicemodel->servicelist('',0,20,'id');
              
		$this->view_data['segment_list']=$this->servicemodel->getSegmentList();	
                //$this->view_data['service_list']=$this->servicemodel->getServiceList();	
 		$this->load->view('header',$this->view_data);	
		  $this->load->view('service_upgrade',$this->view_data);
                  $this->load->view('footer'); 	

                    if (isset($_POST['submit_val'])) {

                    if ($_POST['dynfields']) {
                    $serviceId ='103';
                    $data = array();
                    foreach ( $_POST['dynfields'] as $key=>$value ) {

                    $values = mysql_real_escape_string($value);
                    //echo "INSERT INTO my_hobbies (hobbies) VALUES ('$values')"."</br>" ;
                    $val= array('parent_id'=>$serviceId , 'description'=>$values);
                    array_push($data,$val);

                    }
                    
                    }
                  
                    
                    $success=$this->servicemodel->save_service_upgrade($data ,$serviceId);
			if($success){
			 
			   $this->session->set_flashdata('success','This record has been deleted');
			   redirect(base_url().'service/servicelist');	
				 
			}else{
 			    $this->session->set_flashdata('fail','This record has not been deleted');
			   redirect(base_url().'service/servicelist');	
			}
		 
            }
	}
        
        function serviceImageUpdate(){
              $id = $this->input->post('service_id');  
              echo $id; die("wdfer");
            
           $path = "./application/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
 
 $ext="png";
 $actual_image_name =$name.".".$ext;

$tmp = $_FILES['photoimg']['tmp_name'];


if(move_uploaded_file($tmp,$path.$actual_image_name)){
    $this->servicemodel->updateServiceImage($actual_image_name);
}
        }
	
 }
        }
        
}

}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */