<?php
class Serviceplanmodel extends CI_Model {

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
	
		
	function serviceplanlist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
 	 
  
 $query_str = "SELECT * FROM `service_plan` ";
 $result=$this->db->query($query_str);
		
  		 
  		return $result; 		
	}
	
	function deleteserviceplan($id){
	  	$where['serviceplan_id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('service_plan');	
  		if($res){return true; }else{ return false; }
  	}
	
	function serviceplan_data_by_id($id){	
	
 		$this->db->where(array('serviceplan_id'=>$id));
		$query = $this->db->get('service_plan');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
  		return $row;
	} 
	
	function attribute_data_by_id($id){	
		$this->db->where(array('serviceplan_id'=>$id));
		$query = $this->db->get('upgrade_option');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	
	function specification_data_by_id($id){	
		$this->db->where(array('serviceplan_id'=>$id));
		$query = $this->db->get('specification');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	function delete_multiple_serviceplan($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('serviceplan_id',$ids);
		$res= $this->db->delete('service_plan');	
  		if($res){return true; }else{ return false; }
	}
	
	function save_serviceplan($data,$image){
 	$id = $this->input->post('id'); 
	 
 	  $data=array(    	
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'info'=>$this->input->post('info'),
                         'image'=>$image,
			'bids'=>$this->input->post('bids'),
                         'PRICE'=>$this->input->post('price'),
    		);
	 
		if($id > 0){
 		$res = '';	
  		$where['serviceplan_id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('service_plan', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
  		$res= $this->db->insert('service_plan', $data);	
		if($res){  return true; }else{ return false; }
	  }
  	}
	
	function inactiveserviceplan($id){
	$query_str="UPDATE  service_plan	SET status = '0' WHERE serviceplan_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activeserviceplan($id){
	 $query_str="UPDATE  service_plan	SET status = '1' WHERE serviceplan_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_serviceplan($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  service_plan	SET status = '1' WHERE serviceplan_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_serviceplan($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  service_plan	SET status = '0' WHERE serviceplan_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	
   ############################################ End of Message #####################################
   
}
?>