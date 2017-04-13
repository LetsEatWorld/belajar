<?php
class Form extends CI_Controller {
    public function index() {
        if(!isset($this->session->logged_in)) {
            $this->daftar();
        } else {
            $this->view_data();
        }
    }
    public function add_data() {
        $this->load->model('Data_Model');
        $this->Data_Model->insert();
    }
    public function view_data() {
        $this->load->model('Data_Model');
        $data = $this->Data_Model->view();
        $this->load->view('formsuccess', $data);
    }
    public function daftar() {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('tel','No. Telp', 'required|numeric');
        $this->form_validation->set_rules('pass','Password', 'required|min_length[5]');
        $this->form_validation->set_rules('repass','Retype Password', 'matches[pass]');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('myform');
        } else {
            $last_id=$this->add_data();
            $this->view_data();
            redirect('account/view/'.$last_id);
        }
    }
    public function hapus() {
        $this->load->model('Data_Model');
        $this->load->library('session');
        $id = $this->session->id;
        $this->Data_Model->row_delete($id);
        $this->session->unset_userdata('id','logged_in');
        $this->load->view('formmasuk');
    }
    public function edit() {
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('tel','No. Telp', 'required|numeric');
        $this->form_validation->set_rules('pass','Password', 'required|min_length[5]');
        $this->form_validation->set_rules('repass','Retype Password', 'matches[pass]');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('updateform');
        } else {
            $this->load->model('Data_Model');
            $this->load->library('session');
            $id = $this->session->id;

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'tel' => $this->input->post('tel'),
                'pass' => md5($this->input->post('pass'))
            );

            $this->Data_Model->update($id, $data);
            $this->view_data();
        }

    }
    public function logout() {
        $this->load->library('session');
        $this->session->unset_userdata('id','logged_in');
        $this->login();
    }
    public function login() {
        //$this->load->helper(array('form'));
        $this->load->helper('url');
        //$this->load->helper('array');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id','ID', 'required|numeric');
        $this->form_validation->set_rules('pass','Password', 'required|min_length[5]');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('formmasuk');
        } else {
            $this->load->model('Data_Model');
            $id = $this->input->post('id');
            $pass = $this->input->post('pass');
            $data = $this->Data_Model->select($id, $pass);
            if(count($data) > 0) {
                $this->load->library('session');
                $this->session->set_userdata(array('id' => $id, 'logged_in' => TRUE));
                $this->view_data();
            } else {
                echo "<script>
                        alert('ID atau Password yang anda masukkan salah');
                      </script>";
                $this->load->view('formmasuk');
            }
        }
    }
}
?>