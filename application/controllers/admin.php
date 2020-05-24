<?php

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('products_model');
    }

    public function index(){
    }
    

    public function login(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Adminisztrátor név','required');
            $this->form_validation->set_rules('password','Jelszó','trim|required');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                
                if($this->admin_model->login($this->input->post('username'),$this->input->post('password')) == TRUE){
                    
                    $this->load->library('session');
                    $this->session->set_userdata('admin','username');
                    
                    $this->load->helper('url');
                    redirect(base_url('products'));
                }else{
                    echo"Helytelen felhasználónév vagy jelszó";
                }
                   
                        
                
            } else{
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->view('admin/adminlogin');
            }

        } else{
            $this->load->helper('form');
            $this->load->view('admin/adminlogin');
        }
    }

    public function logout(){
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect(base_url('admin/adminlogin'));
    }

    public function listofusers(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        $records = $this->admin_model->get_list(); 
        $view_params = [
            'users'  =>  $records
        ];
        $this->load->view('admin/listofusers', $view_params);
    }



}