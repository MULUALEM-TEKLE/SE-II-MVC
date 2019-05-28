<?php


class User_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function register($enc_pwd){
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_pwd
        );

        return $this->db->insert('users' , $data);
    }

    public function username_exists($username){
        $query = $this->db->get_where('users' , array('username' => $username));
        if(empty($query->row_array())){
            return true;
        }

        return false;
    }

    public function email_exists($email){
        $query = $this->db->get_where('users' , array('email' => $email));
        if(empty($query->row_array())){
            return true;
        }

        return false;
    }


    public function login($username , $pwd){
        // die('username = '.$username.' password = '.$pwd);
        $this->db->where('username' , $username);
        $this->db->where('password' , $pwd);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            // die($result->row(0)->id);
            return $result->row(0)->id;
        }
        // die(var_dump($result));
        return false;
    }
}