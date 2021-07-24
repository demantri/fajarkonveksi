<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Laporan_model');
		if($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
	}

	public function index() {
		$data['title'] = 'Halaman Administrator';
		$data['profit'] = $this->Laporan_model->hasil();
		$data['totalproduk'] = $this->db->get('tb_produk')->num_rows();
		$data['totaluser'] = $this->db->get('tb_users')->num_rows();
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/admin/footer');
	}

	public function akun()
	{
		# code...
		$data['title'] = 'Data Akun';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['akun'] = $this->db->get('akun')->result();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/akun/index', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_akun()
	{
		$data['title'] = 'Data Akun';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/akun/form_add');
		$this->load->view('tema/admin/footer');
	}

	public function save_akun()
	{
		$no_akun = $this->input->post('no_akun');
		$header_akun = substr($this->input->post('no_akun'),0,1);
		$nm_akun = $this->input->post('nm_akun');
		$saldo_awal = $this->input->post('saldo_awal');

		$this->form_validation->set_rules('nm_akun', 'Akun', 'is_unique[akun.nm_akun]', 
			[
				'is_unique'	=>	'%s sudah terdaftar sebelumnya.'
			]
		);
		if($this->form_validation->run() == FALSE) {
			$this->add_akun();
		}else {
			$data = [
				'no_akun' => $no_akun, 
				'header_akun' => $header_akun, 
				'nm_akun' => $nm_akun, 
				'saldo_awal' => $saldo_awal 
			];
			$this->db->insert('akun', $data);
			$this->session->set_flashdata('flash', 'Akun baru berhasil ditambahkan');
			redirect('admin/akun');
		}
	}

	public function produk() {
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->Admin_model->data_produk();
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_produk() {
		$data['title'] = 'Tambah Produk Baru';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['rk'] = '';
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harga harus berupa angka']);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'numeric'	=>	'Harus berupa angka']);
// 		$this->form_validation->set_rules('status-produk', 'status-produk', 'required', [
// 				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('deskripsi-produk', 'deskripsi-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori-produk', 'kategori-produk', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_produk', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_produk();
			$this->session->set_flashdata('flash', 'Produk baru berhasil ditambahkan');
			redirect('admin/produk');
		}
	}

	public function edit_produk($id) {
		$data['title'] = 'Edit Produk';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['produkid'] = $this->Admin_model->produkbyid($id);
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harga harus berupa angka']);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'numeric'	=>	'Harus berupa angka']);
// 		$this->form_validation->set_rules('status-produk', 'status-produk', 'required', [
// 				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('deskripsi-produk', 'deskripsi-produk', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_produk', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->ubah_produk();
			$this->session->set_flashdata('flash', 'Produk berhasil diperbaharui');
			redirect('admin/produk');
		}
	}

	public function hapus_produk($id) {
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_produk($id);
		$this->session->set_flashdata('flash', 'Produk berhasil dihapus');
		redirect('admin/produk');
	}

	public function kategori() {
		$data['title'] = 'Data Kategori';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kategori'] = $this->Admin_model->data_kategori();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('tema/admin/footer');
	}

	public function hapus_kategori($id) {
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_kategori($id);
		$this->session->set_flashdata('flash', 'Kategori berhasil dihapus');
		redirect('admin/kategori');
	}



	public function baca_notif() {
		$this->db->set('notif_status', 1);
		$this->db->where('notif_id', $this->uri->segment(3));
		$this->db->update('tb_notifikasi');
		redirect('admin/transaksi');
	}

	public function baca_pesan() {
		$this->db->set('notif_status', 1);
		$this->db->where('notif_id', $this->uri->segment(3));
		$this->db->update('tb_notifikasi');
		redirect('admin/pesan');
	}

	public function transaksi() {
		$data['title'] = 'Data Transaksi';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('tema/admin/footer');
	}

	
	public function saran() {
		$data['title'] = 'Saran';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_saran();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/saran', $data);
		$this->load->view('tema/admin/footer');
	}

	public function konfirmasi_transaksi() {
		$id = $this->uri->segment(3);
		$this->db->where('transaksi_id', $id);
		$ambil_nominal = $this->db->get('tb_transaksi')->row()->transaksi_total;
		// print_r($ambil_data);exit;
		$this->db->set('transaksi_status', 'diproses');
		$this->db->where('transaksi_id', $this->uri->segment(3));
		$this->db->update('tb_transaksi');
		$this->session->set_flashdata('flash', 'Transaksi berhasil dikonfirmasi');

		// insert jurnal 
		$kas = [
			'id_transaksi' => $id,
			'tgl_jurnal' => date('Y-m-d'),
			'no_coa' => 111,
			'nominal' => $ambil_nominal,
			'posisi_dr_cr' => 'd',
		];
		$this->db->insert('jurnal', $kas);
		$penjualan = [
			'id_transaksi' => $id,
			'tgl_jurnal' => date('Y-m-d'),
			'no_coa' => 400,
			'nominal' => $ambil_nominal,
			'posisi_dr_cr' => 'k',
		];
		$this->db->insert('jurnal', $penjualan);
		redirect('admin/transaksi');
	}

	public function detail_transaksi($id) {
		$data['title'] = 'Detail Transaksi';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/detail_transaksi', $data);
		$this->load->view('tema/admin/footer');
	}

	public function cetak_invoice($id) {
		$data['title'] = 'Invoice';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('admin/cetak_invoice', $data);
	}

	public function artikel() {
		$data['title'] = 'Data Artikel Blog';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['artikel'] = $this->Admin_model->data_artikel();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/artikel', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_post() {
		$data['title'] = 'Buat Postingan Baru';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->form_validation->set_rules('judul', 'judul', 'required|min_length[5]', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('isi', 'isi', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_post', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_artikel();
			$this->session->set_flashdata('flash', 'Postingan baru berhasil ditambahkan');
			redirect('admin/artikel');
		}
	}

	public function edit_post($id) {
		$data['title'] = 'Edit Produk';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['artikelid'] = $this->Admin_model->artikelbyid($id);
		$this->form_validation->set_rules('judul', 'judul', 'required|min_length[5]', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('isi', 'isi', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_post', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->ubah_artikel();
			$this->session->set_flashdata('flash', 'Postingan berhasil diperbaharui');
			redirect('admin/artikel');
		}
	}

	public function hapus_post($id) {
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_artikel($id);
		$this->session->set_flashdata('flash', 'Postingan berhasil dihapus');
		redirect('admin/artikel');
	}

	public function slider() {
		$data['title'] = 'Slider Homepage';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['slider'] = $this->Admin_model->data_slider();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/slider', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_slider() {
		$data['title'] = 'Tambahkan slider baru';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->form_validation->set_rules('teks1', 'teks1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('teks2', 'teks2', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('urutan', 'urutan', 'required|numeric|min_length[1]|max_length[2]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus angka',
					'min_length'=>	'Minimal 1 angka',
					'max_length'=>	'Maksimal 2 angka']);
		$this->form_validation->set_rules('gaya', 'gaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_slider', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_slider();
			$this->session->set_flashdata('flash', 'Slider baru berhasil ditambahkan');
			redirect('admin/slider');
		}
	}

	public function hapus_slider($id) {
		$this->Admin_model->cek_aks();
		$this->Admin_model->del_slider($id);
		$this->session->set_flashdata('flash', 'Slider terpilih berhasil dihapus');
		redirect('admin/slider');
	}

	public function profil() {
		$data['title'] = 'Perbaharui Profil Toko';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['profiltoko'] = $this->Admin_model->profiltoko();
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'valid_email', [
					'valid_email'=>	'Email tidak valid']);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric|min_length[10]|max_length[14]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus angka',
					'min_length'=>	'Minimal 10 angka',
					'max_length'=>	'Maksimal 14 angka']);
		$this->form_validation->set_rules('telp', 'telp', 'numeric|min_length[10]|max_length[14]', [
					'numeric'	=>	'Harus angka',
					'min_length'=>	'Minimal 10 angka',
					'max_length'=>	'Maksimal 14 angka']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/profil', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->simpan_profiltoko();
			$this->session->set_flashdata('flash', 'Profil toko berhasil diperbaharui');
			redirect('admin/profil');
		}
	}

	public function member() {
		$data['title'] = 'Data Member/Pelanggan';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['member'] = $this->Admin_model->data_member();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('tema/admin/footer');
	}

	public function blokir_user() {
		$this->db->set('user_status', 2);
		$this->db->where('user_id', $this->uri->segment(3));
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash', 'User berhasil diblokir');
		redirect('admin/member');
	}

	public function aktifkan_user() {
		$this->db->set('user_status', 1);
		$this->db->where('user_id', $this->uri->segment(3));
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash', 'User berhasil diaktifkan kembali');
		redirect('admin/member');
	}

	public function pesan() {
		$data['title'] = 'Data Pesan Masuk';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['pesan'] = $this->Admin_model->data_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/pesan', $data);
		$this->load->view('tema/admin/footer');
	}

	public function edit_profil() {
		$data['title'] = 'Perbaharui Profil Saya';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['profilsaya'] = $this->Admin_model->profilku();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'regex_match'=>	'Nama harus berupa huruf']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email tidak valid']);
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_profil', $data);
			$this->load->view('tema/admin/footer');
		}else {
			$this->Admin_model->cek_aks();
			$this->Admin_model->cek_ganti_profil();
		}
	}

	public function edit_sandi() {
		$data['title'] = 'Perbaharui Kata Sandi Saya';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->form_validation->set_rules('sandi2', 'sandi2', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi sandi baru harus sama']);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_sandi', $data);
			$this->load->view('tema/admin/footer');
		}else {
			// $this->Admin_model->cek_aks();
			$this->Admin_model->cek_ganti_password();
		}
	}

}
