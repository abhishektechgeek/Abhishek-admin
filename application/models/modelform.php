<?php
class Modelform extends CI_Model {

   // var $name   = '';
   // var $content = '';
   // var $date    = '';

   

       function __construct()
    {
            // Call the Model constructor
            parent::__construct();
    }

    function get_state(){
        $query = $this->db->query('SELECT country_id, country_name FROM countries');
        return $query->result();
    }
	
	function add_all(){
                $v_state = $this->input->post('f_state');
        $v_membername = $this->input->post('f_membername');
    
        $data = array(
                    'id' => NULL,
                    'state' => $v_state,
                'member_name' => $v_membername,
        );

        $this->db->insert('members', $data);
    }  
	
function get_cities_by_state ($state){
		//$this->db->select('zone_id, zone_name');
		//$this->db->where('zone_country_id', $state);
		 // $query = $this->db->get('zones');
		 $query = $this->db->query('SELECT zone_id, zone_name FROM zones Where zone_country_id='.$state);
      
        $cities = array();
 		$zones = $query->result();       
            foreach ($zones as $city) {
                $cities[$city->zone_id] = $city->zone_name;
            }			
            return $cities;
       
    } 

	   
   
}
?>