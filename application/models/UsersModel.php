<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function save($userData)
    {
        $this->db->insert('users', $userData);
        return $this->db->insert_id();
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('active', 1);

        $query = $this->db->get('users');

        if($query->num_rows() == 1 ){
            return $query->row();
        }
        return false;
    }

    public function get_User($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query->row();
        }
    }

    public function update($user_id, $userData)
    {
        $this->db->where('id', $user_id);
        $this->db->update('users', $userData);
    }

}