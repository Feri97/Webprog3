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
                $data = $this->admin_model->login($this->input->post('username'));
                if($data!=null){
                    $hash = $data->password;
                if(password_verify($this->input->post('password'), $hash)==true){
                                        
                    $this->load->library('session');
                    $this->session->set_userdata('admin','username');

                    redirect(base_url('products'));
                }else{
                    $view_params = [
                        'error' =>  'Helytelen jelszó'
                    ];
                    $this->load->view('admin/adminlogin', $view_params);
                }
            }else{
                $view_params = [
                    'error' =>  'Helytelen adminisztrátor név'
                ];
                $this->load->view('admin/adminlogin', $view_params);
            }

        } else{
            $this->load->view('admin/adminlogin');
        }
        } else{
            $this->load->view('user/login', [ 'error' => '']);
        }
        $this->load->view('_footer');
    }

    public function logout(){
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect(base_url('admin/login'));
    }

    public function userlist(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        $records = $this->admin_model->get_list(); 
        $view_params = [
            'users'  =>  $records
        ];
        $this->load->view('admin/userlist', $view_params);
        $this->load->view('_footer');
    }
    public function userprofile($id = NULL){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        
        if($id== NULL){
            show_error('Hiányzó user azonosító!');
        }
        if($id == NULL){
            show_error('Ilyen azonosítóval nincs user!');
        }

        $record = $this->admin_model->select_user_by_id($id);
            $view_params = [
                'user'  =>  $record
            ];
        $this->load->view('admin/userprofile', $view_params);
        $this->load->view('_footer');
    }
    public function read_file(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        $this->load->view('admin/readfile');
        $this->load->view('_footer');
    }

}