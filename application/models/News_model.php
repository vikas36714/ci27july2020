<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_allnews()
    {
        $this->db->order_by('created_at', 'desc');
        $this->db->where('active', 1);
        $query = $this->db->get('news');

        if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function get_news($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('news');
        return $query->row();
    }

    public function insert_news($newsdata)
    {
        $this->db->insert('news', $newsdata);

        return $this->db->insert_id();
    }

    public function update_news($id, $newsdata)
    {
        $this->db->where('id', $id);
        $this->db->update('news', $newsdata);
    }

    public function delete_news($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }

}