<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
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
		if ($this->session->userdata('adminId')){
				$id= $this->session->userdata('adminId');
				$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
				$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
				$this->view_data['top_bids']=$this->adminmodel->fatch_top_bids();
				$this->view_data['top_users']=$this->adminmodel->fatch_top_users();
                                $this->view_data['total_users']=$this->adminmodel->fetch_total_users();
                                $this->view_data['total_users']=$this->adminmodel->fetch_total_users();
                                $this->view_data['total_sales']=$this->adminmodel->fetch_total_sales();
				$this->load->view('admin_layout',$this->view_data);	
				$this->load->view('home');
				$this->load->view('admin_footer');				
			} else {	
				$this->signin();
		}
	}
	function signin(){	
          
           			
		if ($this->session->userdata('adminId')){					
			$this->homepage(); 		
                        
		} else { 
			$username=$this->input->post('username'); 
			$password=$this->input->post('password');
			$remember=$this->input->post('password');
			if($remember){$remember = true;}else{$remember = false;}
			
			
			if ($result=$this->adminmodel->adminsignin($username,$password,$remember)){ 	
				
	
                            $this->homepage();
				}else {
 				$this->session->set_flashdata('login_error',TRUE);								
				$this->load->view('index');	
			}			
		}					
	}
	function homepage(){ 
		
		$id= $this->session->userdata('adminId');
		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		$this->view_data['top_bids']=$this->adminmodel->fatch_top_bids();
		$this->view_data['top_users']=$this->adminmodel->fatch_top_users();
                $this->view_data['total_users']=$this->adminmodel->fetch_total_users();
  		$this->load->view('admin_layout',$this->view_data);	
		redirect(base_url().'index.php/home');	
		$this->load->view('admin_footer');
	}
        
        
        function users(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_users');
		$this->load->view('admin_footer');
	}
        function con_proterm(){ 
		
                $id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_proterm');
		$this->load->view('admin_footer');
	}
        
        
         function con_countries(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_countries');
		$this->load->view('admin_footer');
	}
        
          function con_termofuse(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_termofuse');
		$this->load->view('admin_footer');
	}
        
         function con_privacy(){ 
		
		//$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_privacy');
		$this->load->view('admin_footer');
	}
        
        
         function pro_snapshot(){ 
		
		//$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('pro_snapshot');
		$this->load->view('admin_footer');
	}
        
         function favo_status(){ 
		
		//$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('favo_status');
		$this->load->view('admin_footer');
	}
        
         function con_help(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_help');
		$this->load->view('admin_footer');
	}
        
        function con_pricing(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_pricing');
		$this->load->view('admin_footer');
	}
        
        function con_prostatus(){ 
		
		$id= $this->session->userdata('adminId');
  		$this->load->view('admin_layout');	
		$this->load->view('con_prostatus');
		$this->load->view('admin_footer');
	}
        
	function logout(){
 		$this->session->unset_userdata(array('adminId' =>''	));
		$this->session->sess_destroy();	
		redirect(base_url().'index.php/signin');	 
	}
	
	
	
	function changePassword(){
		
		$id= $this->session->userdata('adminId');
		if($_POST){		
			$success=$this->adminmodel->passchange();
			if($success==1){
				$this->session->set_flashdata('1',TRUE);	
				redirect(base_url().'home/changepassword');		
			}else{
				$this->session->set_flashdata('0',TRUE);	
				redirect(base_url().'home/changepassword');	
			}			
		}		
		
		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);	
		$data['page_title']="Change Password";
		$this->load->view('header',$this->view_data);
		$this->load->view('changepassword',$data);
		$this->load->view('footer');  		
	}
        
        public function adminDashboard(){ 
            
            $this->load->view('dashboard');  
            
            
            
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */