<?php
class Categorymodel extends CI_Model {

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
	
		
	function categorylist($action='',$start_row='',$per_page='',$order_field='',$order_seq=''){
	    $result = array();
		$where = " WHERE type = 1";//`status` = '1' ";
		$where2 = "  GROUP BY parent_id, id";//`status` = '1' ";
		if($action == 'count'){
		    $this->db->cache_off();
			$query_str="SELECT count(`id`) as totalskills FROM `skills` ".$where2." ";
 			$result=$this->db->query($query_str);
			$row = $result->result_array();
			return $row[0]['totalskills'];
		}
		$this->db->cache_off();
		$query_str="SELECT * FROM 	`skills`" .$where2."  ORDER BY	".$order_field." ".$order_seq;
                //." LIMIT ".$start_row.",".$per_page
		$result=$this->db->query($query_str);
 		 
  		return $result; 		
	}
	
	function deletecategory($id){
	  	$where['id']=$id;	
		$this->db->cache_off();
  		$this->db->where($where);
		$res= $this->db->delete('skills');	
  		if($res){return true; }else{ return false; }
  	}
	
	function category_data_by_id($id){	
	    $this->db->cache_off();	
		$this->db->where(array('id'=>$id));
		$query = $this->db->get('skills');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	function delete_multiple_category($ids){
 	    $this->db->cache_off();
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('skills');	
  		if($res){return true; }else{ return false; }
	}
	
	
	function approve_multiple_category($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
		     $this->db->cache_off();
			 $query_str =" UPDATE  skills	SET status = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_category($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
		     $this->db->cache_off();
			 $query_str =" UPDATE  skills	SET status = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function save_category($data = '',$image = ''){
	$id = $this->input->post('id');
	if(isset($image)){
	$data=array(    	
			'name'=>$this->input->post('name'),
			'status'=>$this->input->post('status'),
			'parent_id'=>'0',
			'image'=>$image,
			'type'=>'1'
  		);
	
	}else{
	$data=array(    	
			'name'=>$this->input->post('name'),
			'status'=>$this->input->post('status'),
			'parent_id'=>'0',
			'type'=>'1'
   		);
	
	}
	if($id > 0){
 		$res = '';	
		$this->db->cache_off();
  		$where['id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('skills', $data);	
		if($res){  return true; }else{ return false; }
 	    }
	else{
	    $this->db->cache_off();
  		$res= $this->db->insert('skills', $data);	
		if($res){  return true; }else{ return false; }
	  }
  	}
	
	function inactiveCategory($id){
	$this->db->cache_off();
	$query_str="UPDATE  skills	SET status = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activeCategory($id){
	$this->db->cache_off();
	 $query_str="UPDATE  skills	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
        
        
        function inactiveSegment($id){
	$this->db->cache_off();
        $query_str="UPDATE  skills	SET status = '0' WHERE id = '".$id."' ";
        
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
        
        function activeSegment($id){
	$this->db->cache_off();
	 $query_str="UPDATE  skills	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
   ############################################ End of Message #####################################
   
}
?>