<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    // Method untuk menyimpan data tagihan baru
    public function insert($data) {
        // Cek apakah tagihan sudah ada berdasarkan id_penggunaan, bulan, dan tahun
        $this->db->where('id_penggunaan', $data['id_penggunaan']);
        $this->db->where('bulan', $data['bulan']);
        $this->db->where('tahun', $data['tahun']);
        $query = $this->db->get('tagihan');

        if ($query->num_rows() == 0) {
            // Jika belum ada, buat tagihan baru
            return $this->db->insert('tagihan', $data);
        } else {
            // Jika sudah ada, kembalikan false atau bisa memperbarui tagihan yang ada
            return false;
        }
    }
    
    // Method untuk mengambil semua data tagihan
    public function get_all_tagihan() {
        $this->db->select('tagihan.id_tagihan, penggunaan.id_penggunaan, penggunaan.bulan, penggunaan.tahun, penggunaan.id_pelanggan, (penggunaan.meter_akhir - penggunaan.meter_awal) as jumlah_meter, tagihan.status');
        $this->db->from('tagihan');
        $this->db->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan');
        $query = $this->db->get();
        return $query->result();
    }

    // Method untuk mengambil data tagihan berdasarkan ID
    public function get_tagihan_by_id($id) {
        $query = $this->db->get_where('tagihan', array('id_tagihan' => $id));
        return $query->row();
    }    
    
    public function update_status_tagihan($id_tagihan, $status) {
        $this->db->where('id_tagihan', $id_tagihan);
        $this->db->update('tagihan', array('status' => $status));
    }    

    public function get_all_tagihan_non_lunas() {
        $this->db->select('tagihan.id_tagihan, tagihan.id_penggunaan, tagihan.bulan, tagihan.status, pelanggan.username');
        $this->db->from('tagihan');
        $this->db->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penggunaan.id_pelanggan');
        $this->db->where('tagihan.status !=', 'lunas');
        return $this->db->get()->result();
    }

    //METHOD BUAT DASHBOARD CUSTOMER
    public function get_tagihan_by_pelanggan($id_pelanggan) {
        $this->db->select('tagihan.id_tagihan, penggunaan.id_penggunaan, penggunaan.bulan, penggunaan.tahun, penggunaan.id_pelanggan, (penggunaan.meter_akhir - penggunaan.meter_awal) as jumlah_meter, tagihan.status');
        $this->db->from('tagihan');
        $this->db->join('penggunaan', 'tagihan.id_penggunaan = penggunaan.id_penggunaan');
        $this->db->where('penggunaan.id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
