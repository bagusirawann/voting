<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_admin')==''){
			
				redirect('admin');

			}else{

				$this->load->model('ModelPemilih');

			}
		}
	
	public function index()
	{
		$data['record'] = $this->ModelPemilih->lihat_semua()->result();
		$this->template->load('admin/index','admin/pemilih/data',$data);
	}

	public function create()
	{

		if(isset($_POST['submit'])){

			$nama_pemilih = $this->input->post('nama_pemilih');
			$no_ktp = $this->input->post('no_ktp');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');

			$pemilih = $this->ModelPemilih->get_one("ORDER BY id_pemilih DESC")->row_array();
			

			if($pemilih['id_pemilih']!=""){
				$tambah = substr($pemilih['id_pemilih'], -3)+1;
				if(strlen($tambah)==1){
					$id_pemilih="PMV00".$tambah;
				}else if(strlen($tambah)==2){
					$id_pemilih="PMV0".$tambah;
				}else if(strlen($tambah)==3){
					$id_pemilih="PMV".$tambah;
				}
			}else{

				$id_pemilih = "PMV001";

			}


			if(!is_numeric($no_ktp)){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> No KTP tidak sesuai
                </div>');
			redirect("pemilih/create");

			}else if(!is_numeric($nohp)){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> No Handphone tidak sesuai
                </div>');
			redirect("pemilih/create");

			}else{

				


				$data = array(
						'id_pemilih' => $id_pemilih,
						'no_ktp' => $no_ktp,
						'nama_pemilih' => $nama_pemilih,
						'nohp' => $nohp,
						'alamat' => $alamat,
						'username' => $no_ktp,
						'password' => md5($no_ktp),
						'status' => '1'
				);

				$this->ModelPemilih->simpan($data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect('pemilih/create');


			}

		}else{

			$data['btn'] = 'Input';
			$this->template->load('admin/index','admin/pemilih/input',$data);

		}

		
	}




	public function edit()
	{

		$id = $this->uri->segment(3);

		if(isset($_POST['submit'])){

			$id_pemilih = $this->input->post('id_pemilih');
			$nama_pemilih = $this->input->post('nama_pemilih');
			$no_ktp = $this->input->post('no_ktp');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			


			if(is_numeric($nama_pemilih) ){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Nama Tidak Boleh Numberic
                </div>');
			redirect("pemilih/edit/$id_pemilih");

			}else{

				


				$data = array(
						'nama_pemilih' => $nama_pemilih,
						'no_ktp' => $no_ktp,
						'nohp' => $nohp,
						'alamat' => $alamat,
						'username' => $no_ktp,
						'password' => md5($no_ktp)
				);

				$this->ModelPemilih->edit($id_pemilih,$data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect("pemilih/edit/$id_pemilih");


			}

		}else{

			$data['btn'] = 'EDIT';
			$data['val'] = $this->ModelPemilih->get_edit($id)->row_array();
			$this->template->load('admin/index','admin/pemilih/input',$data);

		}

		
	}


	public function arsip()
	{

		$id_pemilih = $this->uri->segment(3);
		$cek = $this->ModelPemilih->get_one("WHERE id_pemilih = '$id_pemilih' AND status = '1'")->row_array();

		if($cek['nama_pemilih']!=null){

			$data = array(

				'status' => '0'
			);

			$this->ModelPemilih->edit($id_pemilih,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menonaktifkan Pemilih
	                </div>');
					redirect('pemilih');

		}else{
			redirect('pemilih');
		}

		

	}


	public function aktif()
	{

		$id_pemilih = $this->uri->segment(3);
		$cek = $this->ModelPemilih->get_one("WHERE id_pemilih = '$id_pemilih' AND status = '0'")->row_array();

		if($cek['nama_pemilih']!=null){

			$data = array(

				'status' => '1'
			);

			$this->ModelPemilih->edit($id_pemilih,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mengaktifkan Pemilih
	                </div>');
					redirect('pemilih');

		}else{
			redirect('pemilih');
		}

		

	}

	
}
