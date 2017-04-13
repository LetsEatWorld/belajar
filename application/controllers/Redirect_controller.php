<?php
class Redirect_controller extends CI_Controller {
    public function index() {
        $this->load->helper('url');

        redirect('http://www.tutorialspoint.com');
    }
    public function computer_graphic() {
        $this->load->helper('url');
        redirect('http://www.tutorialspoint.com/computer_graphics/index.htm');
    }
    public function version2() {
        $this->load->helper('url');
        redirect('redrect/computer_graphic');
    }
}
?>