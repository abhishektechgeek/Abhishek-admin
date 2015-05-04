<?php
class Couponmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
         parent::__construct();
		/*$this->load->model('pagingmodel');*/
    }
	
	function _isAutorisedUser(){
	
	   $data = $this->session->all_userdata();
	   /*if(!isset($data['is_company']) && !isset($data['is_user']) && !isset($data['is_bank'])){
			 $this->session->set_flashdata('error','OOPs your session has been expired !!!');
			 redirect(base_url().'index.php?index=logout');
		   }else */
		   if(!isset($data['is_user']) || $data['is_user'] != 'YES'){
			    $this->session->set_flashdata('error','OOPs your session has been expired !!!');
				redirect(base_url().'index.php?index=logout');
			 }
	}
	
		
	function couponlist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
 	 
  
 $query_str = "SELECT * FROM `coupon` ";
 $result=$this->db->query($query_str);
		
  		 
  		return $result; 		
	}
	
	function deletecoupon($id){
	  	$where['coupon_id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('coupon');	
  		if($res){return true; }else{ return false; }
  	}
	
	function coupon_data_by_id($id){	
	
 		$this->db->where(array('coupon_id'=>$id));
		$query = $this->db->get('coupon');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
  		return $row;
	} 
	
	function attribute_data_by_id($id){	
		$this->db->where(array('coupon_id'=>$id));
		$query = $this->db->get('upgrade_option');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	
	function specification_data_by_id($id){	
		$this->db->where(array('coupon_id'=>$id));
		$query = $this->db->get('specification');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	function delete_multiple_coupon($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('coupon_id',$ids);
		$res= $this->db->delete('coupon');	
  		if($res){return true; }else{ return false; }
	}
	
	function save_coupon(){
 	  $id = $this->input->post('id'); 
	 
 	  $data=array(    	
			'name'=>$this->input->post('name'),
			'code'=>$this->input->post('code'),
			'type'=>$this->input->post('type'),
			'discount'=>$this->input->post('discount'),
			'total_amount'=>$this->input->post('total_amount'),
			'login_require'=>$this->input->post('login_require'),
			'free_shipping'=>$this->input->post('free_shipping'),
			'service_plan'=>$this->input->post('service_plan'),
			'date_start'=>$this->input->post('date_start'),
			'date_end'=>$this->input->post('date_end'),
			'user_per_coupon'=>$this->input->post('user_per_coupon'),
			'user_per_customer'=>$this->input->post('user_per_customer')
    		);
	 
		if($id > 0){
 		$res = '';	
  		$where['coupon_id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('coupon', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
  		$res= $this->db->insert('coupon', $data);	
		if($res){  return true; }else{ return false; }
	  }
  	}
	
	function inactivecoupon($id){
	$query_str="UPDATE  coupon	SET status = '0' WHERE coupon_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activecoupon($id){
	 $query_str="UPDATE  coupon	SET status = '1' WHERE coupon_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_coupon($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  coupon	SET status = '1' WHERE coupon_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_coupon($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  coupon	SET status = '0' WHERE coupon_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	 function service_plan_list(){
$query = $this->db->query("SELECT serviceplan_id ,name  FROM service_plan");
	   $row  = $query->result_array();
 	   $servicePlanList = array();
		 foreach($row as $key=>$value){
			 $servicePlanList[] = $value;
		 }
   	   return $servicePlanList;
 }
	
   ############################################ End of Message #####################################
   
}
?>