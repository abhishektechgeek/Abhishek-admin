<?php
class Adminmodel extends CI_Model {

 
    var $username = '';
    var $password    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function signin($data)
    {
        $this->username   = $data['username'];
		$this->password   = $data['password'];        
        $this->db->insert('admin', $this);
    } 
	
	
	public	function nocache()
    {
        $CI =& get_instance();
	    $CI->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        $CI->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
        $CI->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
        $CI->output->set_header('Pragma: no-cache');
    }
	function adminsignin($user_name,$password,$cookie = false) {
  	 $str="select * from admin where `email`='".$user_name."' and `password`='".$password."' "; 
		$query=$this->db->query($str);		
		if ($query->num_rows()>0){
			foreach ($query->result() as $row) {
             	 $result=$row->id;
				/*$this->session->set_userdata(array('adminId' => $row->id));*/
 				$this->session->set_userdata(array('adminId' => $row->id,'level' => $row->level,'group_id' => $row->group_id));
            }				
			return $result;			
		}else{
			$this->session->set_userdata(array('error'=>'Wrong username/passwrod'));
			return false;		
		}		
	}
	function passchange(){
		$res = '';		
		$data['password']=$this->input->post('password');				
		$where['id']=$this->session->userdata('adminId');
		$this->db->where($where);
		$res= $this->db->update('admin', $data);
		if ($res){
			return true;
		}else{
			return false;
		}	
	}	
	function fatch_admin_profile($id) {
		$result = array();							
		$query_str="SELECT 	* from admin 	WHERE id='".$id."'";					
		$query=$this->db->query($query_str);		
		if($query->num_rows() > 0){
			$row=$query->result();
			return $row;	
		}else{
			return $row;
		}		
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
	
	function save_seller(){
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
	function getUserByEmail($email){
	$id = $this->input->post('id');
	if(isset($id)){
	 $query_str = "SELECT id FROM users WHERE email = '".$email."' AND id != '".$this->input->post('id')."'";
	}else{
	$query_str = "SELECT id FROM users WHERE email = '".$email."'";
	}
	    
	    $result=$this->db->query($query_str);
		$row = $result->result_array();
		
		if(count($row[0]) > 0){
		  return true;
		}else {
		return false;
		}
  	}
	
	function save_user(){
 		$res = '';	
		$id = 	$this->input->post('id');	
		$data=array(    	
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'gender'=>$this->input->post('gender'),
   			'email'=>$this->input->post('email'),
			'birthday'=>$this->input->post('birthday'),
			'password'=>$this->input->post('password')
			 
		);
		
		
  		
		if($id > 0){
 		$res = '';	
 		$where['id']=$this->input->post('id');		
		$this->db->where($where);
		$res= $this->db->update('users', $data);
 		 
		$query_str =" UPDATE  users_level	SET type = '".$this->input->post('usertype')."' WHERE user_id = '".$this->input->post('id')."' ";
	    $res=$this->db->query($query_str);
		
			
		if($res){  return true; }else{ return false; }
 	    }
	else{
  		$res= $this->db->insert('users', $data);
		$lastInserId = $this->db->insert_id();	
		$data2=array(    
 			'user_id'=>$lastInserId,
			'type'=>'3',
			'status'=>'1'
  		);
		
		$res2 = $this->db->insert('users_level', $data2);
		if($res){  
		    $message = '<h2> Hello '.$data['first_name'].'  '.$data['last_name'].'</h2><br/>';
			$message .= '<p>Thank you for registering at Skookusmobile.com.</p><br/>';
			$message .= '<p>Now you may login and start Using our Services.</p><br/>';
			$message .= '<p>If you have any questions, or need any help simply use our support area in your account.</p><br/>';
			$message .= '<p>We look forward to you becoming a part of Skookummobile.</p><br/><br/>';
 			$message .= '<p>Kindest Regards,<br/> Skookummobile and the Team';
 			$this->load->library('email');
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
			);
			$this->email->initialize($config);
			$this->email->from('tashmeetkchawla@virtualemployee.com', 'Skookum Admin');
			$this->email->to($data['email']); 
			$this->email->subject('Activate Your Account NOW!');
			$this->email->message($message);	
			$res = $this->email->send();
			if($res == true){
			  $query_str =" UPDATE  users	SET isEmail = '1' WHERE id = '".$lastInserId."' ";
	          $res=$this->db->query($query_str);
 			  } 
 		     return true; }else{ return false; }
		
		$query_str =" UPDATE  users_level	SET type = '".$this->input->post('usertype')."' WHERE user_id = '".$this->input->post('id')."' ";
	    $res=$this->db->query($query_str);
		if($res){  return true; }else{ return false; }
	  }
	
	
	}
	
 	
	function inactiveUser($id){
	 $query_str="UPDATE  users	SET status = '0' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
	}
	
	function activeUser($id){
	 $query_str="UPDATE  users	SET status = '1' WHERE id = '".$id."' ";
     $result=$this->db->query($query_str);
  		if($result){return true; }else{ return false; }
  	}
	
	function deleteUser($id){
	  	$where['id']=$id;	
  		$this->db->where($where);
		$res= $this->db->delete('users');	
  		if($res){return true; }else{ return false; }
  	}
	
	
	function userlist($page,$offset,$type='0',$like = false){
  	    $result = array();
		$gender = '';
		if(strcasecmp($this->input->post('gender'), 'male') == 0 or strcasecmp($this->input->post('gender'), 'm') == 0)  
		   $gender = 'm';
		   
		 if(strcasecmp($this->input->post('gender'), 'female') == 0 or strcasecmp($this->input->post('gender'), 'f') == 0)  
		   $gender = 'f';
		   
		
		if($like == false)
		   $where = "WHERE 1";
		else
		   $where = " WHERE (first_name LIKE '%".$this->input->post('first_name')."%' AND last_name  LIKE '%".$this->input->post('last_name')."%' AND birthday  LIKE '%".$this->input->post('birthday')."%' AND gender  LIKE '%".$gender."%' AND email  LIKE '%".$this->input->post('email')."%')";
		
		if($type=='0')
 		   $where .= " LIMIT ".$page.",".$offset."";
		else 
		   $where .= " AND u2.type = '".$type."' LIMIT ".$page.",".$offset."";
		
    	   $query_str="SELECT u1.* FROM 	`users` u1 INNER JOIN users_level u2 ON u1.id = u2.user_id ".$where;   
		$result=$this->db->query($query_str);
  		return $result; 		
	}  
 	
	 
	function user_data_by_id($user_id){		
		$this->db->where(array('id'=>$user_id));
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}else{
			$row="";
		}
		return $row;
	}
	
	function approve_multiple_user($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  users	SET status = '1' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function unapprove_multiple_user($ids){
 	   $query_str = '';
	   $result=false;
        foreach($ids as $id){ 
			 $query_str =" UPDATE  users	SET status = '0' WHERE id = '".$id."' ";
			 $result=$this->db->query($query_str);
		 }
   		if($result){return true; }else{ return false; }
	}
	
	function sendEmail(){
 	
  	}
	
	function delete_multiple_user($ids){
 	 
        $where['id']=$id;	
  		$this->db->where_in('id',$ids);
		$res= $this->db->delete('users');	
  		if($res){return true; }else{ return false; }
	}
	
	function forgetpassword($email){
 	$result = array();							
	$query_str="SELECT 	* from admin 	WHERE email='".$email."'";					
		$query=$this->db->query($query_str);		
		if($query->num_rows() > 0){
			$row=$query->result();
			$password = $row[0]->password;
			if($this->mailresetlink($email,$password))
			   return true;
			else
			   return false;
 		}else{
		 
			return false;
		}		
 	}
	
	function mailresetlink($to,$token)
    {
        $subject = "Password Reset";
        $message = '
        <html>
        <head>
        <title>Password Reset</title>
        </head>
        <body>
        <p>Your Password is : '. $token.'</p>

        </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: Password Reset <noreply@domain.com>' . "\r\n";
        
        if(mail($to,$subject,$message,$headers))
        {
           return true;
        }else{
		   return false;
		}
		
    }
	
	function is_modify_permission(){
	     $group_id= $this->session->userdata('group_id');
		 $query4 = $this->db->query("SELECT gu.access_permission ,gu.modify_permission  FROM `group_user_map` gu INNER JOIN admin a ON a.group_id = gu.group_id WHERE a.group_id = '".$group_id."' ");
		 $row4 = $query4->result_array();
		 $access_permission = array();
		 $modify_permission = array();
		 foreach($row4 as $key=>$value){
			 $access_permission[] = $value['access_permission'];
			 $modify_permission[] = $value['modify_permission'];
		 }
						 
	  $menu_id = $this->session->userdata('menu_id'); 
		if(in_array($menu_id,$modify_permission)){
		return true;
		}
		
		return false;
   }
   
   function getAccessMenuList(){
		 $group_id= $this->session->userdata('group_id');
		 $query3 = $this->db->query("SELECT menu_id,title FROM `menu` ");
		 $row3 = $query3->result_array();
	   
		$query4 = $this->db->query("SELECT gu.access_permission ,gu.modify_permission  FROM `group_user_map` gu INNER JOIN admin a ON a.group_id = gu.group_id WHERE a.group_id = '".$group_id."' ");
	   $row4 = $query4->result_array();
 	   $access_permission = array();
		 foreach($row4 as $key=>$value){
			 $access_permission[] = $value['access_permission'];
		 }
 	   return $access_permission;
	
	}

   
}
?>