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
    public function insert_status($email, $status, $date) {
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where('email', $email);
        $user_id = $this->db->get()->row_array();
        $data = array(
            'user_id' => $user_id['user_id'],
            'message' => $status,
            'tanggal' => $date
        );
        $this->db->insert('status', $data);
    }
    public function insert_comment($email, $comment, $date, $status_id) {
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where('email', $email);
        $user_id = $this->db->get()->row_array();
        $data = array(
            'user_id' => $user_id['user_id'],
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
    public function join_status_comment_user($id = -1)
    {
        $this->db->select('status.tanggal as s_tgl, 
                           comment.tanggal as c_tgl, 
                           status.message as s_msg,
                           status.message as s_msg,
                           comment.message as c_msg,
                           comment.status_id as c_sid, 
                           comment.comment_id as c_id,
                           comment.user_id as c_uid, 
                           comment.tanggal as c_tgl,
                           user.name as u_name, 
                           user.email as u_email');
        $this->db->from('status');
        $this->db->join('comment', 'comment.status_id=status.status_id');
        $this->db->join('user', 'user.user_id=comment.user_id');
        if ($id != -1)
            $this->db->where('status.status_id',$id);
        $query=$this->db->get()->result_array();
        /*echo "<pre>";
        print_r($query);
        echo "</pre>";*/
        return $query;
    }
    public function join_status_user() {
        $this->db->select('*');
        $this->db->join('user', 'user.user_id=status.user_id');
        $query = $this->db->get('status')->result_array();
        /*echo "<pre>";
        print_r($query);
        echo "</pre>";*/
        return $query;
    }
    public function del_comment_where($id) {
        $this->db->where('comment_id',$id);
        $this->db->delete('comment');
    }
    public function edit_comment($id, $message) {
        $data = array('message' => $message);
        $this->db->update_string($data);
    }
    public function del_status_where($id) {
        //hapusstatus
        $this->db->where('status_id',$id);
        $this->db->delete('status');
        //hapuscomment
        $this->db->where('status_id',$id);
        $this->db->delete('comment');
    }
    public function select_user_where($email, $pass) {
        $this->db->select('*');
        $this->db->where('user.email', $email);
        $this->db->where('user.pass', $pass);
        $query = $this->db->get('user')->row_array();
        return $query;
    }
    public function insert_user($email, $name, $pass) {
        $data = array(
                'email' => $email,
                'name' => $name,
                'pass' => $pass
        );
        $this->db->insert('user', $data);
    }
}
?>