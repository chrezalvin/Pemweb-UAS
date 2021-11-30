<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {

        public function __construct() 
        {
            parent::__construct();
            // if(empty($this->session->user_id))
            //     redirect('login');
            // else if($this->session->role != 'admin')
            //     redirect('user');

            $this->load->library('grocery_CRUD');

            $this->data['jquery'] = $this->load->view('assets/jquery', NULL, TRUE);
            $this->data['bootstrap'] = $this->load->view('assets/bootstrap', NULL, TRUE);
            $this->data['navbar'] = $this->load->view('templates/navbar', [
                'username' => $this->session->username,
                'role' => $this->session->role
            ], TRUE);
        }

        public function index()
        {
            redirect('admin/users');
        }

        public function users()
        {
            $crud = new grocery_CRUD();

            $crud->set_table('users')
                ->columns('username', 'email', 'role');
            
            $crud->display_as('username', 'Username');
            $crud->display_as('email', 'Email');
            $crud->display_as('role', 'Role');

            $crud->fields('username', 'email', 'role');
            $crud->required_fields('username', 'email', 'role');

            $crud->callback_edit_field('role', function($value, $primary_key){
                return form_dropdown('role', [
                    'admin' => 'admin',
                    'user' => 'user'
                ], $value);
            });
            $crud->callback_edit_field('email', function($value, $primary_key){
                return form_input('email', $value);
            });

            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_print();

            $this->data['crud'] = get_object_vars($crud->render());

            $this->load->view('pages/admin/user_list', $this->data);
        }

        public function facilities()
        {
            $crud = new grocery_CRUD();

            $crud->set_table('facilities')
                ->columns('image', 'name');
            
            $crud->display_as('name', 'Name');
            $crud->display_as('image', 'Image');

            $crud->set_field_upload('image', 'assets/uploads');

            $crud->fields('name', 'image');
            $crud->required_fields('name', 'image');

            $this->data['crud'] = get_object_vars($crud->render());

            $this->load->view('pages/admin/facility_list', $this->data);
        }

        public function requests()
        {
            $crud = new grocery_CRUD();

            $crud->set_table('requests')
                ->columns('requester', 'facility', 'date', 'start_time', 'end_time');

            $crud->display_as('requester', 'Requester');
            $crud->display_as('facility', 'Facility');
            $crud->display_as('date', 'Date');
            $crud->display_as('start_time', 'Start');
            $crud->display_as('end_time', 'End');

            $crud->unset_edit();
            $crud->unset_add();
            $crud->unset_read();
            $crud->unset_print();

            $this->data['crud'] = get_object_vars($crud->render());

            $this->load->view('pages/admin/request_list', $this->data);
        }
    }