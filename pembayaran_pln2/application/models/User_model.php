<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Sebaiknya menggunakan hashing untuk keamanan
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return $query->row();

            // Verifikasi password menggunakan password_verify
            if (password_verify($password, $user->password)) {
                return $user;
            }
            
        } else {
            return false;
        }
    }
}
