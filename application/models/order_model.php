<?php

class order_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_list(){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->order_by('name','ASC');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('orders');
        $this->db->where('id',$id);

        return $this->db->get()->row();
    }
    
    
    public function insert($user, $city, $postal_code, $address, $phone_number, $name){
        $record = [
            'user_id' => $user,
            'city'  =>  $city,
            'postal_code'  =>  $postal_code,
            'address'  =>  $address,
            'phone_number'  =>  $phone_number,
            'name'  =>  $name
        ];
        
        return $this->db->insert('orders',$record);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('orders');
    }
}
