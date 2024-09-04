<?php
class Tarif_model extends CI_Model {

    public function get_all_tarif() {
        $query = $this->db->get('tarif');
        return $query->result();
    }

    public function get_tarifperkwh_by_id($id_tarif) {
        $this->db->select('tarifperkwh');
        $this->db->from('tarif');
        $this->db->where('id_tarif', $id_tarif);
        $query = $this->db->get();
        return $query->row()->tarifperkwh;
    }

    public function get_tarifkwh_by_pelanggan($id_pelanggan) {
        $this->db->select('tarif.tarifperkwh');
        $this->db->from('pelanggan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        $this->db->where('pelanggan.id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        $result = $query->row();
        if ($result) {
            return $result->tarifperkwh;
        } else {
            return 0; // Atau nilai default jika tidak ditemukan
        }
    }
}
?>
