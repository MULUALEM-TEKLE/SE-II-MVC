<?php


class Category_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function create_category(){

        $data = array('name' => $this->input->post('name') , 'user_id' => $this->session->userdata('user_id'));

        return $this->db->insert('categories' , $data);
        
    }

    public function get_categories(){
        $query = $this->db->get('categories');
        return $query->result_array();
    
    }

    public function delete_category($id = FALSE){
        // die("Reached the model");
        $this->db->where('id' , $id);
        $this->db->delete('categories');
        return true;
    }


    public function get_category($id){
        $query = $this->db->get_where('categories' , array('id' => $id));
        // die('id = '.$id.' result = '.var_dump($query->row()));
        return $query->row();
    
    }
}