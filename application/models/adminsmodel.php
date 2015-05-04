<?php
class Adminsmodel extends CI_Model {

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
	
		
	function adminslist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
 // var_dump( $this->session->userdata('level'));die;
  if($this->session->userdata('level') == 0)
	 $query_str = "SELECT * FROM `admin` ";
	 
  else 
     $query_str = "SELECT * FROM `admin` WHERE level = '1'"; 
	 $result=$this->db->query($query_str);
   		 
  		return $result; 		
	}
	
	 
	
	function deleteadmins($id){
	  	$where['id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('admin');	
  		if($res){return true; }else{ return false; }
  	}
	
	function admins_data_by_id($id){	
	
 		$this->db->where(array('id'=>$id));
		$query = $this->db->get('admin');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
  		return $row;
	} 
	
	 
 	
	
	function delete_multiple_admins($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('admin');	
  		if($res){return true; }else{ return false; }
	}
	
	function save_admins(){
 	$id = $this->input->post('id');  
   	$group_id =  $this->input->post('group_id'); 
 	  $data=array(    	
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'gender'=>$this->input->post('gender'),
			'email'=>$this->input->post('email'),
			'group_id'=>$group_id,
			'password'=>$this->input->post('password'),
			'birthday'=>$this->input->post('birthday'),
     		);
 		if($id > 0){
 		$res = '';	
  		$where['id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('admin', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
  		$res= $this->db->insert('admin', $data);	
		if($res){  return true; }else{ return false; }
	  }
  	}
	
	function inactiveadmins($id){
	$query_str="UPDATE  admin	SET status = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activeadmins($id){
	 $query_str="UPDATE  admin	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_admins($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  admin	SET status = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_admins($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  admin	SET status = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	
   ############################################ End of Message #####################################
   
}
?>