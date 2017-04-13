<?php
    class Fb_Model extends CI_Model {
        function __construct()
        {
            parent::__construct();
        }
        /*public function select() {
            $this->load->database();
            $this->db->select('*');
            $this->db->from('comment');
            $query = $this->db->get();
            return $result = $query->result_array();
        }*/
        public function insert_status($status, $date) {
            $this->load->database();
            $data = array(
                    'message' => $status,
                    'tanggal' => $date
            );
            $this->db->insert('status', $data);
        }
        public function insert_command($comment, $date, $status_id) {
            $this->load->database();
            $data = array(
                    'message' => $comment,
                    'tanggal' => $date,
                    'status_id' => $status_id
            );
            $this->db->insert('comment', $data);
        }
        public function select_status() {
            $this->load->database();
            $this->db->select('*');
            $this->db->from('status');
            $query = $this->db->get();//untuk result array
            return $result = $query->result_array();
        }
        public function select_comment() {
            $this->load->database();
            $this->db->select('*');
            $this->db->from('comment');
            $query = $this->db->get();
            return $result = $query->result_array();
        }
    }
?>