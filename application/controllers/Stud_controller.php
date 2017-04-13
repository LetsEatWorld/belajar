<?php
class stud_controller extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->database();
    }
    public function index() {
        $query = $this->db->get("testing");
        $data["records"] = $query->result();
        $this->load->helper('url');
        $this->load->view('stud_view', $data);
    }
    public function add_student_view() {
        $this->load->helper('form');
        $this->load->view('stud_add');
    }
    public function add_student() {
        $this->load->model('stud_model');
        $data = array(
                'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'tel' => $this->input->post('tel')
        );
        $this->Stud_Model->insert($data);

        $query = $this->db->get("testing");
        $data['records'] = $query->result();
        $this->load->view('stud_view', $data);
    }
    public function update_student_view() {
        $this->load->helper('form');

        $nama = $this->uri->segment('3');
        $query = $this->db->get_where("testing", array("nama" => $nama));
        $data['records'] = $query->result();
        $data['old_nama'] = $nama;
        $this->load->view('stud_edit',$data);
    }
    public function update_student() {
        $this->load->model('stud_model');
        $data = array(
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'tel' => $this->input->post('tel')
        );
        $this->Stud_Model->insert($data);
        $old_nama = $this->input->post('old_nama');
        $query = $this->db->get("testing");
        $data['records'] = $query->result();
        $this->load->view('stud_view',$data);
    }
    public function delete_student() {
        $this->load->model('stud_model');
        $nama = $this->uri->segment('3');
        $this->Stud_Model->delete($nama);

        $query = $this->db->get("testing");
        $data['records'] = $query->result();
        $this->load->view('stud_view',$data);
    }

}
?>

<!--Note-->
<!--========-->
<!--public function now_date() {
$this->load->helper('date');
$this->load->view('test_view');
}
public function matematika() {
$this->load->view('test_view');
}
public function cetak_string() {
$this->load->helper('directory');
$this->load->helper('string');
$this->load->view('test_view');
}
public function buat_class() {
//$this->load->library('mobil');
$this->load->view('test_view');
}
public function ambil_data_form() {
$this->load->view('test_view');
}-->