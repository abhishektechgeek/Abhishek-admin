<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

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
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('adminmodel');
		$this->load->library('session');
		$this->load->library('form_validation');			
    }
	 
	public function index()
	{		
		$this->load->view('index');
	}
	
	
	public function forgetpassword()
	{		
  		if ($this->session->userdata('adminId')){					
			redirect(base_url().'home/');		
		} else {
			 
		 if($_POST){	
		 $email = $this->input->post('email');	
			$success=$this->adminmodel->forgetpassword($email);
			if($success==true){
			    $this->session->set_flashdata('success',TRUE);	
  				redirect(base_url().'signin/forgetpassword');		
			}else{
 				$this->session->set_flashdata('error',TRUE);	
				redirect(base_url().'signin/forgetpassword');	
			}			
		}else{			
			$this->load->view('forgetpassword');
			}
 		}			
 		
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */