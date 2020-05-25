<?php

class Admin_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

     public function get_list(){
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->order_by('username','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
    }


    public function login($name){
        
        $this->db->select('password'); 
        $this->db->from('admin'); 
        $this->db->where('username',$name); 
        
        $query = $this->db->get()->row();
        
        return $query;

    }

    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('admin');
    }

    
    public function select_user_by_id($id){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('id',$id);
        
        return $this->db->get()
                        ->row(); 
    }

}