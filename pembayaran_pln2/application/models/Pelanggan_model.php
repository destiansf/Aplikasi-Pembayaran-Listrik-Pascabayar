<?php
class Pelanggan_model extends CI_Model {

    public function get_all_pelanggan() {
        return $this->db->get('pelanggan')->result();
    }

    public function get_pelanggan_by_id($id) {
        $query = $this->db->get_where('pelanggan', array('id_pelanggan' => $id));
        return $query->row();
    }

    public function create_pelanggan($data) {
        $this->db->insert('pelanggan', $data);
    }    

    public function update_pelanggan($id, $data) {
        $this->db->where('id_pelanggan', $id);
        $this->db->update('pelanggan', $data);
    }

    public function delete_pelanggan($id) {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');
    }
}
?>
