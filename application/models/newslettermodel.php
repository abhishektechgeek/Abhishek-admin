<?php
class Newslettermodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
     }
 	 
		
	function newsletter(){
	  		 
  		return false; 		
	}
	
	function newsletter_send(){
 	        if($this->input->post('template') == 1){
			   $message = $this->fatch_email_template('christmas');
 			   $message =  $message[0]->content;
 			   }else if($this->input->post('template') == 2){
			   $message = $this->fatch_email_template('newyear');
 			   $message =  $message[0]->content;
 			   }
 			 else{
	            $message = $this->input->post('message');
			 }
				$title = $this->input->post('title');
				$main_content = $this->input->post('main_content');   
				$side_content = $this->input->post('side_content');
				$offers = $this->input->post('offers');
				
				$message = str_replace('{title}',$title,$message);
				$message = str_replace('{content}',$main_content,$message);
				$message = str_replace('{side_content}',$side_content,$message);
				$message = str_replace('{offer}',$offers,$message);
				  
 			 $subject = $this->input->post('Subject');
			 $to = $this->input->post('to');
			 
 	        $this->load->library('email');
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
			);
 			
			$query_str = "SELECT u.email FROM users u INNER JOIN users_level ul ON u.id = ul.user_id WHERE type = '".$to."'";
 	        $result=$this->db->query($query_str);
		    $row = $result->result_array();
			 
			foreach($row as $res){
				$this->email->initialize($config);
				$this->email->from('tashmeetkchawla@virtualemployee.com', 'Skookum Admin');
 				$this->email->to($res['email']); 
 				$this->email->subject($subject);
				$this->email->message($message);
				$res = $this->email->send();
				 
			 }
 		 
	  		 
  		 return true; 		
	}
	 
	
	function fatch_email_template($title = 'christmas') {
		$result = array();							
		$query_str="SELECT 	* from `email_templates` 	WHERE title ='".$title."'";					
		$query=$this->db->query($query_str);		
		if($query->num_rows() > 0){
			$row=$query->result();
			return $row;	
		}else{
			return $row;
		}		
	} 
	
	 
   ############################################ End of Message #####################################
   
}
?>