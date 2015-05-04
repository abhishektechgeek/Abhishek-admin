<?php
class Sellermodel extends CI_Model {

    var $name   = '';
   // var $content = '';
   // var $date    = '';

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    function register(){		
		$checkAvail=$this->checkexistSeller($this->input->post('email'));
		if($checkAvail==1){
			$sellerId="";
		}else{
			$data=array(    	
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'address'=>addslashes(trim($this->input->post('address'))),
				'city'=>$this->input->post('city'),
				'state_id'=>$this->input->post('state'),
				'country_id'=> $this->input->post('country'),
				'postalcode'=>$this->input->post('postalcode'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'webaddress'=>$this->input->post('webaddress'),
				'phone'=>$this->input->post('phone'),
				'fax'=>$this->input->post('fax')
			);
		
		 	$this->db->insert('seller',$data);
		 	$sellerId=$this->db->insert_id(); 
		}		
		return $sellerId;
    } 
	
	function login(){		
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
			
	 	$str="select * from seller where `email`='".$email."' and `password`='".$password."' ";
		$query=$this->db->query($str);		
		if ($query->num_rows()>0){
			foreach ($query->result() as $row) {
             	 $result=$row->seller_id;
				$this->session->set_userdata(array('userId' => $row->seller_id));
            }				
			return $result;			
		}else{
			return $result="";		
		}		
	}
	
	function sellerlist($action,$start_row='',$per_page='',$order_field='',$order_seq=''){
	    $result = array();
		$where = " WHERE 1";//`status` = '1' ";
		if($action == 'count'){
			$query_str="SELECT count(`seller_id`) as totalseller FROM `seller` ".$where." ";
			$result=$this->db->query($query_str);
			$row = $result->result_array();
			return $row[0]['totalseller'];
		}
		$query_str="SELECT * FROM 	`seller`" .$where."  ORDER BY	".$order_field." ".$order_seq." LIMIT ".$start_row.",".$per_page;
		$result=$this->db->query($query_str);
		return $result; 		
	}  
	
	function sellerdata($seller_id){		
		$this->db->where(array('seller_id'=>$seller_id));
		$query = $this->db->get('seller');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	}
	 
	function checkexistSeller($email){
		$str="select * from seller where `email`='".$email."' ";
		$query=$this->db->query($str);		
		if ($query->num_rows()>0){	
			//$row = $query->result_array();
			$result=1;
		}else{
			$result=0;
		}
		return $result;
	}	
	
	function passchange(){	
		$res = '';	
		$seller_id=$this->session->userdata('userId');
		$oldpass=md5($this->input->post('oldpassword'));
				
		$sql="select * from seller where password='".$oldpass."' and seller_id=".$seller_id;		
		$query=$this->db->query($sql);
				
		if ($query->num_rows()>0){				
			$data['password']=md5($this->input->post('password'));			
			$where['seller_id']=$seller_id;		
			$this->db->where($where);
			$res= $this->db->update('seller', $data);		
		}		
		if($res){return true; }else{ return false; }
	}	
	function edit_profile(){
		$res = '';			
		$data=array(    	
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'address'=>addslashes(trim($this->input->post('address'))),
			'city'=>$this->input->post('city'),
			'state_id'=>$this->input->post('state'),
			'country_id'=> $this->input->post('country'),
			'postalcode'=>$this->input->post('postalcode'),			
			'webaddress'=>$this->input->post('webaddress'),
			'phone'=>$this->input->post('phone'),
			'fax'=>$this->input->post('fax')
		);
		$where['seller_id']=$this->session->userdata('userId');		
		$this->db->where($where);
		$res= $this->db->update('seller', $data);	
		if($res){return true; }else{ return false; }
	}
	
	function resetpass($password){		
		$email=$this->input->post('email');		
		$checkAvail=$this->checkexistSeller($email);
		if($checkAvail==1){
			$data['password']=$password;
			$where['email']=$email;		
			$this->db->where($where);
			$res= $this->db->update('seller', $data);
			if($res){
				$flag=1;
			}else{
				$flag=0;
			}		
		}else{
			$flag=0;		
		}
		return $flag;	
	}
	function getSellerByEmail($email){
		$str="select * from seller where `email`='".$email."' ";
		$query=$this->db->query($str);		
		if ($query->num_rows()>0){	
			$result = $query->result_array();			
		}else{
			$result="";
		}
		return $result;
	}
}
?>