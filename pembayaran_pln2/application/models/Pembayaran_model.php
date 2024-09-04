<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_all_pembayaran() {
        $this->db->select('pembayaran.id_pembayaran, tagihan.id_tagihan, tagihan.id_pelanggan, pembayaran.tanggal_pembayaran, pembayaran.biaya_admin, pembayaran.total_bayar, user.id_user');
        $this->db->from('pembayaran');
        $this->db->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan');
        $this->db->join('user', 'pembayaran.id_user = user.id_user', 'left'); // Left join dengan user
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pembayaran_by_id($id) {
        return $this->db->get_where('pembayaran', array('id_pembayaran' => $id))->row();
    }

    public function create_pembayaran($data) {
        // Validasi data sebelum insert (contoh)
        if ($this->db->insert('pembayaran', $data)) {
            return true; // Berhasil disimpan
        } else {
            return false; // Gagal disimpan
        }
    }

    public function get_pembayaran_by_pelanggan($id_pelanggan) {
        $this->db->select('pembayaran.id_pembayaran, tagihan.id_tagihan, tagihan.id_pelanggan, pembayaran.tanggal_pembayaran, pembayaran.biaya_admin, pembayaran.total_bayar, user.id_user');
        $this->db->from('pembayaran');
        $this->db->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan');
        $this->db->join('user', 'pembayaran.id_user = user.id_user', 'left');
        $this->db->where('tagihan.id_pelanggan', $id_pelanggan); // Filter berdasarkan id_pelanggan
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>
