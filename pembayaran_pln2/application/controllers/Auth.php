<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Customer_model');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Cek login admin
        $user = $this->User_model->login($username, $password);
    
        if ($user) {
            $session_data = [
                'id_user' => $user->id_user, // Simpan id_user ke dalam sesi
                'username' => $user->username,
                'role' => $user->id_level,
                'logged_in' => TRUE
            ];
            
            $this->session->set_userdata($session_data);
            if ($user->id_level == 1) {
                redirect('admin/dashboard');
            } else {
                redirect('auth');
            }
        } else {
            // Cek login pelanggan
            $customer = $this->Customer_model->login($username, $password);
            if ($customer) {
                $session_data = [
                    'username' => $customer->username,
                    'role' => 2, // Role untuk pelanggan
                    'logged_in' => TRUE,
                    'id_pelanggan' => $customer->id_pelanggan  // Simpan id_pelanggan ke dalam sesi
                ];
                $this->session->set_userdata($session_data);
                redirect('customer/dashboard_pelanggan');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth');
            }
        }
    }    

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
?>
