<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function login($email, $password)
        {
            $hash = hash('sha256', $password);
            $this->db->where('password', $hash);
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            return $query->row_array();
        }

        public function register()
        {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => hash('sha256', $this->input->post('password')),
                'role' => 'user'
            );
            return $this->db->insert('users', $data);
        }

        public function email_check($email)
        {
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            return $query->row_array();
        }
    }