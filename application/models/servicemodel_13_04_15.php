<?php
class Servicemodel extends CI_Model {

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
	
		
	
	function servicelist($action='',$start_row='',$per_page='',$order_field='',$order_seq='', $segment_id){
		$segment_array = array();
		
 		if($segment_id > 0){
		    $query_str = "SELECT * FROM `skills` WHERE  parent_id  = '".$segment_id."' order by order_by"; 
		}else{
		   $query_str = "SELECT * FROM `skills` WHERE type = 3 order by order_by ";
		}
               // die;
		$result=$this->db->query($query_str);
		return $result; 		
 	}
        
	function deleteservice($id){
	  	$where['id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('skills'); 
  		if($res){return true; }else{ return false; }
  	}
        
        function delete_subservice($id){
	  	$where['service_id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('upgrade_option'); 
  		if($res){return true; }else{ return false; }
  	}
	
	function service_data_by_id($id){	
		$this->db->where(array('id'=>$id));
		$query = $this->db->get('skills'); 
		if($query->num_rows() > 0){
			$row = $query->result_array();
                        
		}else{
			$row="";
		}
		return $row;
                
               
	} 
        
        function sub_service_data_by_id($id){	
                 $this->db->where(array('service_id'=>$id));
		$query = $this->db->get('upgrade_option'); 
		if($query->num_rows() > 0){
			$row = $query->result_array();
                        
		}else{
			$row="";
		}
		return $row;
                
               
	} 
	
	function attribute_data_by_id($id){	
		$this->db->where(array('service_id'=>$id));
		$query = $this->db->get('upgrade_option');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	
	function specification_data_by_id($id){	
		$this->db->where(array('service_id'=>$id));
		$query = $this->db->get('specification');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	} 
	
	
	function delete_multiple_service($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('skills');	
  		if($res){return true; }else{ return false; }
	}
	
	function delete_attr_by_service_id($id){
   		$where['service_id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('upgrade_option');	
  		if($res){return true; }else{ return false; }
	}
	
	function delete_spc_by_service_id($id){
   		$where['service_id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('specification');	
  		if($res){return true; }else{ return false; }
	}
	
	function save_service($data,$image){
 	//$id = $this->input->post('id');   
         $id = $this->input->post('serviceId');
	if($id>0){
	$pid = $this->input->post('parent_id');
	
	$count_attr = $this->input->post('count_attr'); 
         $res = '';
	$res = $this->delete_attr_by_service_id($id);
        $res = $this->delete_spc_by_service_id($id);
  	//count_attr
        /*
	$attr = array();
	$attr['description_upgrade'] = $this->input->post('description_upgrade'); 
	$insert  = "INSERT INTO  upgrade_option (attribute_id ,attribute_name, attribute_value, service_id)";
	 
	for($i = 1;$i <=$count_attr;$i++){
	
	if($i == 1){
 	$insert .= "  VALUES (NULL, '".$this->input->post('attribute_name_'.$i)."', '','".$id."')"; 
 	  }
	else{ 
	  
 	 $insert .= " ,(NULL, '".$this->input->post('attribute_name_'.$i)."', '','".$id."')";
	}    
	
	}
	//echo "<pre>";print_r($_POST);die;
	//echo $insert;die;
	$result=$this->db->query($insert);
  		if($result){}else{ return false; }
	$insert = '';
	$count_spc = $this->input->post('count_spc'); 
	//count_attr
	$attr = array();
	 
	
	$insert  = "INSERT INTO  specification (specification_id ,attribute_name, attribute_value, service_id)";
	 
	for($i = 1;$i <=$count_spc;$i++){
	
	if($i == 1){
 	$insert .= "  VALUES (NULL, '".$this->input->post('sp_attribute_name_'.$i)."', '','".$id."')"; 
 	  }
	else{ 
	  
 	 $insert .= " ,(NULL, '".$this->input->post('sp_attribute_name_'.$i)."', '','".$id."')";
	}    
	
	}
	  // echo $insert;die;
        
	$result=$this->db->query($insert);
      
  		if($res){  return true; }else{ return false; }
 
   */
   	if(isset($image)){
	$data=array(    	
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'parent_id'=>$pid,
			'image'=>$image,
			'upgrade_description'=>$this->input->post('description_upgrade'),
			'specification'=>$this->input->post('specification'),
			'type'=>'3',
                        'service_type'=>$this->input->post('service_type')
 		);
	
	}else{
	$data=array(    	
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'parent_id'=>$pid,
			'upgrade_description'=>$this->input->post('description_upgrade'),
			'specification'=>$this->input->post('specification'),
			'type'=>'3',
                        'service_type'=>$this->input->post('service_type')
    		);
 	} 
		
		$res = '';	
  		$where['id']=$id;		
		$this->db->where($where);
		$res= $this->db->update('skills', $data);	
		if($res){  return true; }else{ return false; }
  	
	}else{ 
	
	$this->db->select_max('id');
     
    $result = $this->db->get('skills');
  	$row = $result->result_object();
	
	 $id = $row[0]->id; 
	 $id = $id+1; 
	$pid = $this->input->post('parent_id');
	
	$count_attr = $this->input->post('count_attr'); 
	$res  = $this->delete_attr_by_service_id($id);
	$res  = $this->delete_spc_by_service_id($id);
  	
   
   	if(isset($image)){
	$data=array(    	
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'parent_id'=>$pid,
			'image'=>$image,
			'upgrade_description'=>$this->input->post('description_upgrade'),
			'specification'=>$this->input->post('specification'),
                        'type'=>'3',
                        'service_type'=>$this->input->post('service_type')
   		);
	
	}else{
	$data=array(    	
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'parent_id'=>$pid,
			'upgrade_description'=>$this->input->post('description_upgrade'),
			'specification'=>$this->input->post('specification'),
                        'type'=>'3',
                        'service_type'=>$this->input->post('service_type')
    		);
 	}
		$res = '';	
  		 	
		$this->db->where($where);
		$res= $this->db->insert('skills', $data);	
		if($res){  return true; }else{ return false; }
  	
	}
  	}
        
        
        function save_subservice($data,$image){
           $pid = $this->input->post('parent_id');
	
            $id = $this->input->post('id');   
	
	
	$count_attr = $this->input->post('count_attr'); 
         $res = '';
	$res = $this->delete_attr_by_service_id($id);
        $res = $this->delete_spc_by_service_id($id);
  	//count_attr
        
	$attr = array();
	$attr['description'] = $this->input->post('description'); 
        $attr['image'] = $this->input->post('image'); 
	$insert  = "INSERT INTO  upgrade_option (attribute_id ,attribute_name,description,image,attribute_value, service_id)";
	 
	for($i = 1;$i <=$count_attr;$i++){
	
	if($i == 1){
 	 $insert .= "  VALUES (NULL, '".$this->input->post('attribute_name_'.$i)."', '".$attr['description']."','".$image."','','".$pid."')";
 	  }
	else{ 
	  
 	$insert .= " ,(NULL, '".$this->input->post('attribute_name_'.$i)."', '','','','".$pid."')"; 
	}    
	
	}
	//echo "<pre>";print_r($_POST);die;
	//echo $insert;die;
	$result=$this->db->query($insert);
  		if($result){}else{ return false; }
   
  	
	
  	}
	
	function inactiveservice($id){
	$query_str="UPDATE  skills	SET status = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function activeservice($id){
	 $query_str="UPDATE  skills	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function approve_multiple_service($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  skills	SET status = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_service($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  skills	SET status = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function getCategoryList(){
	  $this->db->where(array('parent_id'=>'0'));
		$query = $this->db->get('skills');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	
	}
	
	function getSegmentList(){
 		// $query = $this->db->query("SELECT c.id, c.name, p.name as parentName ,c.image FROM `skills` AS c INNER JOIN `skills` AS p ON c.parent_id = p.id WHERE c.type = '2'");
 		 $query = $this->db->query("SELECT c.id, c.name ,c.image FROM `skills` AS c WHERE c.type = '2'");

   $i = 0;
  $option = array();
 
   
	foreach ($query->result() as $row){
	   $option[] = $row ;
	  
	 }
        //print_r( $option);
        
  	return $option;
 	 
 }
 
 function getServiceList(){
        
      $query = $this->db->query("SELECT c.id, p.name AS category, c.name AS segment, s.name AS service
                                 FROM skills AS c
                                 INNER JOIN skills AS p ON c.parent_id = p.id
                                 INNER JOIN skills AS s ON s.parent_id = c.id
                                 WHERE s.type =3");
      
      
      $i = 0;
  $option = array();
      
	foreach ($query->result() as $row){
	  $option[$row->id] = $row->category .' > '.$row->segment.' > '.$row->service ;
  	   $i++;
	 } 
  	return $option;
 	
       return $row;
 }
 
	
	function getSegmentById($id){
	    $result = array();
		//$where = " WHERE parent.parent_id = 0 AND child.id = '".$id."'";//`status` = '1' ";
		$where = " WHERE parent.parent_id = 0 ";//`status` = '1' ";
		
		//$query_str="SELECT * FROM 	`skills` as parent LEFT JOIN `skills` as child " .$where."  ORDER BY	".$order_field." ".$order_seq." LIMIT ".$start_row.",".$per_page;
		$query_str=$this->db->query("SELECT c.id, c.name, p.name as parentName FROM `skills` AS c WHERE c.type = '2'
						WHERE c.id ='".$id."' ");
  		$row = $query_str->result_object();  
     	return $row;
    		  		
	}
        
        
         function updatetimeslot($id,$time,$timeInterval){
          
	 $query_str="UPDATE  skills SET timeslot = '$time', time_interval = '$timeInterval' WHERE id = '".$id."' ";
         $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
        
        
        function updateServiceImage($actual_image_name,$id){
            //$id = $this->input->post('id');  
			$query_str="UPDATE  skills SET image = '$actual_image_name' WHERE id = '".$id."' ";
			$result=$this->db->query($query_str);
			if($result)
			{
			return true;
			}
			else
			{
			return false;
			}
  	    }
            
            
            
        function custumerFormlist($sid){
		
	        $query_str = "SELECT * FROM `custumer_form_data` WHERE  s_id  = $sid"; 
	
             //   echo $query_str;
		$result=$this->db->query($query_str);
                
                $option=array();
                foreach ($result->result() as $row){
                $option[$sid] = $row->form_data ;
                 
               } 
               //print_r($option);
  	return $option;
        
		//return $result; 		
 	} 
        
         function getServiceListExistForm(){
           $i=0;
           $option = array();
           $query_str = "SELECT s.id FROM  `skills` s INNER JOIN  `custumer_form_data` cfd ON cfd.s_id = s.id
WHERE type = 3 ";
	   $result=$this->db->query($query_str);    
            
         //  print_r($result);
          // die("awdaw");
           
             foreach ($result->result() as $row) { 
 		
                 $query =$this->db->query("SELECT c.id, c.name AS service, p.name AS segment, (SELECT name FROM `skills` WHERE id = p.parent_id) AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
						WHERE c.id ='".$row->id."' "); 
             
            
            
    
     	$row1 = $query->result_object();  
    //  echo $row1[0]->id.' > '.$row1[0]->category.' > '.$row1[0]->segment.' > '.$row1[0]->service."</br>";
     // die('tygere');
    
 
      
	//foreach ($query->result() as $row){
	  $option[$row1[0]->id] = $row1[0]->category .' > '.$row1[0]->segment.' > '.$row1[0]->service ;
  	//   $i++;
	// } 
  	
 	
       //return $row;
      
       
 	 }
         return $option;
       
      
      
 }  
 
        function serviceUpgradeFormlist($sid){
		
	        $query_str = "SELECT * FROM `serviceupgrade_form_data` WHERE  s_id  = $sid"; 
	
             //   echo $query_str;
		$result=$this->db->query($query_str);
                
                $option=array();
                foreach ($result->result() as $row){
                $option[$sid] = $row->form_data ;
                 
               } 
               //print_r($option);
  	return $option;
        
		//return $result; 		
 	} 
        
         function getServiceListExistFormServiceUpgrade(){
           $i=0;
           $option = array();
           $query_str = "SELECT s.id FROM  `skills` s INNER JOIN  `serviceupgrade_form_data` sufd ON sufd.s_id = s.id
WHERE type = 3 ";
	   $result=$this->db->query($query_str);    
            
         //  print_r($result);
          // die("awdaw");
           
             foreach ($result->result() as $row) { 
 		
                 $query =$this->db->query("SELECT c.id, c.name AS service, p.name AS segment, (SELECT name FROM `skills` WHERE id = p.parent_id) AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
						WHERE c.id ='".$row->id."' "); 
             
            
            
    
     	$row1 = $query->result_object();  
    //  echo $row1[0]->id.' > '.$row1[0]->category.' > '.$row1[0]->segment.' > '.$row1[0]->service."</br>";
     // die('tygere');
    
 
      
	//foreach ($query->result() as $row){
	  $option[$row1[0]->id] = $row1[0]->category .' > '.$row1[0]->segment.' > '.$row1[0]->service ;
  	//   $i++;
	// } 
  	
 	
       //return $row;
      
       
 	 }
         return $option;
       
      
      
 }  
 
 
 
 function dropdownlist(){
		/*
            $this->db->from('skills');
            $this->db->where('type', '3'); 
            $this->db->where('service_flag', '0'); 

$result = $this->db->get();
$return = array();
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['id']] = $row['name'];
}
*/		   $query_str = "SELECT id  FROM `skills` WHERE type = 3 and service_flag='0'";
		
		$result=$this->db->query($query_str);
                $return = array('0'=>'select');
            if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
            $return[$row['id']] = $row['id'];
            }
			//print_r($return);
		return $return; 		
 	}
	}
	
	function updateServiceOrder($count,$parent_id,$id){
	  $query = "UPDATE skills SET order_by = " . $count . " WHERE id = " . $id ." and parent_id =".$parent_id;
     $result=$this->db->query($query);
  		//if($result){return true; }else{ return false; }
  	}
	
   ############################################ End of Message #####################################
   
}
?>