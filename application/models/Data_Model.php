<?php
class Data_Model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function insert() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'pass' => md5($this->input->post('pass'))
        );
        $this->db->insert('employee',$data);
        //return $this->db->insert_id();
        $this->db->close();
    }
    public function view() {
        $this->load->database();
        $query = $this->db->get('employee');
        $data['records'] = $query->result();
        return $data;
    }
    public function select($id, $pass) {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('employee_id =', $id);
        $this->db->where('pass =', md5($pass));
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    public function row_delete($id) {
        $this->load->database();
        $this->db->where('employee_id',$id);
        $this->db->delete('employee');
    }
    public function update($id, $data) {
        $this->load->database();
        $this->db->where('employee_id', $id);
        $this->db->update('employee', $data);
    }
}
?>