<?php
class Passing_data_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function select_status() {
        $this->db->select('*');
        $this->db->from('status');
        $query = $this->db->get();//untuk result array
        return $result = $query->result_array();
    }
    public function insert_status($user_id, $status, $date) {
        $data = array(
            'user_id' => $user_id,
            'message' => $status,
            'tanggal' => $date
        );
        $this->db->insert('status', $data);
    }
    public function insert_comment($user_id, $comment, $date, $status_id) {
        $data = array(
            'user_id' => $user_id,
            'message' => $comment,
            'tanggal' => $date,
            'status_id' => $status_id
        );
        $this->db->insert('comment', $data);
    }
    public function select_comment_where($id) {
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->Where('status_id',$id);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    public function select_status_where($id) {
        $this->db->select('*');
        $this->db->Where('status_id',$id);
        $query = $this->db->get('status')->row_array();

       /* $this->db->select('*');
        $this->db->Where('status_id',$id);
        $query['result'] = $this->db->get('status')->result_array();

        $this->db->select('*');
        $this->db->Where('status_id',$id);
        $query['result_object'] = $this->db->get('status')->result();*/
        return $query;
    }
    public function join_status_comment($id = -1)
    {
        $this->db->select('status.tanggal as s_tgl');
        $this->db->select('comment.tanggal as c_tgl');
        $this->db->select('status.message as s_msg');
        $this->db->select('comment.message as c_msg');
        $this->db->select('comment.status_id as c_sid');
        $this->db->select('comment.comment_id as c_id');
        $this->db->select('comment.user_id as c_uid');
        $this->db->from('status');
        $this->db->join('comment','comment.status_id=status.status_id');
        if ($id != -1)
            $this->db->where('status.status_id',$id);
        $query=$this->db->get()->result_array();
        return $query;
    }
    public function del_comment_where($id) {
        $this->db->where('comment_id',$id);
        $this->db->delete('comment');
    }
    public function del_status_where($id) {
        //hapusstatus
        $this->db->where('status_id',$id);
        $this->db->delete('status');
        //hapuscomment
        $this->db->where('status_id',$id);
        $this->db->delete('comment');
    }
    public function select_user_where($id, $pass) {
        $this->db->select('*');
        $this->db->where('user.user_id', $id);
        $this->db->where('user.pass', $pass);
        $query = $this->db->get('user')->row_array();
        return $query;
    }
    public function insert_user($id, $name, $pass) {
        $data = array(
                'user_id' => $id,
                'name' => $name,
                'pass' => $pass
        );
        $this->db->insert('user', $data);
    }
}
?>