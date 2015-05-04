<?php
class Commonmodel extends CI_Model {
	 
	function __construct()
	{
		parent :: __construct();		
	}	
	function get_country_list()
    {   	  
		$this->db->from('countries');
		$this->db->order_by('country_name');
		$this->db->where(array('status'=>1));
		$result = $this->db->get();
		$return = array();
		$arr = array();
		if($result->num_rows() > 0){
			$return[''] = 'Select Country';
			foreach($result->result_array() as $row){
			 $return[$row['country_id']] = $row['country_name'];			 
			}
		}		
		return $return;	
    }
	function get_state_list()
    {   	  
		$this->db->from('state');
		$this->db->order_by('state_name');
		$this->db->where(array('status'=>1));
		$result = $this->db->get();
		$return = array();
		$arr = array();
		if($result->num_rows() > 0){
			$return[''] = 'Select State';
			foreach($result->result_array() as $row){
			 $return[$row['state_id']] = $row['state_name'];			 
			}
		}		
		return $return;	
    }
	
	function get_countries()
    {   	  
		$query = $this->db->query('SELECT country_id, country_name FROM countries');
        return $query->result();
    }
	function get_state_by_country($country_id){	
		$query = $this->db->query('SELECT state_id, state_name FROM state Where country_id='.$country_id);      
        $states = array();
		if($query->num_rows() > 0){
			$states[0] = 'Select State';
 			$rows = $query->result();       
            foreach ($rows as $row) {
                $states[$row->state_id] = $row->state_name;
            }	
		}else{
			$states[0] = 'No State';
		}		
       return $states;       
    } 
}
?>