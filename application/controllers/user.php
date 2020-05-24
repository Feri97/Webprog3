<?php

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('products_model');
        $this->load->model('user_model');
        $this->load->library('cart');
    }

    public function index(){
    }
    
	function pdf(){
		$this->load->library('pdf');
        $this->load->helper('form');
		$html = $this->load->view('user/view_cart');

		$dompdf = new PDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents('test.pdf', $output);
    }
    
    public function add_to_cart($id){
        $prod = $this->products_model->select_by_id($id);
        $data = array(
            'id'      => $prod->id,
            'qty'     => 1,
            'price'   => $prod->price,
            'name'    => $prod->name
        );
    
        $this->cart->insert($data);
        $this->load->helper('url');
        redirect(base_url('products'));
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect(base_url('user/login'));
    }
    public function register(){
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Felhasználónév','required|trim');
            $this->form_validation->set_rules('password','Jelszó','required|trim');
            $this->form_validation->set_rules('email','E-mail cím','trim|required|valid_email');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                $this->user_model->register($this->input->post('username'),
                                            $this->input->post('password'),
                                            $this->input->post('email'));
                   
                        
                 $this->load->helper('url');
                         
                 redirect(base_url('user/login'));
            } else{
                $this->load->helper('url');
                $this->load->helper('form');
            }


        } else{
            $this->load->helper('url');
            $this->load->helper('form'); 
                    
            //$this->load->view('products_upload/form',['errors' => '']);
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        $this->load->view('user/register');
    }
    public function login(){
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Felhasználónév','required|trim');
            $this->form_validation->set_rules('password','Jelszó','required|trim');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                
                if($this->user_model->login($this->input->post('username'),
                $this->input->post('password')) == TRUE){
                        
                    $this->load->helper('url');
                    
                    $this->load->library('session');
                    $this->session->set_userdata('username','password');

                    redirect(base_url('products'));
                }
                else{
                    echo"Helytelen felhasználónév vagy jelszó";
                }
            } else{
                $this->load->helper('url');
                $this->load->helper('form');
            }


        } else{
            $this->load->helper('url');
            $this->load->helper('form'); 
                    
            //$this->load->view('products_upload/form',['errors' => '']);
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        $this->load->view('user/login');
    }
    
    public function view_cart(){
        
        if($this->input->post('update')){
            
            $i = 0;
    foreach ($this->cart->contents() as $item) {

        $qty1 = count($this->input->post('qty'));
        for ($i = 0; $i < $qty1; $i++) {
            //echo $_POST['qty'][$i];
            //echo $_POST['rowid1'][$i];
            $data = array('rowid' => $_POST['rowid1'][$i], 'qty' => $_POST['qty'][$i]);
            $this->cart->update($data);
        }

    }
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        $this->load->view('user/view_cart');
    }
    public function remove_from_cart($rowid){
        $this->cart->remove($rowid);
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        $this->load->view('user/view_cart');
    }
    public function destroy_cart(){
        if($this->session->userdata('username')){
            foreach ($this->cart->contents() as $items){
                $this->cart->remove($items['rowid']);
            }
            $this->cart-destroy();
                    $this->load->helper('url');
                    redirect(base_url('products'));
        }else{
            $this->load->helper('url');
            redirect(base_url('products'));
        }
    }



}