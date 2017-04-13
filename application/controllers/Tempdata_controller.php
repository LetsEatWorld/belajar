<?php
class Tempdata_controller extends CI_Controller {
    public function index() {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->view('Tempdata_view');
    }
    public function add() {
        $this->load->library('session');
        $this->load->helper('url');

        //set session yang akan hilang dalam 5 menit
        $this->session->set_tempdata('item','item-value',300);

        redirect(base_url('tempdata'));
    }
    public function del() {
        $this->load->library('session');
        $this->load->helper('url');

        //$this->session->set_tempdata('item','item-value',-1);
        $this->session->sess_destroy();

        redirect(base_url('tempdata'));
    }
}
?>