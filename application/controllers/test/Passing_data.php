<?php
    class Passing_data extends CI_Controller {
        function __construct()
        {
            parent::__construct();
        }
        public function index() {
            //$this->load->helper('url');
            $this->load->model('test/Passing_data_model');
            $status = $this->Passing_data_model->join_status_user();
            /*echo "<pre>";
            print_r($this->Passing_data_model->join_status_comment(151));
            echo "</pre>";*/
            $data['status'] = $status;
            $data['status_comment'] = $this->Passing_data_model->join_status_comment_user();
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
                $this->Passing_data_model->insert_status($this->session->email, $status, date('Y-m-d H:i:s'));
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
                $this->Passing_data_model->insert_comment($this->session->email, $comment, date('Y-m-d H:i:s'), $id);
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
            $data['status_comment'] = $this->Passing_data_model->join_status_comment_user($this->session->userdata('current_status_id'));
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
        public function edit_comment($id) {
            $this->load->model('test/Passing_data_model');
            $comment = $this->input->post('comment');
            $this->form_validation->set_rules('comment','Comment','required');
            if ($this->form_validation->run() == FALSE) {
                redirect('test/Passing_data/edit_comment_page');
            } else {
                $this->Passing_data_model->edit_comment($id, $comment, date('Y-m-d H:i:s'));
                redirect('passdata');
            }
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
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $this->form_validation->set_rules('email', 'Your email', 'required');
            $this->form_validation->set_rules('pass', 'Your password', 'required');
            $row = $this->Passing_data_model->select_user_where($email, md5($pass)); //MD5
            /*echo $id . " " . $pass . "<br>";
            echo count($row);*/
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('test/Passing_data_signin');
            } else {
                if (count($row) > 0) {
                    $this->session->set_userdata(array('logged_in' => TRUE, 'email' => $email));
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
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]', array('Please enter your Email', 'Your email have been registered'));
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|matches[pass]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('test/Passing_data_signup');
            } else {
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $pass = $this->input->post('pass');
                $this->Passing_data_model->insert_user($email, $name, md5($pass)); //MD5
                redirect('passdata');
            }
        }
        public function create_db() {
            $this->load->dbforge();
            $this->form_validation->set_rules('db_name', 'Database Name', 'required');
            if($this->form_validation->run() == FALSE) {
                redirect('test/passing_data/create_db_page');
            } else {
                $db_name = $this->input->post('db_name');
                if ($this->dbforge->create_database($db_name)) {
                    $this->load->view('test/db/Passing_data_create_table_view');
                    $this->session->set_userdata(array('current_db' => $db_name));
                } else {
                    redirect('test/passing_data/create_db_page');
                }
            }
        }
        public function create_table() {
            $this->form_validation->set_rules('table_name', 'Table Name', 'required');
            $table_name = $this->input->post('table_name');
            if ($this->form_validation->run() == FALSE) {
                redirect('passing_data/create_table_page');
            } else {
                $this->load->model('test/Passing_data_model');
                $this->session->set_userdata('current_table', $table_name);
                //$data['result'] = $this->Passing_data_model->get_field($this->session->userdata('current_table'));
                $this->load->view('test/db/Passing_data_create_col_view');
            }
        }
        public function create_col($table_name) {
            $this->db->db_select($this->session->userdata('current_db'));
            $this->load->dbforge();
            $this->form_validation->set_rules('col_name', 'Column Name', 'required');
            if($this->form_validation->run() == FALSE) {
                redirect('test/passing_data/create_table_page');
            } else {
                $col_name = $this->input->post('col_name');
                $col_type = $this->input->post('col_type');
                $col_constrain = $this->input->post('col_constrain');
                $col_ai = $this->input->post('col_ai');
                $col_pk = $this->input->post('col_pk');
                if ($col_ai) {
                    $fields = array(
                        $col_name => array(
                            'type' => $col_type,
                            'constraint' => $col_constrain,
                            'auto_increment' =>  TRUE
                        )
                    );
                } else {
                    $fields = array(
                        $col_name => array(
                            'type' => $col_type,
                            'constraint' => $col_constrain,
                            'auto_increment' =>  FALSE
                        )
                    );
                }
                $this->load->model('test/Passing_data_model');
                if ($col_pk)
                    $this->dbforge->add_key($col_name, TRUE);
                if ($this->db->table_exists($this->session->userdata('current_table')) == FALSE) {
                    $this->dbforge->add_field($fields);
                    if ($this->dbforge->create_table($table_name)) {
                        //redirect('test/passing_data/create_col_page');
                        $data['result'] = $this->Passing_data_model->get_field($this->session->userdata('current_table'));
                        $this->load->view('test/db/Passing_data_create_col_view', $data);
                    } else {
                        redirect('test/passing_data/create_table_page');
                    }
                } else {
                    $this->dbforge->add_column($this->session->userdata('current_table'), $fields);
                    //redirect('test/passing_data/create_col_page');
                    $data['result'] = $this->Passing_data_model->get_field($this->session->userdata('current_table'));
                    $this->load->view('test/db/Passing_data_create_col_view', $data);
                }
            }
        }
        public function insert_data() {
            $this->load->model('test/Passing_data_model');
            $db = $this->session->userdata('current_db');
            $table = $this->session->userdata('current_table');
            $col_data = $this->input->post('col_data[]');
            $data = $col_data;
            $this->Passing_data_model->insert_row($db, $table, $data);
            redirect('test/Passing_data/insert_data_page');
        }
        public function signout() {
            $this->session->unset_userdata(array('logged_in','email'));
            $this->load->view('test/Passing_data_logout');
            //redirect('passdata');
        }
        public function login_page() {
            $this->load->view('test/Passing_data_signin');
        }
        public function edit_comment_page($id=-1) {
            $this->session->set_userdata(array('current_c_id' => $id));
            $this->load->view('test/Passing_data_c_edit_view');
        }
        public function create_db_page() {
            /*$prefs['template'] = array(
                'table_open'           => '<table class="calendar">',
                'cal_cell_start'       => '<td class="day">',
                'cal_cell_start_today' => '<td class="today">'
            );
            $this->load->library('calendar', $prefs);
            echo $this->calendar->generate();*/

            $this->load->view('test/db/Passing_data_create_db_view');
        }
        public function create_table_page() {
            $this->load->view('test/db/Passing_data_create_table_view');
        }
        public function create_col_page() {
            $data['result'] = $this->Passing_data_model->get_field($this->session->userdata('current_table'));

            $this->load->view('test/db/Passing_data_create_col_view', $data);
        }
        public function insert_data_page() {
            $this->load->model('test/Passing_data_model');
            $current_table = $this->session->userdata('current_table');
            $data['result'] = $this->Passing_data_model->get_field($current_table);
            $data['full_result'] = $this->Passing_data_model->get_data($current_table);
            $this->load->view('test/db/Passing_data_insertdata_view', $data);
        }
    }
?>