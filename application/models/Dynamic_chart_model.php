<?php

class Dynamic_chart_model extends CI_Model
{
    private $_table = "survey";
    private $_table2 = "subsoal";
    // fetch subsoal berdasarkan semua yang ada di table survey
    function fetch_subsoal($grupid)
    {
        $this->db->select('*');
        $this->db->join('subsoal sb', 'sb.subid = sr.id_subsoal');
        $this->db->from('survey sr');
        $this->db->where('sb.grupid', $grupid);
        $this->db->group_by('id_subsoal');
        $this->db->order_by('id_subsoal', 'ASC');
        return $this->db->get();
    }

    function fetch_chart_data($id_subsoal)
    {
        
        $this->db->select('namajawaban, count(namajawaban) AS total');
        $this->db->from('survey');
        $this->db->group_by('namajawaban');
        $this->db->order_by('total', 'desc');
        $this->db->where('id_subsoal', $id_subsoal);
        return $this->db->get();
        
    }
    function coba($id)
    {
        
        $this->db->select('namajawaban, count(namajawaban) AS total');
        $this->db->from('survey');
        $this->db->group_by('namajawaban');
        $this->db->order_by('total', 'desc');
        $this->db->where('id_subsoal', $id);
        return $this->db->get();
        
    }
    function coba2($id)
    {
        
        $this->db->select('namajawaban, count(namajawaban) AS total');
        $this->db->from('survey');
        $this->db->group_by('namajawaban');
        $this->db->order_by('total', 'desc');
        $this->db->where('id_subsoal', $id);
        return $this->db->get();
        
    }
    function tes($id)
    {
        
        $this->db->select('id_subsoal,namajawaban, count(namajawaban) AS total');
        $this->db->from('survey');
        $this->db->group_by('namajawaban');
        $this->db->order_by('total', 'desc');
        $this->db->where('id_subsoal', $id);
        //return $this->db->get();
        $query = $this->db->get();
        return $query->row();
        
    }



    function fetch_chart_data2()
    {
        $yearQuery = $this->db
            ->select('namajawaban, count(namajawaban) AS total')
            ->group_by('namajawaban')
            ->order_by('total', 'desc')
            ->where('id_subsoal', '$id_subsoal')
            ->get('survey', 10);
        return $yearQuery->result_array();
    }
    // function getId($id_subsoal = null)
    // {
    //     //ambil data dari database where id parameter id_konsultasi
    //     // return $this->db->get('konsultasi')->where("id_konsultasi");
    //     // var_dump($id_konsultasi); die('ds');
    //     return $this->db->get_where($this->_table, ["id_subsoal" => $id_subsoal])->row();
    // }
    public function getid($id_subsoal)
    {
        return $this->db->get_where($this->_table, ["id_subsoal" => $id_subsoal])->row();
    }
    public function carisoal($id)
    {
        return $this->db->get_where($this->_table2, ["subid" => $id])->row();

    }
    
}
