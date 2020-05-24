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


    public function login($name,$password){
        
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$name);
        $this->db->where('password',$password);
        $query = $this->db->get()->row();

        if($query != null){
            return true;
        }else{
            return false;
        }

    }

    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('admin');
    }

    




}