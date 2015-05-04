<?php
class Responsemodel extends CI_Model {

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
	
		
	 function responselist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
   if($this->session->userdata('level') == 0)
	$query_str = "SELECT r.* ,concat(u.first_name ,' ',u.last_name) as service_provider_name   FROM `bids_response` r   INNER JOIN users u ON u.id = r.service_provider_id";
   else 
     redirect(base_url().'home');
	 
     		$result=$this->db->query($query_str); 
		
   		return $result; 		
	}
	
	 
	
	function deleteresponse($id){
	  	$where['id']=$id;	
		 
  		$this->db->where($where);
		$res= $this->db->delete('bids_response');	
  		if($res){return true; }else{ return false; }
  	}
	
	function response_data_by_id($id){	
	$query_str = "SELECT b.*,s.name ,u.first_name ,u.last_name FROM `response` b INNER JOIN skills s ON b.service_id = s.id INNER JOIN users u ON u.id = b.user_id WHERE b.id = '".$id."' ";
 		 $result=$this->db->query($query_str); 
		if($result->num_rows() > 0){
			$row = $result->result_array();
		}else{
			$row="";
		}
   		return $row;
	} 
	
  	
	function delete_multiple_response($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('bids_response');	
  		if($res){return true; }else{ return false; }
	}
	
	 
	
	function inactiveresponse($id){
	$query_str="UPDATE  bids_response	SET approved = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activeresponse($id){
	 $query_str="UPDATE  bids_response	SET approved = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_response($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  bids_response	SET approved = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_response($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  bids_response	SET approved = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
  	 
	 
	 
	 
	 
	 
    ############################################ End of Message #####################################
   
}
?>