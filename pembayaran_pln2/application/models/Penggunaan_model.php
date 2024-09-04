<?php
class Penggunaan_model extends CI_Model {
    public function get_all_penggunaan() {
        return $this->db->get('penggunaan')->result();
    }

    public function get_penggunaan_by_id($id) {
        return $this->db->get_where('penggunaan', array('id_penggunaan' => $id))->row();
    }    

    public function create_penggunaan($data) {
        // Periksa apakah data penggunaan sudah ada berdasarkan id_pelanggan, bulan, dan tahun
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->where('bulan', $data['bulan']);
        $this->db->where('tahun', $data['tahun']);
        $query = $this->db->get('penggunaan');
    
        if ($query->num_rows() == 0) {
            // Jika belum ada, buat penggunaan baru
            return $this->db->insert('penggunaan', $data);
        } else {
            // Jika sudah ada, kembalikan false atau bisa memperbarui penggunaan yang ada
            return false;
        }
    }
        

    public function update_penggunaan($id, $data) {
        $this->db->where('id_penggunaan', $id);
        $this->db->update('penggunaan', $data);
    }    

    public function delete_penggunaan($id) {
        $this->db->where('id_penggunaan', $id);
        $this->db->delete('penggunaan');
    }

    //METHOD BUAT DASHBOARD CUSTOMER
    public function get_penggunaan_by_pelanggan($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get('penggunaan');
        return $query->result();
    }
}
