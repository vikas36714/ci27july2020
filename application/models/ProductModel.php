<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_products($limit, $offset, $search, $count = TRUE)
    {
        $this->db->select('*');
        $this->db->from('products');

        if($search){
            $keyword = $search['keyword'] ?? '';
            if($keyword){
                $this->db->where("product_name LIKE '%$keyword%'");
            }
            
        }

        if($count){
            return $this->db->count_all_results();
        }else{
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            if($query->num_rows() > 0 ){
                return $query->result();
            }
        }

        return array();
    }
    
}