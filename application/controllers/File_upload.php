<?php

class File_upload extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('products_model');
    }
    
    public function index(){
      
        if($this->input->post('submit')){
        
            $upload_config['allowed_types'] = 'jpg|jpeg|png';
            $upload_config['max_size'] = 2355;
            $upload_config['min_height'] = 250;
            $upload_config['min_width'] = 250;

            $records = $this->products_model->get_new_id(); 

            $upload_config['upload_path'] = './uploads/img/products';
            $upload_config['file_ext_tolower'] = TRUE; 
            $upload_config['overwrite'] = FALSE; 
            $upload_config['file_name'] = $records['id']+1;

            $this->load->library('upload');
            $this->upload->initialize($upload_config);

            if($this->upload->do_upload('file') == TRUE){
               $view_params = [
                   'file'   =>  $this->upload->data()
               ];
               $this->load->view('products/list',$view_params);
            }
            else{
                $view_params = [
                    'error' =>  $this->upload->display_errors()
                ];
                $this->load->helper('form');
                $this->load->view('products/insert', $view_params);
            }
        }
        else{
            $this->load->helper('form');
            $this->load->view('products/insert', [ 'error' => '']);
        }
        
    }
}
