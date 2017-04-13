<?php
    class Passing_data extends CI_Controller {
        function __construct()
        {
            parent::__construct();
        }
        public function index() {
            $this->load->helper('url');
            $this->load->model('test/Passing_data_model');
            $status = $this->Passing_data_model->select_status();
            echo "<pre>";
            print_r($this->Passing_data_model->join_status_comment(151));
            echo "</pre>";
            $data['status'] = $status;
            $this->load->view('test/Passing_data_view', $data);
        }
        public function get_status() {
            $this->load->model('test/Passing_data_model');
            $this->load->helper('url');
            $lib = array('form_validation','session');
            $this->load->library($lib);
            $this->form_validation->set_rules('status', 'Status', 'required');
            if($this->form_validation->run()==FALSE) {
                redirect('/test/passing_data/');
            } else {
                $this->load->helper('date');
                $status = $this->input->post('status');
                $this->Passing_data_model->insert_status($status, date('Y-m-d H:i:s'));
                redirect('passdata');
            }
        }
        public function get_comment($id) {
            /*$this->load->model('test/Passing_data_model');

            $this->load->helper('url');
            $lib = array('form_validation','session');
            $this->load->library($lib);
            $data['comment'] = $this->Passing_data_model->select_comment_where($id);
            $data['status'] = $this->Passing_data_model->select_status_where($id);

            $data['status_comment'] = $this->Passing_data_model->join_status_comment($this->session->userdata('recent_id'));
            $this->form_validation->set_rules('comment','Comment', 'required');
            if($this->form_validation->run() == FALSE) {
                redirect('/test/passing_data/get_comment/'.$id);
            } else {
                $this->load->helper('date');
                $comment = $this->input->post('comment');
                $this->Passing_data_model->insert_comment($comment, date('Y-m-d H:i:s'), $id);
                redirect('/test/passing_data/get_comment/'.$id);
            }*/
            $this->load->model('test/Passing_data_model');
            $this->load->helper('url');
            $lib = array('form_validation','session');
            $this->load->library($lib);
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            if($this->form_validation->run()==FALSE) {
                redirect('test/Passing_data/status_detail/'.$id);
            } else {
                $this->load->helper('date');
                $comment = $this->input->post('comment');
                $this->Passing_data_model->insert_comment($comment, date('Y-m-d H:i:s'), $id);
                redirect('/test/passing_data/status_detail/'.$id);
            }
        }
        public function del_comment() {
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('test/Passing_data_model');
            $id = $this->uri->segment(4);
            //echo $id;
            $this->Passing_data_model->del_comment_where($id);
            $data['status'] = $this->Passing_data_model->select_status_where($this->session->userdata('recent_id'));
            $data['status_comment'] = $this->Passing_data_model->join_status_comment($this->session->userdata('current_status_id'));
            $data['id'] = $this->session->userdata('recent_id');
            //echo $this->session->userdata('recent_id');
            redirect('/test/passing_data/status_detail/'.$this->session->userdata('current_status_id'));
        }
        public function status_detail(/*$id*/) {
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('test/Passing_data_model');
            //simpan status_id
            /*$array = array(
                'current_status_id' => $id
            );
            $this->session->set_userdata($array);*/
            /*echo "<pre>";
            print_r($this->Passing_data_model->join_status_comment($this->session->userdata('recent_id')));
            echo "</pre>";*/
            $data['status_comment'] = $this->Passing_data_model->join_status_comment($this->session->userdata('current_status_id'));

            $this->load->view('test/status_detail_view', $data);
        }
    }
?>