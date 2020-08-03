<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('usersmodel');
    }

    public function signup()
    {
        $data['title'] = 'Signup';

        $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password' ,'required|matches[password]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('users/signup', $data);
            $this->load->view('footer', $data);
        }else{
            $userData = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'created_at' => date('Y-m-d H:i:s', time()),
                'active' => 1
            ];

            $this->usersmodel->save($userData);

            $this->session->set_flashdata('message', 'Registration successfully.');
            redirect('users/login');
        }
    }

    private function is_loggedIn()
    {
        if( !$this->session->userdata('authenticated')){
            redirect('users/login');
        }
    }

    public function login()
    {
        if($this->session->userdata('authenticated')){
            redirect('dashboard');
        }

        $data['title'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {

            $this->load->view('header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('footer', $data);

        }else{
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->usersmodel->login($email, $password);
            if($user){
                $userData = [
                    'id' => $user->id,
                    'first_name' =>$user->first_name,
                    'last_name' =>$user->last_name,
                    'authenticated' => TRUE
                ];

                $this->session->set_userdata($userData);
                redirect('dashboard');

            }else{
                $this->session->set_flashdata('message', 'Invalid email or password.');
                redirect('users/login');
            }

        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
    }

    public function upload()
    {
        $this->is_loggedIn();

        $data['title'] = 'Image Upload';

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 500;

        $this->load->library('upload', $config);

        $data['error'] = '';

        if ( ! $this->upload->do_upload('userfile'))
        {
            if(isset($_FILES['userfile'])){
                $data['error'] = $this->upload->display_errors();
            }

            $this->load->view('header', $data);
            $this->load->view('users/upload', $data);
            $this->load->view('footer', $data);
        }
        else
        {
            $user_id = $this->session->userdata('id');

            $user = $this->usersmodel->get_user($user_id);

            if($user->profile_photo && file_exists('uploads/'.$user->profile_photo)){
                unlink('uploads/'.$user->profile_photo);
            }

            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $userData = [
                'profile_photo' => $filename
            ];

            $this->usersmodel->update($user_id, $userData);

            $this->session->set_flashdata('message', 'Upload successfully');
            redirect('dashboard');
        }
    }

    public function changePassword()
    {
        $this->is_loggedIn();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('oldPassword', 'Old Password', 'callback_passwordCheck');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[newPassword]');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if($this->form_validation->run() == false ){
            $this->load->view('header', $data);
            $this->load->view('users/change_password', $data);
            $this->load->view('footer', $data);
        }else{
           $newPassword = $this->input->post('newPassword');
           $userid = $this->session->userdata('id');
           $this->usersmodel->update($userid, ['password' => md5($newPassword)]);
           redirect('users/logout');
        }

    }

    public function passwordCheck($oldPassword)
    {
        $userid = $this->session->userdata('id');
        $user = $this->usersmodel->get_User($userid);
        if(!empty($oldPassword)){
            if(md5($oldPassword) !== $user->password ){
                $this->form_validation->set_message('passwordCheck', 'The {field} does not match');
                return false;
            }
        }else{
            $this->form_validation->set_message('passwordCheck', 'The Old Password field is required');
            return false;
        }
            return true;

    }



}