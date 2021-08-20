<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function cek_aks() {
        $ceks = $this->db->get_where('tb_lock',['lock_id' => 1])->row_array();
        if($ceks['lock_status'] == 'YES') {
            $this->session->set_flashdata('error','Penggunaan versi demo dibatasi');
            redirect('admin');
        }
    }

	public function getJurnal($start, $end)
	{
		$sql = "SELECT a.*, nm_akun
        FROM jurnal a
        INNER JOIN akun b ON a.no_coa = b.no_akun
		WHERE tgl_jurnal BETWEEN '$start' AND '$end'
        ORDER BY id ASC";
        return $this->db->query($sql);
	}

	public function data_produk() {
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get('tb_produk')->result_array();
	}

	public function data_kategori() {
		return $this->db->get('tb_kategori')->result_array();
	}

	private function kategori($id_item, $kategori) {
		$kat = explode(", ", $kategori);
		$len = count($kat);
		$a = array(' ');
		$b = array ('`','~','!','@','#','$','%','^','&','*','(',')','_','+','=','[',']','{','}','\'','"',':',';','/','\\','?','/','<','>');

		for ($i = 0; $i  < $len; $i ++) {
			$url = str_replace($b, '', $kat[$i]);
			$url = str_replace($a, '-', strtolower($url));

			$cek = $this->get_where('tb_kategori', ['url' => $url]);

			if ($cek->num_rows() > 0) {

				$get = $cek->row();
				$id = $get->id_kategori;

			} else {

				$data = array(
					'kategori' => ucwords(trim($kat[$i])),
					'url' => $url
				);

				$id = $this->insert_last('tb_kategori', $data);
			}

			$cek2 = $this->get_where('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id]);

			if ($cek2->num_rows() < 1) {
				$this->insert('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id]);
			}
		}
	}

	public function get_where($table = null, $where = null) {
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function insert_last($table = '', $data = '') {
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function insert($table = '', $data = '') {
		$this->db->insert($table, $data);
	}

	public function simpan_produk() {
		$id = rand();
		$id_item = $id;
	    $judul = ucwords($this->input->post('nama-produk'));
	    $url = url_title(strtolower($judul), 'dash', TRUE).'-'.time().'.html';
	    $tgl = date('Y-m-d H:i:s');
	    $stok = $this->input->post('stok-produk');
	    $berat = $this->input->post('berat-produk');
	    $status = $this->input->post('status-produk');
	    $harga = $this->input->post('harga-produk');
	    $deskripsi = $this->input->post('deskripsi-produk');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/product/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/product/'.$gambar['file_name'];
	            $config['width']= 624;
	            $config['height']= 800;
	            $config['new_image'] = './assets_home/img/product/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'produk_id'					=>	$id,
	                    'produk_url'				=>	$url,
	                    'produk_name'				=>	$judul,
	                    'produk_tgl'				=>	$tgl,
	                    'produk_stok'				=>	$stok,
	                    'produk_weight'				=>	$berat,
	                    'produk_status'				=>	$status,
	                    'produk_price'				=>	$harga,
	                    'produk_description'		=>	$deskripsi,
						'produk_image'				=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_produk');
	    }
	
		$this->db->insert('tb_produk', $data);
		$this->kategori($id_item, $this->input->post('kategori-produk'));
	}
	
	public function ubah_produk() {
	    $judul = ucwords($this->input->post('nama-produk'));
	    $stok = $this->input->post('stok-produk');
	    $berat = $this->input->post('berat-produk');
	    $status = $this->input->post('status-produk');
	    $harga = $this->input->post('harga-produk');
	    $deskripsi = $this->input->post('deskripsi-produk');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/product/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/product/'.$gambar['file_name'];
	            $config['width']= 624;
	            $config['height']= 800;
	            $config['new_image'] = './assets_home/img/product/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'produk_name'				=>	$judul,
	                    'produk_stok'				=>	$stok,
	                    'produk_weight'				=>	$berat,
	                    'produk_status'				=>	$status,
	                    'produk_price'				=>	$harga,
	                    'produk_description'		=>	$deskripsi,
						'produk_image'				=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$data = array(
                'produk_name'				=>	$judul,
                'produk_stok'				=>	$stok,
                'produk_weight'				=>	$berat,
                'produk_status'				=>	$status,
                'produk_price'				=>	$harga,
                'produk_description'		=>	$deskripsi,
				'produk_image'				=>	$this->input->post('gambar_old')
	        );
	    }
	
		$this->db->where('produk_id', $this->input->post('id'));
		$this->db->update('tb_produk', $data);
	}

	public function produkbyid($id) {
		return $this->db->get_where('tb_produk', ['produk_id' => $id])->row_array();
	}

	public function del_produk($id) {
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_produk');
		$this->db->where('id_item', $id);
		$this->db->delete('tb_rkategori');
	}

	public function del_kategori($id) {
		$this->db->where('id_kategori', $id);
		$this->db->delete('tb_kategori');
	}



	public function data_transaksi() {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}
	public function data_saran() {
		$this->db->select('*');
		$this->db->from('survey');
		$this->db->group_by('saran');
		// $this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		// $this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function transaksibyid($id) {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_id', $id);
		return $this->db->get();
	}

	public function data_artikel() {
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function simpan_artikel() {
		$id = rand();
	    $judul = ucwords($this->input->post('judul'));
	    $url = url_title(strtolower($judul), 'dash', TRUE).'-'.time().'.html';
	    $tgl = date('Y-m-d H:i:s');
	    $isi = $this->input->post('isi');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/blog/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/blog/'.$gambar['file_name'];
	            $config['width']= 800;
	            $config['height']= 500;
	            $config['new_image'] = './assets_home/img/blog/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'blog_id'					=>	$id,
	                    'blog_url'					=>	$url,
	                    'blog_judul'				=>	$judul,
	                    'blog_tgl'					=>	$tgl,
	                    'blog_isi'					=>	$isi,
						'blog_gambar'				=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_post');
	    }
	
		$this->db->insert('tb_blog', $data);
	}
	
	public function ubah_artikel() {
	    $judul = ucwords($this->input->post('judul'));
	    $isi = $this->input->post('isi');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/blog/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/blog/'.$gambar['file_name'];
	            $config['width']= 800;
	            $config['height']= 500;
	            $config['new_image'] = './assets_home/img/blog/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'blog_id'					=>	$id,
	                    'blog_url'					=>	$url,
	                    'blog_judul'				=>	$judul,
	                    'blog_tgl'					=>	$tgl,
	                    'blog_isi'					=>	$isi,
						'blog_gambar'				=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$data = array(
                'blog_id'					=>	$id,
                'blog_url'					=>	$url,
                'blog_judul'				=>	$judul,
                'blog_tgl'					=>	$tgl,
                'blog_isi'					=>	$isi,
				'blog_gambar'				=>	$this->input->post('gambar_old')
	        );
	    }
	
		$this->db->where('blog_id', $this->input->post('id'));
		$this->db->update('tb_blog', $data);
	}

	public function artikelbyid($id) {
		return $this->db->get_where('tb_blog', ['blog_id' => $id])->row_array();
	}

	public function del_artikel($id) {
		$this->db->where('blog_id', $id);
		$this->db->delete('tb_blog');
	}

	public function data_slider() {
		return $this->db->get('tb_slider')->result_array();
	}

	public function simpan_slider() {
	    $teks1 = $this->input->post('teks1');
	    $teks2 = $this->input->post('teks2');
	    $teks3 = $this->input->post('teks3');
	    $urutan = $this->input->post('urutan');
	    $gaya = $this->input->post('gaya');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/slider/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/slider/'.$gambar['file_name'];
	            $config['create_thumb'] = FALSE;
	            $config['maintain_ratio'] = FALSE;
	            $config['quality'] = '60%';
	            $config['width']= 1920;
	            $config['height']= 1271;
	            $config['new_image'] = './assets_home/img/slider/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'slider_text_1'			=>	$teks1,
	                    'slider_text_2'			=>	$teks2,
	                    'slider_text_3'			=>	$teks3,
	                    'slider_urutan'			=>	$urutan,
	                    'slider_gaya_text'		=>	$gaya,
						'slider_gambar'			=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_slider');
	    }
	
		$this->db->insert('tb_slider', $data);
	}

	public function del_slider($id) {
		$this->db->where('slider_id', $id);
		$this->db->delete('tb_slider');
	}
	
	public function data_member() {
		$this->db->order_by('user_created', 'DESC');
		return $this->db->get('tb_users')->result_array();
	}

	public function data_pesan() {
		$this->db->order_by('pesan_tgl', 'DESC');
		return $this->db->get('tb_pesan')->result_array();
	}

	public function data_notifikasi() {
		$this->db->order_by('notif_time', 'DESC');
		$this->db->where('notif_status', 0);
		$this->db->where('notif_perihal', 'Transaksi baru');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function data_notifikasi_pesan() {
		$this->db->order_by('notif_time', 'DESC');
		$this->db->where('notif_status', 0);
		$this->db->where('notif_perihal', 'Pesan baru');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function cek_ganti_password() {
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array();

		if(password_verify($sandi, $cek['admin_sandi'])) {
			$this->db->set('admin_sandi', $sandi1);
			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('admin/edit_sandi');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_sandi');
		}
	}

	public function cek_ganti_profil() {
		$nama = ucwords($this->input->post('nama'));
		$username = strtolower($this->input->post('username'));
		$email = strtolower($this->input->post('email'));
		$sandi = $this->input->post('sandi');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array();

		if(password_verify($sandi, $cek['admin_sandi'])) {

			// get foto
		    $config['upload_path'] = './assets_admin/images/resources/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
		                    'admin_nama'				=>	$nama,
		                    'admin_email'				=>	$email,
		                    'admin_username'			=>	$username,
							'admin_foto'				=>	$gambar['file_name']
		                );
		           }
		    }else {
		    	$data = array(
	                'admin_nama'				=>	$nama,
                    'admin_email'				=>	$email,
                    'admin_username'			=>	$username,
					'admin_foto'				=>	$this->input->post('gambar_old')
		        );
		    }

			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/edit_profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_profil');
		}
	}

	public function profilku() {
		return $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();
	}

	public function profiltoko() {
		return $this->db->get_where('tb_profil', ['profil_id' => 1])->row_array();
	}

	public function simpan_profiltoko() {
	    $nama = ucwords($this->input->post('nama'));
	    $email = strtolower($this->input->post('email'));
	    $telp = $this->input->post('telp');
	    $alamat = $this->input->post('alamat');
	    $fb = $this->input->post('fb');
	    $wa = $this->input->post('wa');
	    $ig = $this->input->post('ig');
	    $tw = $this->input->post('tw');
	
	    // get foto
	    $config['upload_path'] = './assets_home/img/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $config['image_library'] = 'gd2';
	            $config['source_image'] = './assets_home/img/'.$gambar['file_name'];
	            $config['create_thumb'] = FALSE;
	            $config['maintain_ratio'] = FALSE;
	            $config['quality'] = '60%';
	            $config['width']= 195;
	            $config['height']= 80;
	            $config['new_image'] = './assets_home/img/'.$gambar['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	                
	            $data = array(
	                    'profil_nama'		=>	$nama,
	                    'profil_email'		=>	$email,
	                    'profil_telp'		=>	$telp,
	                    'profil_alamat'		=>	$alamat,
	                    'profil_fb'			=>	$fb,
	                    'profil_wa'			=>	$wa,
	                    'profil_ig'			=>	$ig,
	                    'profil_tw'			=>	$tw,
						'profil_logo'		=>	$gambar['file_name']
	                );
	           }
	    }else {
	    	$data = array(
	            'profil_nama'		=>	$nama,
	            'profil_email'		=>	$email,
	            'profil_telp'		=>	$telp,
	            'profil_alamat'		=>	$alamat,
	            'profil_fb'			=>	$fb,
	            'profil_wa'			=>	$wa,
	            'profil_ig'			=>	$ig,
	            'profil_tw'			=>	$tw,
				'profil_logo'		=>	$this->input->post('gambar_old')
	        );
	    }
	
		$this->db->where('profil_id', 1);
		$this->db->update('tb_profil', $data);
	}
}
