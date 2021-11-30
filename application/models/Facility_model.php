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
}