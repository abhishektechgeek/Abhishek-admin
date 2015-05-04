<?php
class Usermodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('pagingmodel');
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
		
	function getSpecificUser(){
		
		  $company_id = $this->session->userdata('company_id');
		  $user_id = $this->session->userdata('user_id');
		  $query      = "SELECT U.* FROM user AS U INNER JOIN user_company AS UC ON U.user_id = UC.user_id WHERE UC.company_id = '{$company_id}' AND  U.user_id = '{$user_id}'";
		  $resultRow	= $this->db->query($query);
		  return $resultData	= $resultRow->result();
			
		}//end of getSpecificUser...
		
	function getUserById($user_id){
			$company_id = $this->session->userdata("company_id");
			$admin_id   = $this->session->userdata("admin_id");
			$query      = "SELECT U.* FROM user AS U INNER JOIN user_company AS UC ON U.user_id = UC.user_id WHERE UC.company_id = '{$company_id}' AND UC.admin_id = '{$admin_id}' AND U.user_id = '{$user_id}'";
			$resultRow	= $this->db->query($query);
			return $resultData	= $resultRow->result();
		}
		
		
		
		
	function showAllUsers($TOTAL_RECORDS = '',$EDIT_MODE = ''){
		//echo "<pre>";print_r($this->session->all_userdata());echo "</pre>";
		$company_id = $this->session->userdata("company_id");
		$admin_id   = $this->session->userdata("admin_id");
		
		if($TOTAL_RECORDS != ''){
			 $query = "SELECT U.* FROM user AS U INNER JOIN user_company AS UC ON U.user_id = UC.user_id WHERE UC.company_id = '{$company_id}' AND UC.admin_id = '{$admin_id}'";
			 $resultRow	= $this->db->query($query);
			 return $resultRow->num_rows();
			}
		
		$app_con = '';
		if($EDIT_MODE != '')$app_con = "LIMIT ".$this->pagingmodel->getOffset().",".$this->pagingmodel->getLimit();
		$query = "SELECT U.* FROM user AS U INNER JOIN user_company AS UC ON U.user_id = UC.user_id WHERE UC.company_id = '{$company_id}' AND UC.admin_id = '{$admin_id}' ".$app_con;
		
		$resultRow	= $this->db->query($query);
		
		// Debug Pagination param status .......
		//$this->pagingmodel->debug();
		
		return $resultData	= $resultRow->result();
		
	}
	
	function _changeUserStatus($id,$status){
	       
		    $where = "user_id = '{$id}'";
			$dataToUpdate['status'] = $status;
			$this->db->where($where);
			$this->db->update('user',$dataToUpdate);
			if($status == 1)echo 'Active';
			if($status == 0)echo 'InActive';
	  }
	
	function _deleteselecteduser($ids){
	   
	   $ids = str_replace(':',',',$ids);
	   $where1 = $where = "user_id IN ({$ids})";
	   
	   $this->db->delete('user',$where);
	   $this->db->delete('user_company',$where);
	   
	   echo 1;
	   
	 }
	
	function getUserDetail($id='')
	{
		$wr="1";
		if($id!='')
		$wr.=" AND company_id='".$id."'";
		$query = "select * from company where {$wr}";
		$resultRow	= $this->db->query($query);
		return $resultData	= $resultRow->result();
		
		$wr.=" AND cmpny.company_id='".$id."'";
		//$query = "select cmpny.*,cmpnyAdmin.first_name,cmpnyAdmin.last_name,cmpnyAdmin.dob,cmpnyAdmin.address,cmpnyAdmin.city,cmpnyAdmin.state,cmpnyAdmin.password,cmpnyAdmin.country_id,cmpnyAdmin.postal_code,cmpnyAdmin.fax,cmpnyAdmin.created_date,cmpnyAdmin.admin_id,cmpnyAdmin.status,cmpnyAdmin.alt_email,cmpnyAdmin.telephone from company as cmpny inner join company_admin as cmpnyAdmin on cmpny.company_id=cmpnyAdmin.company_id where $wr";
		$query = "select cmpny.*,cmpnyAdmin.* from company as cmpny inner join company_admin as cmpnyAdmin on cmpny.company_id=cmpnyAdmin.company_id where $wr";
		$resultRow	= $this->db->query($query);
		return $resultData	= $resultRow->result();
	}
	
	function getUserDetail1($id='')
	{
		$wr="1";
		if($id!='')
		//$query = "select cmpny.*,cmpnyAdmin.first_name,cmpnyAdmin.last_name,cmpnyAdmin.dob,cmpnyAdmin.address,cmpnyAdmin.city,cmpnyAdmin.state,cmpnyAdmin.password,cmpnyAdmin.country_id,cmpnyAdmin.postal_code,cmpnyAdmin.fax,cmpnyAdmin.created_date,cmpnyAdmin.admin_id,cmpnyAdmin.status,cmpnyAdmin.alt_email,cmpnyAdmin.telephone from company as cmpny inner join company_admin as cmpnyAdmin on cmpny.company_id=cmpnyAdmin.company_id where $wr";
		$query = "select cmpny.*,cmpnyAdmin.* from company as cmpny inner join company_admin as cmpnyAdmin on cmpny.company_id=cmpnyAdmin.company_id where $wr";
		$resultRow	= $this->db->query($query);
		return $resultData	= $resultRow->result();
	}
	
	function allUsers()
	{
		$query = $this->db->get('company');
		return $query->num_rows();
	}
	function blockedUsers()
	{
		$this->db->where('status',0);
		$query = $this->db->get('company');
		return $query->num_rows();
	}
	
	function activeUsers()
	{
		$this->db->where('status',1);
		$query = $this->db->get('company');
		return $query->num_rows();
	}
	
    
    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    function checkEmailExists($email){
		  //echo $sql = "SELECT * FROM `company_admin` WHERE `email` = '{$email}'";
		  $this->db->where('email',$email);
		  $query = $this->db->get('company_admin');
		  return $query->num_rows();
		  
		}
		
  function changeUserStatus($id,$status){
	       
		    $where = "admin_id = '{$id}'";
			$dataToUpdate['status'] = $status;
			$this->db->where($where);
			$this->db->update('company_admin',$dataToUpdate);
			if($status == 1)echo 'Active';
			if($status == 0)echo 'InActive';
	  }
	  
 function deleteselecteduser($ids){
	   
	   $ids = str_replace(':',',',$ids);
	   $where1 = $where = "admin_id IN ({$ids})";
	   $this->db->select('code');
	   $this->db->where($where1);
	   $query = $this->db->get('company_admin');
	   $rs = $query->result();
	   foreach($rs as $v){
		     $sql = "delete from `company` where `code` = '{$v->code}'";
		     $this->db->query($sql);
		   }
	   $this->db->delete('company_admin',$where);
	   $this->db->delete('com_admin',$where);
	   
	   echo 1;
	   
	 }

  ############################################ Starts of Message #####################################
   
   function compose(){
	   
	   		
	   
	   }
   
   function getConnectedCompanyIds($company_id){
	        
			$query = "SELECT C.*  FROM company AS C
	INNER JOIN  company2company AS C2C  ON (C.company_id = C2C.from_company OR C.company_id = C2C.to_company) AND (C2C.to_company = '{$company_id}' OR C2C.from_company = '{$company_id}') AND C2C.status = '1' AND C.company_id <> '{$company_id}'";
	        $resultRow	= $this->db->query($query);
			$totalRecord = $resultRow->num_rows();
			$arr = array();
			if($totalRecord > 0):
				foreach($resultRow->result() as $value):
				  array_push($arr,$value->company_id);
				endforeach;
			endif;
		 return $arr;	
	   }
	   
   function mailtoDDL(){
	 		$company_id = $this->session->userdata("company_id");
			$admin_id   = $this->session->userdata("admin_id");
			$user_id = $this->session->userdata('user_id');
			$companyids = $this->getConnectedCompanyIds($company_id);
			if(!empty($companyids))
				$cmpids = implode(',',$companyids);
			else
			  $cmpids = -1;
			
           $query = "SELECT U.*,UC.company_id FROM user AS U INNER JOIN user_company AS UC ON U.user_id = UC.user_id WHERE UC.company_id IN({$cmpids}) AND U.user_id <> {$user_id}";
			$q = $this->db->query($query);
			
			$return = array();
			$return[''] = 'Please Select';
			
			if($q->num_rows > 0):
				$rs = $q->result();
				$user_name = '';
				foreach($rs as $value):
				  $user_name = $value->first_name.'&nbsp;'.$value->last_name;
				  $return[$value->user_id.':'.$value->country_id] = $user_name;
				endforeach;
			endif;
			
			return $return;
	   }
	
	function companyDDL(){
	   
			$company_id = $this->session->userdata("company_id");
			
            $query = "SELECT C.* FROM company as C INNER JOIN company2company AS C2C ON C.company_id = C2C.from_company OR C.company_id = C2C.to_company WHERE  (C2C.from_company = {$company_id} OR C2C.to_company = {$company_id}) AND C.company_id <> {$company_id} AND C2C.status = 1";
			$q = $this->db->query($query);
			
			$return = array();
			$return[''] = 'Please Select';
			
			if($q->num_rows > 0):
				$rs = $q->result();
				foreach($rs as $value):
				  $return[$value->company_id.':'.$value->country_id] = $value->searchable?$value->company_name:$value->code;
				endforeach;
			endif;
			
			return $return;
	   }
	   
	function messageTypeDDL(){
		    $query = "SELECT * FROM message_type WHERE status = '1' ORDER BY system_code";
			$q = $this->db->query($query);
			
			$return = array();
			$return[''] = 'Please Select';
			
			if($q->num_rows > 0):
				$rs = $q->result();
				foreach($rs as $value):
				  $return[$value->message_type_id.':'.strtolower($value->system_code)] = $value->system_code;
				endforeach;
			endif;
			
			return $return;
		}
	
	function loadtemplate(){
	  extract($this->input->post());
	  $filename = substr($str,strpos($str,':')+1,strlen($str));
	  echo $this->load->view('message_template/'.$filename);
	}
  
  function getNotificationInbox(){
		  //echo "2";
		  $this->db->where('to',$this->session->userdata("user_id"));
		  $this->db->where('status',0);
		  $this->db->where('isDeleted','0');
		  $this->db->where('composed_for','USER');
		  $q = $this->db->get('inbox');
		  echo $q->num_rows();
	}

  function approvemessage(){
	     extract($this->input->post());
	     $this->db->where('inbox_id',$inbox_id);
		 $this->db->where('approved_by',$advuserid);
		 $rs = $this->db->get('inbox_messages_approval');
		 
		 $arrInbox = array();
		 $arrInbox['inbox_id'] = $inbox_id;
		 $arrInbox['advuserid'] = $advuserid;
		 $arrInbox['approval_required'] = 'NOT_REQUIRED';
		
		 if($rs->num_rows() > 0){
			 $this->db->set('msg',$msg);
			 $this->db->where('inbox_id',$inbox_id);
		     $this->db->where('approved_by',$advuserid);
			 $this->db->set('updated_date',date('Y-m-d h:i:s'));
			 $this->db->update('inbox_messages_approval');
			 
			 $this->db->where('id',$inbox_id);
			 $this->db->set('inbox_messages_approval_id',$advuserid);
			 $this->db->set('inbox_messages_approval_id',$advuserid);
			 $this->db->update('inbox');
			 
			 $this->updateInbox($arrInbox);
			 
		 }else{
			 $this->db->set('inbox_id',$inbox_id);
		     $this->db->set('approved_by',$advuserid);
			 $this->db->set('msg',$msg);
			 $this->db->set('type','USER');
			 $this->db->insert('inbox_messages_approval'); 
			 
			 $this->updateInbox($arrInbox);
			 
		 }
		 
		 echo "Message approved.";
	  }
	 
	function updateInbox($arrInbox = array()){
		     $this->db->where('id',$arrInbox['inbox_id']);
			 $this->db->set('inbox_messages_approval_id',$arrInbox['advuserid']);
			 $this->db->set('approval_required',$arrInbox['approval_required']);
			 $this->db->update('inbox');
		}
   ############################################ End of Message #####################################
   
}
?>