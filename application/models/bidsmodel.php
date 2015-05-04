<?php
class Bidsmodel extends CI_Model {

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
	
		
	function bidslist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
   if($this->session->userdata('level') == 0)
	 $query_str = "SELECT b.*,s.name ,u.first_name ,u.last_name  FROM `bids` b INNER JOIN skills s ON b.service_id = s.id INNER JOIN users u ON u.id = b.user_id ";
	 
  else 
     redirect(base_url().'home');
   		$result=$this->db->query($query_str); 
  		return $result; 		
	}
	
	 
	
	function deletebids($id){
	  	$where['id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('bids');	
  		if($res){return true; }else{ return false; }
  	}
	
	function bids_data_by_id($id){	
	$query_str = "SELECT b.*,s.name ,u.first_name ,u.last_name FROM `bids` b INNER JOIN skills s ON b.service_id = s.id INNER JOIN users u ON u.id = b.user_id WHERE b.id = '".$id."' ";
 		 $result=$this->db->query($query_str); 
		if($result->num_rows() > 0){
			$row = $result->result_array();
		}else{
			$row="";
		}
   		return $row;
	} 
	
  	
	function delete_multiple_bids($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('bids');	
  		if($res){return true; }else{ return false; }
	}
	
	function save_bids(){
   	$id = $this->input->post('id');  
 
   	  $data=array(    	
			'service_id'=>$this->input->post('service'),
			'upgrade_option'=>$this->input->post('upgrade_option'),
			'country'=>$this->input->post('country'),
			'my_availability'=>$this->input->post('my_availability'),
			'time_slot1'=>$this->input->post('time_slot1'),
			'time_slot2'=>$this->input->post('time_slot2'),
			'time_slot3'=>$this->input->post('time_slot3'),
			'time_slot4'=>$this->input->post('time_slot4'),
			'comments'=>$this->input->post('comments'),
			'user_id'=>$this->input->post('user'),
			'job_description'=>$this->input->post('job_description'),
 			'lat'=>$this->input->post('lat'),
			'lon'=>$this->input->post('lon'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'state'=>$this->input->post('state'),
			'zip'=>$this->input->post('zip'),
			'phone_number'=>$this->input->post('phone_number')
         		);
 		if($id > 0){
 		$res = '';	
  		$where['id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('bids', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
  		$res= $this->db->insert('bids', $data);	
		$insert_id = $this->db->insert_id();
		 
		$serviceProviderList = $this->getServiceProviderList($this->input->post('service'));
		$sendNotification = $this->sendNotification($serviceProviderList,$insert_id,$this->input->post('service')); 
		if($res){  return true; }else{ return false; }
	  }
  	}
	
	function inactivebids($id){
	$query_str="UPDATE  bids	SET status = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activebids($id){
	 $query_str="UPDATE  bids	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_bids($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  bids	SET status = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_bids($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  bids	SET status = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function getResponseDataBYBidId($bid_id){
        $query_str = "SELECT bn.id,bn.status ,br.price,bn.approved FROM `bids_notification` bn INNER JOIN bids_response br ON bn.id = br.notification_id  WHERE br.bid_id = '".$bid_id."' AND bn.approved = 1";/*WHERE br.bid_id = '".$bid_id."'*/
 		 $result=$this->db->query($query_str); 
		if($result->num_rows() > 0){
			$row = $result->result_array();
		}else{
			$row="";
		}
     return $row[0];
 	}
	 
	 function getResponseCountBYBidId($bid_id){
        $query_str = "SELECT count(bn.id) as count FROM `bids_notification` bn INNER JOIN bids_response br ON bn.id = br.notification_id  WHERE br.bid_id = '".$bid_id."'";/*WHERE br.bid_id = '".$bid_id."'*/
 		 $result=$this->db->query($query_str); 
		if($result->num_rows() > 0){
			$row = $result->result();
		}else{
			$row="";
		}
     return $row[0]->count;
 	}
	 
	 
	 function notificationlist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
   if($this->session->userdata('level') == 1)
	 $query_str = "SELECT s.name ,concat(u.first_name ,' ',u.last_name) as service_provider_name ,bn.* FROM `bids` b INNER JOIN skills s ON b.service_id = s.id  INNER JOIN bids_notification bn ON b.id = bn.bids_id INNER JOIN users u ON u.id = bn.user_id";
   else 
     redirect(base_url().'home');
	 
     		$result=$this->db->query($query_str); 
		
   		return $result; 		
	}
	
	function getServiceProviderList($service_id){
	  $query_str = "SELECT service_provider_id FROM service_provider_skills_map WHERE skills_id ='".$service_id."' " ; 
	   $result=$this->db->query($query_str); 
	   $row = $result->result();
 	    $ids = array();
     foreach($row as $record){
 	    $ids[] = $record->service_provider_id;
       }
     return $ids;
 	}
	
	function sendNotification($senderUsers,$bid_id,$service_id){
		 foreach($senderUsers as $user_id){
		 $data=array(    	
 			'bids_id'=>$bid_id,
			'user_id'=>$user_id,
			'status'=>1
       		);
		   $res= $this->db->insert('bids_notification', $data);	
 		    
		 }
  }
  
  function fatch_bids_data($id){
  $query = $this->db->query("SELECT b.id,u.first_name ,u.last_name ,s.name ,b.job_description ,b.my_availability ,b.my_availability ,ul.type,bn.approved FROM skills s LEFT JOIN bids b ON s.id = b.service_id LEFT JOIN users u ON u.id = b.user_id LEFT JOIN users_level ul ON u.id = ul.user_id  LEFT JOIN bids_notification bn ON b.id = bn.bids_id WHERE b.id = '".$id."' ");
  	   $row  = $query->result_array();
 	   $bidsList = array();
		 foreach($row as $key=>$value){
			 $bidsList[] = $value;
		 }
		
  	   return $bidsList;
  
  }
  
   function fatch_notification_bids_data($id){
  $query = $this->db->query("SELECT b.bids_id,u.first_name ,u.last_name FROM bids_notification b  LEFT JOIN users u ON u.id = b.user_id  WHERE b.bids_id = '".$id."' ");
  	   $row  = $query->result_array();
 	   $bidsList = array();
		 foreach($row as $key=>$value){
			 $bidsList[] = $value;
		 }
		
  	   return $bidsList;
  
  }
  
  function fatch_response_bids_data($id){
  $query = $this->db->query("SELECT b.price,b.avilabilty,b.time,u.first_name ,u.last_name FROM bids_response b  LEFT JOIN users u ON u.id = b.service_provider_id  WHERE b.bid_id = '".$id."'  ");
  	   $row  = $query->result_array();
 	   $bidsList = array();
		 foreach($row as $key=>$value){
			 $bidsList[] = $value;
		 }
		
  	   return $bidsList;
  
  }
	 
    ############################################ End of Message #####################################
   
}
?>