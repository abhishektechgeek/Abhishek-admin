<?php
class Skillsmodel extends CI_Model {

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
	
		
	function skillslist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
	    $result = array();
		$where = " WHERE 1";//`status` = '1' ";
		if($action == 'count'){
			$query_str="SELECT count(`id`) as totalskills FROM `skills` ".$where." ";
			$result=$this->db->query($query_str);
			$row = $result->result_array();
			return $row[0]['totalskills'];
		}
		$query_str="SELECT * FROM 	`skills`" .$where."  ORDER BY	".$order_field." ".$order_seq." LIMIT ".$start_row.",".$per_page;
		$result=$this->db->query($query_str);
 		 
  		return $result; 		
	}
	
	function deleteSkills($id){
	  	$where['id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('skills');	
  		if($res){return true; }else{ return false; }
  	}
	
	function skills_data_by_id($id){		
		$this->db->where(array('id'=>$id));
		$query = $this->db->get('skills');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	function save_skills($data){
	$id = $this->input->post('id');
	if($id > 0){
 		$res = '';	
		$this->db->where(array('id'=>$this->input->post('parent_id')));
		$query = $this->db->get('skills');
		$row = $query->result_array();
		if($this->input->post('parent_id') > 0)
		    $path = $row[0]['path'].'-'.$this->input->post('id').'-';
		else
		    $path = '-'.$this->input->post('id').'-';
		
		$data=array(    	
			'name'=>$this->input->post('name'),
			'status'=>$this->input->post('status'),
			'parent_id'=>$this->input->post('parent_id'),
			
			'path'=>$path
 		);
		
		$where['id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('skills', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
	 
				
		$data=array(    	
			'name'=>$this->input->post('name'),
			'status'=>$this->input->post('status'),
			'parent_id'=>$this->input->post('parent_id'),
			
			
 		);
 		
		$res= $this->db->insert('skills', $data);	
		
 		$insert_id = $this->db->insert_id();
		$this->db->where(array('id'=>$this->input->post('parent_id')));
		$query = $this->db->get('skills');
		$row = $query->result_array();
		 
		if($this->input->post('parent_id') > 0)
		    $path = $row[0]['path'].'-'.$insert_id.'-';
		else
		    $path = '-'.$insert_id.'-';
		
		$data=array(    	
			'path'=>$path
  		);
		$where['id']=$insert_id;		
		$this->db->where($where);
		$res= $this->db->update('skills', $data);	
  		
		if($res){  return true; }else{ return false; }
	  }
  	}
   ############################################ End of Message #####################################
   
}
?>