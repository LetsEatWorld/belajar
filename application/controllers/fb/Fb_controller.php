<?php
    class Fb_controller extends CI_Controller {
        function __construct()
        {
            parent::__construct();
        }
        public function index() {
            $this->load->library('comment');
            $this->get_status();
        }
        public function login() {
            echo "test";
        }
        public function get_status() {
            /*$data['result'] = $this->Fb_Model->select();
            $this->load->view('fb/Fb_home', $data);*/
            $this->load->model('Fb_Model');
            $data['comment'] = $this->Fb_Model->select_comment();
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('Fb_Model');
            $data['result'] = $this->Fb_Model->select_status();

            $this->form_validation->set_rules('status','Status', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('fb/Fb_home', $data);
            } else {
                $this->load->helper('date');
                $status = $this->input->post('status');
                //unset($_POST['status']);
                $this->Fb_Model->insert_status($status, date('Y-m-d H:i:s'));
                $this->load->view('fb/Fb_home', $data);
                //print_r($data);
            }
        }
        public function get_comment() {
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('Fb_Model');
            $data['comment'] = $this->Fb_Model->select_comment();

            $this->form_validation->set_rules('comment','Comment', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('fb/Fb_home', $data);
            } else {
                $this->load->helper('date');
                $comment = $this->input->post('comment');
                //unset($_POST['status']);
                $this->Fb_Model->insert_comment($comment, date('Y-m-d H:i:s'));
                $this->load->view('fb/Fb_home', $data);
                //print_r($data);
            }
        }
    }
?>