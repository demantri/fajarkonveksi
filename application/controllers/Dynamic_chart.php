<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dynamic_chart extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('dynamic_chart_model');
    $this->load->model('groupsoal_model');

    $this->load->database();
    $this->load->helper(array('url', 'html', 'form'));
    $this->load->model('Admin_model');
		$this->load->model('Laporan_model');
		if($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
  }


  // get sub soal by group id
  function fetch_subsoal()
  {
    $group_id = $this->input->post('id', TRUE);
    $data = $this->dynamic_chart_model->fetch_subsoal($group_id)->result();
    echo json_encode($data);
  }


  // get chart berdasarkan id subsoal
  function fetch_yearwise()
  {
    $id_sub = $this->input->post('id_subsoal', TRUE);
    $data = $this->dynamic_chart_model->fetch_chart_data($id_sub);

    foreach ($data->result_array() as $row) {
      $output[] = array(
        'namajawaban'  => $row["namajawaban"],
        'total' => $row["total"]
      );
    }

    echo json_encode($output);
    $this->session->set_userdata('id_subsoal',$id_sub);
  }

function fetch_yearwise2($id = null)
  {
    $id = $this->session->userdata('id_subsoal');
    $data = $this->dynamic_chart_model->coba2($id);

    foreach ($data->result_array() as $row) {
      $output[] = array(
        'namajawaban'  => $row["namajawaban"],
        'total' => $row["total"]
      );
    }
    
    echo json_encode($output);
  }

    public function printgrafik($id = null)
  {
    $id = $this->session->userdata('id_subsoal');
    $data['carisoal'] = $this->dynamic_chart_model->carisoal($id);
    $data['tes'] = $this->dynamic_chart_model->tes($id);
    $this->load->view('admin/grafik/printgrafik', $data);

    //$id_sub = $this->input->post('id_subsoal', TRUE);
    //$data = $this->dynamic_chart_model->coba($id);

    // foreach ($data->result_array() as $row) {
    //   $output[] = array(
    //     'namajawaban'  => $row["namajawaban"],
    //     'total' => $row["total"]
    //   );
    // }
    // echo json_encode($output);

  }




  function index()
  {
    $data['groupsoal'] = $this->groupsoal_model->getAll();
    $data['subsoal'] = $this->groupsoal_model->getsubsoal();


    $data['title'] = 'Hasil Kuisioner';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
    $this->load->view('admin/grafik/dynamic_chart', $data);
		$this->load->view('tema/admin/footer');
    //$this->load->view('google_pie_chart', $data);
  }
   public function printgrafik2($id = null) 
    {        
        $data['tes'] = $this->session->userdata('userdata');
        //$data['tes'] = $this->user_model->tes($id);

        $this->load->view('admin/grafik/printgrafik', $data);
        //$this->load->view('admin/grafik/printgrafik');
    }

  function fetch_data()
  {
    if ($this->input->post('id_subsoal')) {
      $yearQuery = $this->dynamic_chart_model->fetch_chart_data2($this->input->post('id_subsoal'));
      foreach ($yearQuery as $mahasiswa) {
        echo "Nama : " . $mahasiswa['namajawaban'] . "<br/>";
        echo "Alamat : " . $mahasiswa['total'] . "<hr/>";
      }
    }
  }
}
