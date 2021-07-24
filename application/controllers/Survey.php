<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('groupsoal_model');
        $this->load->model('survey_model');
        $this->load->model('register_model');
        $this->load->model('Home_model');
    }

    function check_array($iterasi)
    {
        $namajawaban    =   $this->input->post('namajawaban' . $iterasi);
        $error = 0;
        foreach ($namajawaban as $key => $value) {
            if (!empty($value)) {
                $error = $error + 1;
            }
        }
        if ($error == 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_array', 'Semua bidang kosong. Harap berikan jawaban pada tiap pertanyaan');
            return FALSE;
        }
    }

    public function add()
    {
        // ini session nyo
        // $dataSurvey = $this->session->userdata('userdataSurvey');
        // echo $dataSurvey['nama'];


        // if (empty($dataSurvey)) {
        //     $this->session->set_flashdata('register', 'Anda harus mendaftarkan diri anda terlebih dahulu');
        //     redirect(base_url('register'));
        // }

        //$this->form_validation->set_rules('id_subsoal[]', 'Subnama', 'required');
        //$saran = $this->input->post('saran');
        $this->form_validation->set_rules('saran','Saran','required');



        if ($this->form_validation->run() == TRUE) {
            $iterasi = 1;
            $data = array(
                'id_subsoal' => $this->input->post('id_subsoal[]'),
                //'saran' => $this->input->post('saran'),
            );
            $namajawaban = array();
            while ($this->input->post('namajawaban' . $iterasi . '[]')) { // selamo ado input namo jawaban tambahke di array
                array_push($namajawaban, $this->input->post('namajawaban' . $iterasi . '[]'));

                $iterasi++;
            }
            $data['namajawaban'] = $namajawaban;
            $saran = $this->input->post('saran');
            $this->survey_model->save($saran, $data);
            $this->session->set_flashdata('flash', 'Jawaban Kuisoner Anda Berhasil Dikirim');

        }
        $tampil['groupsoals'] = $this->groupsoal_model->getAll();

        $data['title'] = 'Kuisoner';
        $data['profil'] = $this->Home_model->profil_toko();
        $data['keranjang'] = $this->cart->contents();
        $data['kategori'] = $this->Home_model->all_kategori();
        $this->load->view('tema/home/header', $data);
        $this->load->view('survey', $tampil);
        $this->load->view('tema/home/footer');

    }
}
