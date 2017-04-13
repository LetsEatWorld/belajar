<?php
    class Stud_Model extends CI_Model {
        function __construct()
        {
            parent::__construct();
        }
        public function insert($data) {
            if($this->db->insert('testing',$data)) {
                return true;
            }
        }
        public function delete($nama) {
            if($this->db->delete('testing', 'nama = '.$nama)) {
                return true;
            }
        }
        public function update($data, $old_nama) {
            $this->db->set($data);
            $this->db->where('nama', $old_nama);
            $this->db->update('testing', $data);
        }
    }
?>