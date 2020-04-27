<?php


class Delivery_Address extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('delivery_address_model');
    }
    
    public function index(){
        
       $records = $this->delivery_address_model->get_list(); 
       
       $view_params = [
           'delivery_address'  =>  $records
       ];
       $this->load->helper('url');
       $this->load->view('delivery_address/list', $view_params);
    }
    
    public function insert(){
        
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('postal_code','irányítószám','required');
            $this->form_validation->set_rules('name','városnév','required');
            
            if($this->form_validation->run() == TRUE){
                $this->delivery_address_model->insert($this->input->post('postal_code'), $this->input->post('name'));
                $this->load->helper('url');
                redirect(base_url('delivery_address'));
            }
        }
        
        $this->load->helper('form');
        $this->load->view('delivery_address/insert');
        
    }
    
    public function edit($id = NULL){
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->delivery_address_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('postal_code','irányítószám','required');
        $this->form_validation->set_rules('name','név','required');
         
        if($this->form_validation->run() == TRUE){

            $this->delivery_address_model->update($id, 
                                           $this->input->post('name'),
                                           $this->input->post('postal_code'));
            $this->load->helper('url');
            redirect(base_url('delivery_address'));
        }
        else{
            $view_params = [
                'add'    =>  $record
            ];

            $this->load->helper('form');
            $this->load->view('delivery_address/edit',$view_params);
        }
            
    }
    
    public function delete($id = NULL){
        if($id == NULL){
            show_error('Hiányzó azonosító!');
        }

        $record = $this->delivery_address_model->select_by_id($id);
        if($record == NULL){
            show_error('Nincs ilyen rekord!');
        }
        
        $this->delivery_address_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('delivery_address'));
        }

}