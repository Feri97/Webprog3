<?php

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

    public function get_user_id($username){
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->where('username',$username); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result['id'];
    }
    public function register($username, $password, $email){
       
        $record = [
            'username'   =>  $username,
            'password'   =>  $password,
            'email'  =>  $email 
        ];
        
        return $this->db->insert('users',$record);
        
        return $this->db->insert_id();
    }
    public function login($username, $password){
       
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->where('username',$username);
        $this->db->where('password',$password); 
        
        $query = $this->db->get()->row();

        if($query != null){
            return true;
        }else{
            return false;
        }
    }


}    