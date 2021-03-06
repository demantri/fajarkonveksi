<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Laporan_model');
		$this->load->model('Admin_model');
		if($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
	}

	public function transaksi() {
		$data['title'] = 'Laporan Transaksi';
		$data['start'] = date('Y-m-d');
		$data['end'] = date('Y-m-d');
		$data['transaksi'] = $this->Laporan_model->data_transaksi();
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('laporan/transaksi', $data);
		$this->load->view('tema/admin/footer');
	}

	public function jurnalumum()
	{
		# code...
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		if (isset($start, $end)) {
			$periode = $start.' s/d '.$end;
			$data['transaksi'] = $this->Laporan_model->data_transaksi();
			$data['notifikasi'] = $this->Admin_model->data_notifikasi();
			$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
			$data['title'] = 'Jurnal Umum';
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
			$data['list'] = $this->Admin_model->getJurnal($start, $end)->result();
			$data['periode'] = $periode;
	
			$this->load->view('tema/admin/header', $data);
			$this->load->view('laporan/jurnal', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data['transaksi'] = $this->Laporan_model->data_transaksi();
			$data['notifikasi'] = $this->Admin_model->data_notifikasi();
			$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
			$data['title'] = 'Jurnal Umum';
			$data['start'] = date('Y-m-d');
			$data['end'] = date('Y-m-d');
			$data['list'] = $this->Admin_model->getJurnal($start, $end)->result();
			$data['periode'] = '-';

	
			$this->load->view('tema/admin/header', $data);
			$this->load->view('laporan/jurnal', $data);
			$this->load->view('tema/admin/footer');
		}
	}

	public function bukubesar()
	{
		$akun = $this->input->post('akun');
		$periode = $this->input->post('periode');
		if (isset($periode, $akun)) {
			$tahun1 = date('Y', strtotime($periode));
			$bulan1 = date('m', strtotime($periode));
			$cek = date('m-d-Y', mktime(0,0,0,1, $bulan1-1, $tahun1));
			$bulan = substr($cek, 3,2);
			$tahun = substr($cek, 6,5);
			$query = "SELECT sum(nominal) as debit , 
			(
				SELECT sum(nominal) 
				FROM jurnal 
				WHERE no_coa = '$akun' 
				AND MONTH(tgl_jurnal) <= '$bulan' 
				AND YEAR(tgl_jurnal) <= '$tahun' 
				and posisi_dr_cr = 'k' 
			) AS kredit 
			FROM jurnal 
			WHERE no_coa = '$akun' 
			AND MONTH(tgl_jurnal) <= '$bulan' 
			AND YEAR(tgl_jurnal) <= '$tahun' 
			and posisi_dr_cr = 'd'
			";
			$saldo_awal = $this->db->query($query)->row();
			$list = $this->Laporan_model->getBB($akun, $periode)->result();
			$coa = $this->db->get('akun')->result();
			

			$this->db->where('no_akun', $akun);
			$nm_akun = $this->db->get('akun')->row()->nm_akun; 
			// print_r($nm_akun);exit;

			$data = [
				'transaksi' => $this->Laporan_model->data_transaksi(), 
				'notifikasi' => $this->Admin_model->data_notifikasi(),
				'pesanmasuk' => $this->Admin_model->data_notifikasi_pesan(),
				'title' => 'Buku Besar', 
				'saldo_awal' => $saldo_awal, 
				'akun' => $coa, 
				'list' => $list, 
				'nm_akun' => $nm_akun, 
				'no_akun' => $akun, 
				'periode' => date('F Y', strtotime($periode))
			];
			$this->load->view('tema/admin/header', $data);
			$this->load->view('laporan/bukubesar', $data);
			$this->load->view('tema/admin/footer');
		} else {
			# code...
			$tahun1 = date('Y', strtotime($periode));
			$bulan1 = date('m', strtotime($periode));
			$cek = date('m-d-Y', mktime(0,0,0,1, $bulan1-1, $tahun1));
			$bulan = substr($cek, 3,2);
			$tahun = substr($cek, 6,5);
			$query = "SELECT sum(nominal) as debit , 
			(
				SELECT sum(nominal) 
				FROM jurnal 
				WHERE no_coa = '$akun' 
				AND MONTH(tgl_jurnal) <= '$bulan' 
				AND YEAR(tgl_jurnal) <= '$tahun' 
				and posisi_dr_cr = 'k' 
			) AS kredit 
			FROM jurnal 
			WHERE no_coa = '$akun' 
			AND MONTH(tgl_jurnal) <= '$bulan' 
			AND YEAR(tgl_jurnal) <= '$tahun' 
			and posisi_dr_cr = 'd'
			";
			$saldo_awal = $this->db->query($query)->row();
			$list = $this->Laporan_model->getBB($akun, $periode)->result();
			$coa = $this->db->get('akun')->result();

			$data = [
				'transaksi' => $this->Laporan_model->data_transaksi(), 
				'notifikasi' => $this->Admin_model->data_notifikasi(),
				'pesanmasuk' => $this->Admin_model->data_notifikasi_pesan(),
				'title' => 'Buku Besar', 
				'saldo_awal' => $saldo_awal, 
				'akun' => $coa, 
				'list' => $list, 
				'nm_akun' => '-', 
				'no_akun' => '-', 
				'periode' => '-'
			];
			$this->load->view('tema/admin/header', $data);
			$this->load->view('laporan/bukubesar', $data);
			$this->load->view('tema/admin/footer');
		}
		
	}

	public function print_trx() {
		$data['title'] = 'Laporan Transaksi';
		$data['start'] = $this->input->post('start');
		$data['end'] = $this->input->post('end');
		$data['transaksi'] = $this->Laporan_model->data_transaksi();
		$this->load->view('laporan/print_trx', $data);
	}

	public function pdf_trx() {
		$title = "Laporan Transaksi";
		$start = $this->uri->segment(3);
		$end = $this->uri->segment(4);
		$transaksi = $this->Laporan_model->data_transaksi();
		$pdf = new FPDF('l','mm','Legal');
                // membuat halaman baru
                $pdf->AddPage();
                // setting jenis font yang akan digunakan
                $pdf->SetFillColor(112, 226, 137);
                $pdf->SetFont('Arial','B',16);
                // mencetak string 
                $pdf->Cell(330,7,"Fajar Konveksi Store",0,1,'C');
                // $pdf->Cell(10,10,'',0,1);
                $pdf->SetFont('Arial','B',14);
                $pdf->Cell(330,7,$title,0,1,'C');
                $pdf->Ln(7);
        		// $pdf->Rect(0, 15, 80, 15, 'F');
                $pdf->SetFont('Times','B',12);
                $pdf->Cell(10,10,'No',1,0,'C',1);
                $pdf->Cell(40,10,'No Transaksi',1,0,'C',1);
                $pdf->Cell(40,10,'Tgl Pesan',1,0,'C',1);
                $pdf->Cell(30,10,'Kadaluwarsa',1,0,'C',1);
                $pdf->Cell(50,10,'Dari',1,0,'C',1);
                $pdf->Cell(30,10,'Total',1,0,'C',1);
                $pdf->Cell(110,10,'Tujuan',1,0,'C',1);
                $pdf->Cell(20,10,'Status',1,1,'C',1);

                $pdf->SetFont('Times','',10);
                $i = 1;
                $pendapatan = 0;
                foreach($transaksi as $ss) {
                	$pendapatan += $ss['transaksi_total'];
                	$pdf->Cell(10,10,$i.'.',1,0,'C');
                	$pdf->Cell(40,10,$ss['transaksi_id'].'.',1,0,'l');
                	$pdf->Cell(40,10,date('d-m-Y H:i:s', strtotime($ss['transaksi_time'])),1,0,'l');
                	$pdf->Cell(30,10,date('d-m-Y', strtotime($ss['transaksi_bts_bayar'])),1,0,'l');
                	$pdf->Cell(50,10,$ss['user_nama'],1,0,'l');
                	$pdf->Cell(30,10,number_format($ss['transaksi_total'],0,',','.'),1,0,'l');
                	$pdf->Cell(110,10,$ss['transaksi_tujuan'],1,0,'l');
                	$pdf->Cell(20,10,ucwords($ss['transaksi_status']),1,1,'l');
                	$i++;
                }
                $pdf->SetFont('Times','B',12);
                $pdf->Cell(50,10,'Pendapatan',1,0,'C',1);
                $pdf->Cell(280,10,'Rp. '.number_format($pendapatan,0,',','.'),1,0,'C',1);
                $pdf->Output('D', $title.'.pdf');
	}

	public function excel_trx() {
		$data['title'] = 'Laporan Transaksi';
		$start = $this->uri->segment(3);
		$end = $this->uri->segment(4);
		$data['transaksi'] = $this->Laporan_model->data_transaksi();
		$this->load->view('laporan/excel_transaksi', $data);
	}

	public function lihat_transaksi() {
		$data['title'] = 'Laporan Transaksi';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['start'] = $this->input->post('start');
		$data['end'] = $this->input->post('end');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$data['transaksi'] = $this->Laporan_model->laporan_data_transaksi(array($start,$end));
		$this->load->view('tema/admin/header', $data);
		$this->load->view('laporan/transaksi', $data);
		$this->load->view('tema/admin/footer');
		
	}

	public function print_transaksi() {
		$data['title'] = 'Laporan Transaksi';
		$start = $this->uri->segment(3);
		$end = $this->uri->segment(4);
		$data['transaksi'] = $this->Laporan_model->laporan_data_transaksi(array($start,$end));
		$this->load->view('laporan/print_trx', $data);
	}

	public function pdf_transaksi() {
		$title = "Laporan Transaksi";
		$start = $this->uri->segment(3);
		$end = $this->uri->segment(4);
		$transaksi = $this->Laporan_model->laporan_data_transaksi(array($start,$end));
		$pdf = new FPDF('l','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFillColor(112, 226, 137);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(330,7,"Fajar Konveksi Store",0,1,'C');
        // $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(330,7,$title,0,1,'C');
        $pdf->Ln(7);
		// $pdf->Rect(0, 15, 80, 15, 'F');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,10,'No',1,0,'C',1);
        $pdf->Cell(40,10,'No Transaksi',1,0,'C',1);
        $pdf->Cell(40,10,'Tgl Pesan',1,0,'C',1);
        $pdf->Cell(30,10,'Kadaluwarsa',1,0,'C',1);
        $pdf->Cell(50,10,'Dari',1,0,'C',1);
        $pdf->Cell(30,10,'Total',1,0,'C',1);
        $pdf->Cell(90,10,'Tujuan',1,0,'C',1);
        $pdf->Cell(40,10,'Status',1,1,'C',1);

        $pdf->SetFont('Times','',10);
        $i = 1;
        $pendapatan = 0;
        foreach($transaksi as $ss) {
        	$pendapatan += $ss['d_transaksi_biaya'];
        	$pdf->Cell(10,10,$i.'.',1,0,'C');
        	$pdf->Cell(40,10,$ss['transaksi_id'].'.',1,0,'l');
        	$pdf->Cell(40,10,date('d-m-Y H:i:s', strtotime($ss['transaksi_time'])),1,0,'l');
        	$pdf->Cell(30,10,date('d-m-Y', strtotime($ss['transaksi_bts_bayar'])),1,0,'l');
        	$pdf->Cell(50,10,$ss['user_nama'],1,0,'l');
        	$pdf->Cell(30,10,number_format($ss['transaksi_total'],0,',','.'),1,0,'l');
        	$pdf->Cell(90,10,$ss['transaksi_tujuan'],1,0,'l');
        	$pdf->Cell(40,10,ucwords($ss['transaksi_status']),1,1,'l');
        	$i++;
        }
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(50,10,'Pendapatan',1,0,'C',1);
        $pdf->Cell(280,10,'Rp. '.number_format($pendapatan,0,',','.'),1,0,'l',1);
        $pdf->Output('D', $title.'.pdf');
	}

	public function excel_transaksi() {
		$data['title'] = 'Laporan Transaksi';
		$start = $this->uri->segment(3);
		$end = $this->uri->segment(4);
		$data['transaksi'] = $this->Laporan_model->laporan_data_transaksi(array($start,$end));
		$this->load->view('laporan/excel_transaksi', $data);
	}

}
