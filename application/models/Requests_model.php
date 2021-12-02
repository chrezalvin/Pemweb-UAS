<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Requests_model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function get_request_rule()
        {
            $rule = array(
                'facility_id' => array(
                    'field' => 'facility_id',
                    'label' => 'Facility ID',
                    'rules' => 'trim|required|numeric'
                ),
                'date' => array(
                    'field' => 'date',
                    'label' => 'Date',
                    'rules' => 'trim|required'
                ),
                'start_time' => array(
                    'field' => 'start_time',
                    'label' => 'Start Time',
                    'rules' => 'trim|required'
                ),
                'end_time' => array(
                    'field' => 'end_time',
                    'label' => 'End Time',
                    'rules' => 'trim|required'
                )
            );

            return $rule;
        }

        public function add_request() {
            $data = array(
                'requester_id' => $this->session->user_id,
                'facility_id' => $this->input->post('facility_id'),
                'date' => $this->input->post('date'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time'),
            );

            return $this->db->insert('requests', $data);
        }
    }