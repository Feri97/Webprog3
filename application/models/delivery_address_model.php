<?php

class Delivery_address_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_list(){
        $this->db->select('*');
        $this->db->from('delivery_address');
        $this->db->order_by('name','ASC');
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function update($id, $name, $postal_code){
        $record = [
            'postal_code'  =>  $postal_code,
            'name'  =>  $name
        ];
        $this->db->where('id',$id);
        return $this->db->update('delivery_address',$record);
    }
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('delivery_address');
        $this->db->where('id',$id);

        return $this->db->get()->row();
    }
    
    
    public function insert($postal_code, $name){
        $record = [
            'postal_code'  =>  $postal_code,
            'name'  =>  $name
        ];
        
        return $this->db->insert('delivery_address',$record);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('delivery_address');
    }
}
