<?php


class Products_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_list(){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('name','ASC');
        
        $query = $this->db->get();
        $result = $query->result();
    
        return $result;
    }
    
    public function update($id, $name, $description, $price){
        $record = [
            'name'  =>  $name, 
            'description'   =>  $description,
            'price'   =>  $price
        ];
        
        $this->db->where('id',$id);
        return $this->db->update('products',$record);
    }
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('id',$id);
        
        return $this->db->get()
                        ->row(); 
    }
    
    public function select_by_price($price){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('price',$price);

        return $this->db->get()
                        ->row(); 
    }
    
    
    public function insert($name, $description, $price, $img){
        
        $record = [
            'name'  =>  $name, 
            'description'   =>  $description,
            'price'   =>  $price,
            'img' =>  $img
        ];

        return $this->db->insert('products',$record);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('products');
    }
}
