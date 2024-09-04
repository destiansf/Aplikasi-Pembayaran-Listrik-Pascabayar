<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 2) {
            redirect('auth');
        }
        $this->load->model('Penggunaan_model');
        $this->load->model('Tagihan_model');
        $this->load->model('Pembayaran_model');
    }

    public function dashboard_pelanggan() {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('customer/dashboard', $data);
    }

    public function data_penggunaan() {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['username'] = $this->session->userdata('username');
        $data['penggunaan'] = $this->Penggunaan_model->get_penggunaan_by_pelanggan($id_pelanggan);
        $this->load->view('customer/data_penggunaan', $data);
    }

    public function data_tagihan() {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['username'] = $this->session->userdata('username');
        $data['tagihan'] = $this->Tagihan_model->get_tagihan_by_pelanggan($id_pelanggan);
        $this->load->view('customer/data_tagihan', $data);
    }

    public function laporan_pembayaran() {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data['username'] = $this->session->userdata('username');
        $data['pembayaran'] = $this->Pembayaran_model->get_pembayaran_by_pelanggan($id_pelanggan);
        $this->load->view('customer/laporan_pembayaran', $data);
    }
}
?>
