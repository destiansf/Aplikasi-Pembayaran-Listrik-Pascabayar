<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('username') || $this->session->userdata('role') != 1) {
            redirect('auth');
        }
        // Load necessary models
        $this->load->model('Pelanggan_model');
        $this->load->model('Penggunaan_model');
        $this->load->model('Tagihan_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Tarif_model');
    }

    //DASHBOARD ADMIN
    public function dashboard() {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('admin/dashboard', $data);
    }

    //PELANGGAN
    public function pelanggan() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $this->load->view('admin/pelanggan/index', $data);
    }

    public function create_pelanggan() {
        // Load form validation library
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('id_pelanggan', 'Id Pelanggan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_kwh', 'No kWh', 'required');
        $this->form_validation->set_rules('id_tarif', 'Tarif', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the view again with validation errors
            $data['tarif'] = $this->Tarif_model->get_all_tarif();
            $this->load->view('admin/pelanggan/create', $data);
        } else {
            // Validation passed, process the form data
            $id_tarif = $this->input->post('id_tarif');
            $tarifperkwh = $this->Tarif_model->get_tarifperkwh_by_id($id_tarif);
    
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'), // Simpan sebagai plaintext
                'nomor_kwh' => $this->input->post('no_kwh'),
                'nama_pelanggan' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'id_tarif' => $id_tarif,
                'tarifperkwh' => $tarifperkwh
            );            
            
            // Debugging to see the data being inserted
            echo '<pre>', print_r($data, true), '</pre>';
    
            $this->Pelanggan_model->create_pelanggan($data);
            redirect('admin/pelanggan');
        }
    }    

    public function edit_pelanggan($id) {
        // Load form validation library
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('no_kwh', 'No kWh', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form edit dengan error
            $data['pelanggan'] = $this->Pelanggan_model->get_pelanggan_by_id($id);
            $data['tarif'] = $this->Tarif_model->get_all_tarif();
            $this->load->view('admin/pelanggan/edit', $data);
        } else {
            // Jika validasi sukses, proses data yang akan diupdate
            $data = array(
                'nomor_kwh' => $this->input->post('no_kwh'),
                'nama_pelanggan' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            );
            
            $this->Pelanggan_model->update_pelanggan($id, $data);
            redirect('admin/pelanggan');
        }
    }    
    
    public function delete_pelanggan($id) {
        $this->Pelanggan_model->delete_pelanggan($id);
        redirect('admin/pelanggan');
    }

    //PENGGUNAAN
    public function penggunaan() {
        $data['penggunaan'] = $this->Penggunaan_model->get_all_penggunaan();
        $this->load->view('admin/penggunaan/index', $data);
    }

    public function create_penggunaan() {
        // Load form validation library
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('id_pelanggan', 'Id Pelanggan', 'required');
        $this->form_validation->set_rules('usage_id', 'Id Penggunaan', 'required');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('meter_awal', 'Meter Awal', 'required');
        $this->form_validation->set_rules('meter_akhir', 'Meter Akhir', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the view again with validation errors
            $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
            $this->load->view('admin/penggunaan/create', $data);
        } else {
            // Validation passed, process the form data
            $id_pelanggan = $this->input->post('id_pelanggan');
    
            $data = array(
                'id_penggunaan' => $this->input->post('usage_id'),
                'id_pelanggan' => $id_pelanggan,
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'meter_awal' => $this->input->post('meter_awal'),
                'meter_akhir' => $this->input->post('meter_akhir')
            );
    
            $this->Penggunaan_model->create_penggunaan($data);
            redirect('admin/penggunaan');  // Redirect to a relevant page after creation
        }
    }
    
    public function edit_penggunaan($id) {
        // Load form validation library
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('meter_awal', 'Meter Awal', 'required');
        $this->form_validation->set_rules('meter_akhir', 'Meter Akhir', 'required');
        
        // Load data pelanggan for dropdown
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        
        // Load data penggunaan to be edited
        $data['penggunaan'] = $this->Penggunaan_model->get_penggunaan_by_id($id);
        
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the edit form with errors
            $this->load->view('admin/penggunaan/edit', $data);
        } else {
            // If validation succeeds, prepare update data
            $update_data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'meter_awal' => $this->input->post('meter_awal'),
                'meter_akhir' => $this->input->post('meter_akhir')
            );
            
            // Perform update
            $this->Penggunaan_model->update_penggunaan($id, $update_data);
            
            // Redirect after successful update
            redirect('admin/penggunaan');
        }
    }        

    public function delete_penggunaan($id) {
        $this->Penggunaan_model->delete_penggunaan($id);
        redirect('admin/penggunaan');
    }

    //TAGIHAN
    public function tagihan() {
        $data['tagihan'] = $this->Tagihan_model->get_all_tagihan();
        $this->load->view('admin/tagihan/index', $data);
    }    

    //PEMBAYARAN
    public function pembayaran() {
        $data['pembayaran'] = $this->Pembayaran_model->get_all_pembayaran();
        $this->load->view('admin/pembayaran/index', $data);
    }

    public function create_pembayaran() {
        $this->load->library('form_validation');
    
        // Ambil input dari form
        $id_tagihan = $this->input->post('id_tagihan');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $biaya_adm = 2500;
        $total_bayar = 0; // Default value, in case it's not calculated
        $id_user = $this->session->userdata('id_user');
        
        // Ambil data pelanggan dari model
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
    
        if ($id_tagihan) {
            // Ambil data tagihan berdasarkan id_tagihan
            $tagihan = $this->Tagihan_model->get_tagihan_by_id($id_tagihan);
            if ($tagihan) {
                // Jika tagihan ditemukan, ambil id_pelanggan dari tagihan
                $id_pelanggan = $tagihan->id_pelanggan;
                // Hitung total bayar berdasarkan tagihan
                $jumlah_meter = $tagihan->jumlah_meter;
                $tarifkwh = $this->Tarif_model->get_tarifkwh_by_pelanggan($id_pelanggan);
                $total_bayar = ($jumlah_meter * $tarifkwh) + $biaya_adm;
            }
        }
    
        // Validasi form
        $this->form_validation->set_rules('tgl_bayar', 'Tanggal Pembayaran', 'required');
        $this->form_validation->set_rules('biaya_adm', 'Biaya Admin', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, tampilkan kembali form dengan data yang sudah diisi sebelumnya
            $data['tagihan'] = $this->Tagihan_model->get_all_tagihan_non_lunas();
            $data['total_bayar'] = $total_bayar; // Assign $total_bayar to view data
            
            $this->load->view('admin/pembayaran/create', $data);
        } else {
            // Simpan data pembayaran ke database
            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'id_tagihan' => $id_tagihan,
                'tanggal_pembayaran' => $tgl_bayar,
                'biaya_admin' => $biaya_adm,
                'total_bayar' => $total_bayar,
                'id_user' => $id_user
            );
    
            $this->Pembayaran_model->create_pembayaran($data);
    
            // Update status tagihan menjadi lunas
            $this->Tagihan_model->update_status_tagihan($id_tagihan, 'lunas');
    
            // Redirect ke halaman pembayaran setelah berhasil disimpan
            redirect('admin/pembayaran');
        }
    }

}