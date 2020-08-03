<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Pages extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('pagemodel');
    }
    public function view($page)
    {        
        if( !file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
    //   echo $this->session->userdata('email');
        $data['title'] = ucfirst($page);

        $this->load->view('header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('footer', $data);

    }

    public function contactSubmit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        
        if($this->form_validation->run() == false ){
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
        }else{
           $contactData = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'message' => $this->input->post('message', TRUE),
                'created_at' => date('Y-m-d H:i:s', time())
           ];

           $this->pagemodel->insertContact($contactData);
            $response = [
                'status' => 'success',
                'message' => '<h3 class="text-success text-center">Message send successfully</h3>'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


}