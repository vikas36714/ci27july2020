<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class PageModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertContact($contactData)
    {
        $this->db->insert('contacts', $contactData);
        return $this->db->insert_id();
    }

}