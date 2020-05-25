<?php

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

    public function username_validation($username){
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->where('username',$username); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
        
        if($result != null){
            return false;
        }else{
            return true;
        }
    }
    public function email_validation($email){
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->where('email',$email); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
        
        if($result != null){
            return false;
        }else{
            return true;
        }
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
    public function login($username){
       
        $this->db->select('password'); 
        $this->db->from('users'); 
        $this->db->where('username',$username); 
        
        $query = $this->db->get()->row();
        //$result = $query->result();
        
        return $query;
    }

    public function get_id($username){
        $this->db->select("id");
        $this->db->from('users');
        $this->db->where('username',$username);
        
        $query = $this->db->get()->row(); 
                        
        return $query;
    }

}    