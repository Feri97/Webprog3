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
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Felhasználónév','required|trim');
            $this->form_validation->set_rules('password','Jelszó','required|trim');
            $this->form_validation->set_rules('email','E-mail cím','trim|required|valid_email');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                
                if($this->user_model->username_validation($username) == true){
                    if($this->user_model->email_validation($email) == true){
                        $password = $this->input->post('password');
                        $this->user_model->register($username,
                                            password_hash($password, PASSWORD_BCRYPT),
                                            $email);
                   
                        
                        $this->load->helper('url');
                         
                        redirect(base_url('user/login'));
                    }else{
                        $view_params = [
                            'error' =>  'Ez az e-mail cím már foglalt'
                        ];
                        $this->load->view('user/register', $view_params);
                    }
                }else{
                    $view_params = [
                        'error' =>  'Ez a felhasználónév már foglalt'
                    ];
                    $this->load->view('user/register', $view_params);
                }
            } else{
                $this->load->view('user/register');
            }
        } else{
            $this->load->view('user/register', [ 'error' => '']);
        }
        $this->load->view('_footer');
    }
    public function login(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Felhasználónév','required|trim');
            $this->form_validation->set_rules('password','Jelszó','required|trim');

            if($this->form_validation->run() == TRUE){
                $data = $this->user_model->login($this->input->post('username'));
                if($data!=null){
                    $hash = $data->password;
                if(password_verify($this->input->post('password'), $hash)==true){
                                        
                    $this->load->library('session');
                    $this->session->set_userdata('username',$this->input->post('username'));

                    redirect(base_url('products'));
                }
                else{
                    $view_params = [
                        'error' =>  'Helytelen jelszó'
                    ];
                    $this->load->view('user/login', $view_params);
                }
                }
                else{
                    $view_params = [
                        'error' =>  'Helytelen felhasználónév'
                    ];
                    $this->load->view('user/login', $view_params);
                }
            } else{
                $this->load->view('user/login');
            }


        } else{
            $this->load->view('user/login', [ 'error' => '']);
        }
        $this->load->view('_footer');
    }
    
    public function view_cart(){
        
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
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

        $this->load->view('user/view_cart');
        if($this->input->post('order')){
            
            redirect(base_url('order/insert'));
        }
        $this->load->view('_footer');
    }

    public function remove_from_cart($rowid){
        $this->cart->remove($rowid);
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('_header');
        $this->load->view('user/view_cart');
        $this->load->view('_footer');
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

    public function generate_pdf(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('user/cart_to_pdf');

        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4','portair');

        $this->dompdf->render();

        $this->dompdf->stream('számla.pdf',array('Attachment'=>0));
    }

}