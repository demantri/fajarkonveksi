<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Register_model extends CI_Model
{
    private $_table = "pengunjung";

    // public function getAll()
    // {
    //     $this->db->select('artikel.*, user.nama');
    //     $this->db->join('user', 'user.id_user = '.$this->_table.'.id_user');
    //     return $this->db->get($this->_table)->result();
    // }
    //
    // public function getById($id)
    // {
    //     return $this->db->get_where($this->_table, ["id_artikel" => $id])->row();
    // }

    // simpan data pendaftaran - validasi data dan diset level akses ibu Hamil (2)
    public function save($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    // public function update($data)
    // {
    //     $id = ['id_artikel' => $this->input->post('id')];
    //
    //     $this->db->update($this->_table, $data, $id);
    // }
    //
    // public function delete($id)
    // {
    //     $this->db->delete($this->_table, array('id_artikel' => $id));
    // }
}
