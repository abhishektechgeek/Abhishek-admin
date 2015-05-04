<?php
class Groupmodel extends CI_Model {

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
	
		
	function grouplist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
	    $result = array();
 		if($action == 'count'){
		    $this->db->cache_off();
			$query_str="SELECT count(`group_id`) as totalgroup FROM `group`   ";
 			$result=$this->db->query($query_str);
			$row = $result->result_array();
			return $row[0]['totalgroup'];
		}
		$this->db->cache_off();
		$query_str="SELECT * FROM 	`group`    ";
		$result=$this->db->query($query_str);
 		 
  		return $result; 		
	}
	
	function deletegroup($id){
	  	$where['group_id']=$id;	
		$this->db->cache_off();
  		$this->db->where($where);
		$res= $this->db->delete('group');	
  		if($res){return true; }else{ return false; }
  	}
	
	function group_data_by_id($id){	
	    $this->db->cache_off();	
		$this->db->where(array('group_id'=>$id));
		$query = $this->db->get('group');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	function delete_multiple_group($ids){
 	    $this->db->cache_off();
        $where['group_id']=$id;	
  		$this->db->where_in('group_id',$ids);
		$res= $this->db->delete('group');	
  		if($res){return true; }else{ return false; }
	}
	
	
	function approve_multiple_group($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
		     $this->db->cache_off();
			 $query_str ="UPDATE `group` SET `status`= 1 WHERE group_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_group($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
		     $this->db->cache_off();
			 $query_str ="UPDATE `group` SET `status`= 0 WHERE group_id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function save_group($data ='',$image = ''){
	$id = $this->input->post('id'); 
  	$view_permission = $this->input->post('view_permission');
    $modify_permission = $this->input->post('modify_permission');
	
	$limit = (count($view_permission) > count($modify_permission))?count($view_permission):count($modify_permission);
  	 
	$data=array(    	
			'group_name'=>$this->input->post('name'),
			'status'=>$this->input->post('status')
    		);
	
	 
	if($id > 0){
 		$res = '';	
		$this->db->cache_off();
  		$where['group_id']=$id;		
		$this->db->where($where);
		$res= $this->db->update('group', $data);	
		if($res){ 
		$where['group_id']=$id;	
		$this->db->cache_off();
  		$this->db->where($where);
		$res= $this->db->delete('group_user_map');
 		 
		for($i=0;$i<$limit;$i++){
		$view = ($view_permission[$i] > 0)?$view_permission[$i]:0;
		$modify = ($modify_permission[$i] > 0)?$modify_permission[$i]:0;
		
		$data=array(    	
				'group_id'=>$id,
				'access_permission'=>$view,
				'modify_permission'=>$modify  
     		);
		$res= $this->db->insert('group_user_map', $data);	
		}
		
		 return true; }else{ return false; }
 	    }
	else{
	    $this->db->cache_off();
  		$res= $this->db->insert('group', $data);	
		$insert_id = $this->db->insert_id();
		
		 
		if($insert_id > 0){ 
		for($i=0;$i<$limit;$i++){
		$view = ($view_permission[$i] > 0)?$view_permission[$i]:0;
		$modify = ($modify_permission[$i] > 0)?$modify_permission[$i]:0;
		
		$data=array(    	
				'group_id'=>$insert_id,
				'access_permission'=>$view,
				'modify_permission'=>$modify  
     		);
		$res= $this->db->insert('group_user_map', $data);	
		}
 		 return true; 
		 
		 }else{ return false; }
	  }
  	}
	
	function inactivegroup($id){
	$this->db->cache_off();
	$query_str="UPDATE `group` SET `status`= 0 WHERE group_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activegroup($id){
	$this->db->cache_off();
	 $query_str="UPDATE `group` SET `status`= 1 WHERE group_id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
   ############################################ End of Message #####################################
   
}
?>