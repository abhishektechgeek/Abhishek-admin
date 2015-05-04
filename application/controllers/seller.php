<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seller extends CI_Controller {  

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
    }
	public function index(){		
		if (!$this->session->userdata('adminId')){
					redirect(base_url().'home');		
		}		
		$this->sellerlist();
	}
	
	function sellerlist(){
	
		$id= $this->session->userdata('adminId');
		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);

		$per_page=10;
		$start_row=$this->uri->segment(6);
		if(!$start_row){
			$start_row=0;
		}
		$order_field=$this->uri->segment(4);
		if(!$order_field){
			$order_field='email';
		}
		$order_seq=$this->uri->segment(5);
		if(!$order_seq){
			$order_seq='asc';
		}
		$sallerlist_listing = $this->sellermodel->sellerlist('count');
		
		$config['base_url'] = base_url().'seller/'.$order_field."/".$order_seq;
		$config['total_rows'] = $sallerlist_listing;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 6;
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
		$this->view_data['seller_listing']=$this->sellermodel->sellerlist('pagewise',$start_row,$per_page,$order_field,$order_seq);
		
		$this->load->view('header',$this->view_data);		
		$this->load->view('sellerlist',$this->view_data);
		$this->load->view('footer'); 	
	}	
	
	
	function edit_seller(){
	
	   	
		$userId=$this->session->userdata('userId');	
		
		$edit_id=$this->uri->segment(4);
		
		if($edit_id!=""){			
			$data['edit_data']=$this->adminmodel->sellerdata($edit_id);
			
			 
			 
			
		 
			//$this->load->view('seller/edit_seller',$data);
			//$this->load->view('footer'); 	
			}	
		$data['page_title']="Edit Seller";
		$this->load->view('seller/edit_seller',$data);	
	
	
	}
	
	
	function save_seller(){
	
	   	
		if(isset($_POST['submit'])){
		
			$success=$this->adminmodel->save_seller();
			if($success){
			   $this->session->set_flashdata('success',TRUE);	
			   redirect(base_url().'seller/sellerlist');	
				 
			}else{
			   $this->session->set_flashdata('fail',TRUE);	
			   redirect(base_url().'seller/sellerlist');	
			}
		}
				//$this->load->view('seller/edit_seller',$data);	
  	}
		
	/*function add_category(){
	if(count($_POST) > 0){		
			$success=$this->categorymodel->insert_category();	
		}
		redirect(base_url().'category');					
	}
	
	function edit_category(){	
		$id= $this->session->userdata('adminId');
		$this->view_data['user_detail']=$this->adminmodel->fatch_admin_profile($id);
		$data['page_title']="Update Category";
		
		$edit_id=$this->uri->segment(4);
		if($edit_id!=""){			
			$data['edit_category_data']=$this->categorymodel->get_single_category($edit_id);
			//$data['date_added']=$this->categorymodel->get_categories();
			
			$this->load->view('header',$this->view_data);
			$this->load->view('category',$data);
			$this->load->view('footer'); 	
			}		
		}
		function update_category(){
			$edit_id=$this->uri->segment(4);
			if(count($_POST) > 0){				
				$this->categorymodel->update_category($edit_id);	
			}
			 redirect(base_url().'category');
		}
		function active_category(){
			$id=$this->uri->segment(4);
			$status=$this->uri->segment(5);			
			$this->categorymodel->active_category($id,$status);			
			 redirect(base_url().'category');
		}
		function delete_category(){
			if(count($_POST) > 0){				
				$this->categorymodel->delete_category($_POST['delCategory']);
			}
			 redirect(base_url().'category');
		}		*/
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */