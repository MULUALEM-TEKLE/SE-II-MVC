<?php


class Post_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_posts($slug = FALSE , $limit = FALSE , $offset = FALSE){
        // print('This is the slug value passed to the function :-'.$slug);
        if($limit){
            $this->db->limit($limit , $offset);
        }
        if($slug == FALSE){
            $this->db->order_by('posts.id' , 'desc');
            $this->db->join('categories' , 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        // die('searching for a specific post');
        $query = $this->db->get_where('posts' , array('slug' => $slug));
        // print_r($query);
        // print('The slug value is '.$slug);
        // var_dump($query->row_array());
        return $query->row_array();
    }

    public function get_posts_by_id($id ){
        // print('This is the slug value passed to the function :-'.$slug);
       
        // die('searching for a specific post');
        $query = $this->db->get_where('posts' , array('id' => $id));
        // print_r($query);
        // print('The slug value is '.$slug);
        // var_dump($query->row_array());
        return $query->row_array();
    }


    public function create_post($post_image){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'post_image' => $post_image , 
            'user_id' => $this->session->userdata('user_id')

        );

        return $this->db->insert('posts' , $data);

    }


    public function delete_post($id = FALSE){
        // die("Reached the model");
        $this->db->where('id' , $id);
        $this->db->delete('posts');
        return true;
    }


    public function update_post($id){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id')


        );
        $this->db->where('id' , $id);
        $this->db->update('posts' , $data);
        return true;
    }


    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_post_by_cat($id){
        $this->db->order_by('posts.id' , 'desc');
        $this->db->join('categories' , 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts' , array('category_id' => $id));
        // print_r($query);
        // print('The slug value is '.$slug);
        // var_dump($query->row_array());
        return $query->result_array();
    }
}