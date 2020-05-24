<?php


class Products_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('user_model');
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
        $userid = $this->user_model->get_user_id($this->session->userdata('username'));
        if($userid == $id){
            $record = [
                'name'  =>  $name, 
                'description'   =>  $description,
                'price'   =>  $price
            ];
        
            $this->db->where('id',$id);
            return $this->db->update('products',$record);
        }else{
            return;
        }
    }
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('id',$id);
        
        return $this->db->get()
                        ->row(); 
    }

    public function get_max_id(){
        $this->db->select_max('id');
        $this->db->from('products');
        
        return $this->db->get()->row(); 
    }

    public function select_by_price($price){
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('price',$price);

        return $this->db->get()
                        ->row(); 
    }
    
    
    public function insert($name, $description, $price, $product_code, $img){
        
        $record = [
            'name'  =>  $name, 
            'description'   =>  $description,
            'price'   =>  $price,
            'product_code'   =>  $product_code,
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
