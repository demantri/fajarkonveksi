<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey_model extends CI_Model
{
    private $_table = "subsoal";
    private $_table2 = "jawabansubsoal";

    function getSubSoalById($id)
    {
        return $this->db->get_where($this->_table, ["grupid" => $id])->result();
    }

    function getJawabanSubSoalById($id)
    {
        return $this->db->get_where($this->_table2, ["subsoalid" => $id])->result();
    }

    function save($saran, $data)
    {


        $result = array();
        $index = 0;
        foreach ($data['namajawaban'] as $key => $val) {
            // print($val[0]);
            $result[] = array(
                // 'nama_pensurvey'   => $nama_pensurvey,
                // 'nik'          => $nik,
                'id_subsoal'   => $data['id_subsoal'][$key],
                'namajawaban' => $val[0],
                 'saran'   => $saran,
            );

            $index++;
        }
        
        //MULTIPLE INSERT TO SURVEY TABLE
        $this->db->insert_batch("survey", $result);
        return $this->db->affected_rows();
    }
}
