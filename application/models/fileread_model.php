<?php

class Fileread_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_from_file($username,$password,$email){
        $record = [
            'username'   =>  $username,
            'password'   =>  $password,
            'email'  =>  $email
        ];
        
        return $this->db->insert('users',$record);
        return $this->db->insert_id();
    }

}
