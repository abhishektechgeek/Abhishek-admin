<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {  

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
 		$this->load->model('newslettermodel');	
		$this->load->model('categorymodel');	
		$this->view_data['is_modify']=$this->adminmodel->is_modify_permission();
 		 $seg = $this->uri->segment(1); 
		 if($seg == 'newsletter'){
 				$this->session->set_userdata(array('menu_id' => 7)); 
	    }
		$accessmenuList = $this->adminmodel->getAccessMenuList();
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');
		/*var_dump($this->session->userdata('menu_id'));die;*/
		
		 if(!in_array($this->session->userdata('menu_id'),$accessmenuList))  
	         redirect(base_url().'home');	
    }
	public function index(){	
	
 		$this-> newsletter();
	}
	
	function  newsletter(){ 
 		$id= $this->session->userdata('adminId');
 		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	
		$this->nocache();
		$this->view_data['newsletter']=$this->newslettermodel->newsletter();
		
		$this->view_data['email_template']=$this->newslettermodel->fatch_email_template();
   		$this->load->view('header',$this->view_data);		
		$this->load->view('newsletter',$this->view_data);
		$this->load->view('footer'); 	
	}	
	
	
	function  send(){ 
 		$id= $this->session->userdata('adminId');
 		/*$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		 if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}	*/
		$this->nocache();
		$status = $this->newslettermodel->newsletter_send();
		if($status){
			  $this->session->set_flashdata('success','Email has been sent successfully');	
			  redirect(base_url().'newsletter');	
			}else{
			   $this->session->set_flashdata('fail','Email has not been sent successfully');		
			  redirect(base_url().'newsletter');
			}
		 
	}	
	
	
	
	public	function nocache()
    {
        $CI =& get_instance();
	    $CI->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $CI->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $CI->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $CI->output->set_header('Pragma: no-cache');
    }
	
	 
	
	
 }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */