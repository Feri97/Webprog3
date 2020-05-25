<?php


class Order extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('order_model');
        $this->load->model('user_model');
    }
    
    public function index(){
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
       $records = $this->order_model->get_list(); 
       
       $view_params = [
           'order'  =>  $records
       ];
       $this->load->helper('url');
       $this->load->view('order/list', $view_params);
       
       $this->load->view('_footer');
    }
    
    public function insert(){
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('city','város','required');
            $this->form_validation->set_rules('postal_code','irányítószám','required');
            $this->form_validation->set_rules('address','utca, házszám','required');
            $this->form_validation->set_rules('phone_number','telefonszám','required');
            $this->form_validation->set_rules('name','név','required');
            
            if($this->form_validation->run() == TRUE){
                echo $this->session->userdata('username');
                print_r($this->user_model->get_id($this->session->userdata('username'))->id);
                
                $this->order_model->insert($this->user_model->get_id($this->session->userdata('username'))->id,
                $this->input->post('city'), $this->input->post('postal_code'),
                $this->input->post('address'), $this->input->post('phone_number'),
                $this->input->post('name'));
                
                $this->load->helper('url');

                redirect(base_url('products'));
            }
        }
        
        $this->load->view('order/insert');
        $this->load->view('_footer');
    }
    
    public function delete($id = NULL){
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        
        $record = $this->order_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        $this->order_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('order'));
    }

}