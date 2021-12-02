<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_facilities() 
    {
        $query = $this->db->get('facilities');
        return $query->result_array();
    }

    public function get_facility($id) 
    {
        $query = $this->db->get_where('facilities', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_all_facilities_by_name() 
    {
        $this->db->select('name, id');
        $query = $this->db->get('facilities');
        return $query->result_array();
    }
}