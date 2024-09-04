<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('pelanggan');

        if ($query->num_rows() == 1) {
            return $query->row();

            // Verifikasi password menggunakan password_verify
            if (password_verify($password, $customer->password)) {
                return $customer;
            }
            
        } else {
            return false;
        }
    }
}
?>
