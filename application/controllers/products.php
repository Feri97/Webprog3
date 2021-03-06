<?php


class Products extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('products_model');
    }
    
    public function index(){
        $records = $this->products_model->get_list(); 

        $view_params = [
           'products'  =>  $records
        ];
        $this->load->helper('url');
        $this->load->view('_header');
        if($this->session->userdata('username')){
            $this->load->view('products/list', $view_params);
        }
        elseif($this->session->userdata('admin')){
            $this->load->view('products/adminlist', $view_params);
        }
        $this->load->view('_footer');
    }
    
    public function insert(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $img = '';
            $this->form_validation->set_rules('name','terméknév','required');
            $this->form_validation->set_rules('description','leírás','required|min_length[10]|max_length[255]');
            $this->form_validation->set_rules('price','ár','required');
            $this->form_validation->set_rules('product_code','termék kód','required');

            $upload_config['allowed_types'] = 'jpg|jpeg|png';
            $upload_config['max_size'] = 2355;
            $upload_config['min_height'] = 250; 
            $upload_config['min_width'] = 250;
            
            $upload_config['upload_path'] = './uploads/img/products/';
            $upload_config['file_name'] = $this->input->post('product_code');
            $upload_config['file_ext_tolower'] = TRUE;
            $upload_config['overwrite'] = FALSE;


            if($this->form_validation->run() == TRUE){
                $img = $upload_config['upload_path'].$upload_config['file_name'];
                
                $this->load->library('upload');
                $this->upload->initialize($upload_config);

                if($this->upload->do_upload('file') == TRUE){
                    $view_params = [
                       'file'   =>  $this->upload->data()
                    ];
               
                    $this->products_model->insert($this->input->post('name'),
                    $this->input->post('description'),
                    $this->input->post('price'),
                    $this->input->post('product_code'),
                    $img);

                    redirect(base_url('products'));
                }else{
                    $view_params = [
                        'error' =>  $this->upload->display_errors()
                    ];
                    $this->load->view('products/insert', $view_params);
                }
            }
            else{
                $this->load->view('products/insert');
            }
        }
        else{
            $this->load->view('products/insert', [ 'error' => '']);
        }
        $this->load->view('_footer');
    }
    
    public function edit($id = NULL){  
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    

        $record = $this->products_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','terméknév','required');
        $this->form_validation->set_rules('description','leírás','required|min_length[10]|max_length[255]');
        $this->form_validation->set_rules('price','ár','required');
        
        if($this->form_validation->run() == TRUE){
            $this->products_model->update($id, 
                                           $this->input->post('name'),
                                           $this->input->post('description'),
                                           $this->input->post('price'));
            $this->load->helper('url');
            redirect(base_url('products'));
        }
        else{
            $view_params = [
                'prod'    =>  $record
            ];
            $this->load->view('products/edit',$view_params);
        }
        $this->load->view('_footer');
            
    }
    public function delete($id = NULL){
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        
        $record = $this->products_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        $this->products_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('products'));
    }
    public function profile($id = NULL){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('_header');
        if($id== NULL){
            show_error('Hiányzó rekord azonosító!');
        }


        if($id == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        } 
        $this->load->helper('form');

        $record = $this->products_model->select_by_id($id);
            $view_params = [
                'prod'  =>  $record
            ];
        $this->load->view('products/profile', $view_params);
        $this->load->view('_footer');

    }
}
