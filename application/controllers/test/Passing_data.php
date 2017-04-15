<?php
    class Passing_data extends CI_Controller {
        function __construct()
        {
            parent::__construct();
        }
        public function index() {
            //$this->load->helper('url');
            $this->load->model('test/Passing_data_model');
            $status = $this->Passing_data_model->select_status();
            /*echo "<pre>";
            print_r($this->Passing_data_model->join_status_comment(151));
            echo "</pre>";*/
            $data['status'] = $status;
            $data['status_comment'] = $this->Passing_data_model->join_status_comment();
            $this->load->view('test/Passing_data_view', $data);
        }
        public function get_status() {
            $this->load->model('test/Passing_data_model');
            //$this->load->helper('url');
            /*$lib = array('form_validation','session');
            $this->load->library($lib);*/
            $this->form_validation->set_rules('status', 'Status', 'required');
            if($this->form_validation->run()==FALSE) {
                redirect('/test/passing_data/');
            } else {
                $this->load->helper('date');
                $status = $this->input->post('status');
                $this->Passing_data_model->insert_status($this->session->user_id, $status, date('Y-m-d H:i:s'));
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
            //$this->load->helper('url');
            /*$lib = array('form_validation','session');
            $this->load->library($lib);*/
            $this->form_validation->set_rules('comment', 'Comment', 'required');
            if($this->form_validation->run()==FALSE) {
                redirect('passdata/'.$id);
            } else {
                $this->load->helper('date');
                $comment = $this->input->post('comment');
                $this->Passing_data_model->insert_comment($this->session->user_id, $comment, date('Y-m-d H:i:s'), $id);
                redirect('passdata/');
            }
        }
        public function del_comment($id) {
            //$this->load->helper('url');
            //$this->load->library('session');
            $this->load->model('test/Passing_data_model');
            //echo $id;
            $this->Passing_data_model->del_comment_where($id);
            $data['status'] = $this->Passing_data_model->select_status_where($this->session->userdata('recent_id'));
            $data['status_comment'] = $this->Passing_data_model->join_status_comment($this->session->userdata('current_status_id'));
            $data['id'] = $this->session->userdata('recent_id');
            //echo $this->session->userdata('recent_id');
            //redirect('/test/passing_data/status_detail/');
            redirect('passdata/'.$this->session->userdata('current_status_id'));
        }
        public function del_status($id) {
            //$this->load->helper('url');
            //$this->load->library('session');
            $this->load->model('test/Passing_data_model');
            //echo $id;
            $this->Passing_data_model->del_status_where($id);
            /*$data['status'] = $this->Passing_data_model->select_status_where($this->session->userdata('recent_id'));
            $data['status_comment'] = $this->Passing_data_model->join_status_comment($this->session->userdata('current_status_id'));
            $data['id'] = $this->session->userdata('recent_id');*/
            //echo $this->session->userdata('recent_id');
            //redirect('/test/passing_data/status_detail/');
            redirect('passdata');
        }
        public function status_detail(/*$id*/) {
            //$this->load->helper('url');
            //$this->load->library('session');
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
        public function signin () {
            /*$this->load->library('form_validation');*/
            $this->load->model('test/Passing_data_model');
            $id = $this->input->post('userid');
            $pass = $this->input->post('pass');
            $this->form_validation->set_rules('userid', 'User ID', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $row = $this->Passing_data_model->select_user_where($id, md5($pass)); //MD5
            /*echo $id . " " . $pass . "<br>";
            echo count($row);*/
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('test/Passing_data_signin');
            } else {
                if (count($row) > 0) {
                    $this->session->set_userdata(array('logged_in' => TRUE, 'user_id' => $id));
                    redirect('passdata');
                } else {
                    //$this->load->view('test/Passing_data/signin_page');
                    $this->load->view('test/Passing_data_signin_error');
                }
            }
        }
        public function signup() {
            /*$this->load->library('form_validation');*/
            $this->load->model('test/Passing_data_model');
            $this->form_validation->set_rules('userid', 'User ID', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|matches[pass]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('test/Passing_data_signup');
            } else {
                $id = $this->input->post('userid');
                $name = $this->input->post('name');
                $pass = $this->input->post('pass');
                $this->Passing_data_model->insert_user($id, $name, md5($pass)); //MD5
                redirect('passdata');
            }
        }
        public function signout() {
            $this->session->unset_userdata(array('logged_in','user_id'));
            redirect('passdata');
        }
        public function login_page() {
            $this->load->view('test/Passing_data_signin');
        }
    }
?>