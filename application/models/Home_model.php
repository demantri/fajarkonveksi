<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function profil_toko() {
		$this->db->where('profil_id', 1);
		return $this->db->get('tb_profil')->row_array();
	}

	public function all_produk() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function all_produk_forhome() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}

	public function cari_produk($key) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->like('produk_name', $key);
		$this->db->or_like('produk_price', $key);
		return $this->db->get()->result_array();
	}

	public function cari_artikel($s) {
		$this->db->like('blog_judul', $s);
		$this->db->or_like('blog_isi', $s);
		return $this->db->get('tb_blog')->result_array();
	}

	public function all_slider() {
		$this->db->order_by('slider_urutan', 'ASC');
		return $this->db->get('tb_slider')->result_array();
	}

	public function detail_produk($id,$tag,$url) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->where('produk_url', $url);
		$this->db->where('url', $tag);
		$this->db->where('produk_id', $id);
		return $this->db->get()->row_array();
	}

	public function related_produk($tag) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->where('url', $tag);
		$this->db->limit(4);
		return $this->db->get()->result_array();
	}


	public function detail_artikel($url) {
		return $this->db->get_where('tb_blog', ['blog_url' => $url])->row_array();
	}

	public function all_kategori() {
		return $this->db->get('tb_kategori')->result_array();
	}

	public function data_artikel_for_home() {
		$this->db->order_by('blog_tgl', 'DESC');
		$this->db->limit(3);
		return $this->db->get('tb_blog')->result_array();
	}

	public function data_artikel() {
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function register_user() {
		$id = rand();

		$data = array (

			'user_id'				=>	$id,

			'user_nama'				=>	ucwords($this->input->post('nama')),

			'user_email'			=>	strtolower($this->input->post('email_reg')),

			'user_sandi'			=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT),

			'user_status'			=>	1

		);

		$token = base64_encode(openssl_random_pseudo_bytes(32));

		$member_token = array (
			'email'					=>	strtolower($this->input->post('email_reg')),
			'token'					=>	$token,
			'created'				=>	time()
		);
	
		$this->db->insert('tb_users', $data);
		$this->db->insert('tb_token', $member_token);
		$this->_sendemail($token);
	}

	private function _sendemail($token) {

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'ViloShop';
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '5';
		// $config['smtp_user'] = 'emailanda@gmail.com'; //email anda di sini
		// $config['smtp_pass'] = 'passwordemail'; // password email anda disini
		$config['smtp_user'] = 'taufikgoodman@gmail.com'; //email anda di sini
		$config['smtp_pass'] = 'ag7debctaxld'; // password email anda di sini
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from('taufikgoodman@gmail.com', 'Fajar Konveksi'); //email anda di sini
		$this->email->to($this->input->post('email_reg'));
        $this->email->subject('Email Verifikasi');
		$this->email->message('<h4>Hi, ' .ucwords($this->input->post('nama')) . '</h4>Klik tombol di bawah ini untuk memverifikasi email anda. <p><a href="' . base_url() . 'home/verify?email=' . $this->input->post('email_reg') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Verifikasi</a></p>');

		$this->email->send();
	}

	public function sigin_user() {
		$mail = $this->input->post('email');
		$sandi = $this->input->post('password');

		$cek_blok = $this->db->get_where('tb_users',['user_email' => $mail])->row_array();
		if($cek_blok['user_status'] == 2) {
			$this->session->set_flashdata('error','Maaf, akun anda terblokir');

			redirect('account');
		}

		$cek_user = $this->db->get_where('tb_users',['user_email' => $mail])->row_array();
		if($cek_user) {
			if($cek_user['user_status'] == 1) {
				if(password_verify($sandi, $cek_user['user_sandi'])) {
					$sess_create = array (
						'userid'			=>	$cek_user['user_id'],
						'username'			=>	$cek_user['user_nama'],
						'usermail'			=>	$cek_user['user_email'],
						'userpass'			=>	$cek_user['user_sandi'],
						'userstat'			=>	$cek_user['user_status'],
						'usercreated'		=>	$cek_user['user_created'],
						'loginstatus'		=>	'6484bbvnvfdswuieywor3443993'
					);

					$this->session->set_userdata($sess_create);
					redirect('user');
				}else {
					$this->session->set_flashdata('error','Password anda salah');
					redirect('account');
				}
			}else {
				$this->session->set_flashdata('error','Error');
				redirect('account');
			}
		}else {
			$this->session->set_flashdata('error','Email tidak ditemukan');
			redirect('account');
		}
	}

	public function data_cart() {
		$this->db->where('cart_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_cart')->result_array();
	}

	public function simpan_transaksi() {

		$id_order = time();
		$prov = explode(",", $this->input->post('prov', TRUE));
		$kota = explode(",", $this->input->post('kota', TRUE));
		$alamat = $this->input->post('alamat', TRUE);
		$pos = $this->input->post('kd_pos', TRUE);
		$kurir = $this->input->post('kurir', TRUE);
		$layanan = explode(",", $this->input->post('layanan', TRUE));
		$ongkir = $this->input->post('ongkir', TRUE);
		$total = $this->input->post('total', TRUE);
		$tgl_pesan = date("Y-m-d");
		$bts = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
		$note = $this->input->post('note');

		$data = array (
			'transaksi_id'				=> $id_order,
			'transaksi_userid'			=> $this->session->userdata('userid'),
			'transaksi_total'			=> $total,
			'transaksi_tujuan'			=> $alamat,
			'transaksi_pos'				=> $pos,
			'transaksi_prov'			=> $prov[1],
			'transaksi_kota'			=> $kota[1],
			'transaksi_kurir'			=> $kurir,
			'transaksi_service'			=> $layanan[1],
			'transaksi_tgl_pesan'		=> $tgl_pesan,
			'transaksi_bts_bayar'		=> $bts,
			'transaksi_status'			=> 'belum',
			'transaksi_note'			=> $note
		);

		if($this->db->insert('tb_transaksi', $data)) {
			foreach ($this->cart->contents() as $key) {
				$detail = array (
					'd_transaksi_id'		=> $id_order,
					'd_transaksi_item'		=> $key['id'],
					'd_transaksi_qty' 		=> $key['qty'],
					'd_transaksi_biaya' 	=> $key['subtotal']
				);

				$this->db->insert('tb_detail_transaksi', $detail);
			}
			$this->cart->destroy();
			$this->session->set_flashdata('flash', 'Transaksi berhasil, silahkan pilih metode pembayaran anda');
			redirect('method');
		}else {
			$this->session->set_flashdata('error', 'Transaksi gagal, silahkan coba lagi');
			redirect('checkout');
		}
	}

	public function produkbytag($url) {
		$this->db->select('*');
		$this->db->from('tb_rkategori');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_rkategori.id_item');
		$this->db->where('url', $url);
		return $this->db->get()->result_array();
	}



	public function simpan_pesan() {
		$data = array (
			'pesan_id'			=>   md5(microtime()),
			'pesan_nama'		=>   ucwords($this->input->post('nama')),
			'pesan_email'		=>   strtolower($this->input->post('mail')),
			'pesan_tgl'			=>   date('Y-m-d H:i:s'),
			'pesan_subjek'		=>   ucwords($this->input->post('subject')),
			'pesan_isi'			=>   $this->input->post('message'),
		);
	
		$this->db->insert('tb_pesan', $data);
		$this->simpan_notif_pesan();
	}

	public function simpan_notif_pesan() {
		$data = array (
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Pesan baru',
			'notif_dari'		=>   $this->session->userdata('username'),
			'notif_status'		=>   0,
		);
	
		$this->db->insert('tb_notifikasi', $data);
	}

	public function simpan_notif() {
		$data = array (
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Transaksi baru',
			'notif_dari'		=>   $this->session->userdata('username'),
			'notif_status'		=>   0,
		);
	
		$this->db->insert('tb_notifikasi', $data);
	}
}