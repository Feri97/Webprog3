<?php

class Fileread extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('fileread_model');

    }

    public function index(){
       $this->load->helper('url'); 
       $this->load->view('_header');
       $this->load->view('admin/readfile');
       $this->load->view('_footer');

    }

    
    public function read_file(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');

        $data=file_get_contents(base_url('/uploads/users.txt'));
        
        $splittedstring=explode(";",$data);
        $username = $splittedstring[0];
        $password = password_hash($splittedstring[1], PASSWORD_BCRYPT);
        $email = $splittedstring[2];

        $requested = '@';
        if(strpos($email,$requested)){
            $this->fileread_model->insert_from_file($username,$password,$email);
        }else{
            $view_params = [
                'error' =>  'Nem megfelelő e-mail'
            ];
            $this->load->view('admin/readfile', $view_params);
        }
        $this->load->view('admin/readfile');
        $this->load->view('_footer');

    }

    
}



