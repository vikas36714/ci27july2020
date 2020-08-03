<?php 

defined('BASEPATH') or exit('No direct script access allowed.');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_loggedIn();
        $this->load->model('usersmodel');
    }

    private function is_loggedIn()
    {
        if( !$this->session->userdata('authenticated')){
            redirect('users/login');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        $user_id = $this->session->userdata('id');
        $data['user'] = $this->usersmodel->get_user($user_id);

        $this->load->view('header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('footer', $data);
    }


}