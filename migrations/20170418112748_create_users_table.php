<?php

define ('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $fields = array('');
    }
    public function down() {
        
    }
}