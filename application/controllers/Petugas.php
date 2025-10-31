<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_admin')==''){
			
				redirect('admin');

			}else{

				$this->load->model('ModelPetugas');

			}
		}
	
	public function index()
	{
		$data['record'] = $this->ModelPetugas->lihat_semua()->result();
		$this->template->load('admin/index','admin/petugas/data',$data);
	}

	public function create()
	{

		if(isset($_POST['submit'])){

			$nama_admin = $this->input->post('nama_admin');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$repassword = md5($this->input->post('repass'));

			$admin = $this->ModelPetugas->get_one("ORDER BY id_admin DESC")->row_array();
			

			if($admin['id_admin']!=""){
				$tambah = substr($admin['id_admin'], -3)+1;
				if(strlen($tambah)==1){
					$id_admin="ADM00".$tambah;
				}else if(strlen($tambah)==2){
					$id_admin="ADM0".$tambah;
				}else if(strlen($tambah)==3){
					$id_admin="ADM".$tambah;
				}
			}else{

				$id_admin = "ADM001";

			}


			if($password != $repassword ){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Password tidak sama
                </div>');
			redirect("petugas/create");

			}else if(!is_numeric($nohp)){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> No Handphone tidak sesuai
                </div>');
			redirect("petugas/create");

			}else{

				


				$data = array(
						'id_admin' => $id_admin,
						'nama_admin' => $nama_admin,
						'nohp' => $nohp,
						'alamat' => $alamat,
						'username' => $username,
						'password' => $password,
						'status' => '1'
				);

				$this->ModelPetugas->simpan($data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect('petugas/create');


			}

		}else{

			$data['btn'] = 'Input';
			$this->template->load('admin/index','admin/petugas/input',$data);

		}

		
	}




	public function edit()
	{

		$id = $this->uri->segment(3);

		if(isset($_POST['submit'])){

			$id_admin = $this->input->post('id_admin');
			$nama_admin = $this->input->post('nama_admin');
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
			$username = $this->input->post('username');
			


			if(is_numeric($nama_admin) ){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Nama Tidak Boleh Numberic
                </div>');
			redirect("petugas/edit/$id_admin");

			}else if(!is_numeric($nohp)){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> No Handphone tidak sesuai
                </div>');
			redirect("petugas/edit/$id_admin");

			}else{

				


				$data = array(
						'nama_admin' => $nama_admin,
						'nohp' => $nohp,
						'alamat' => $alamat,
						'username' => $username,
				);

				$this->ModelPetugas->edit($id_admin,$data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect("petugas/edit/$id_admin");


			}

		}else{

			$data['btn'] = 'EDIT';
			$data['val'] = $this->ModelPetugas->get_edit($id)->row_array();
			$this->template->load('admin/index','admin/petugas/input',$data);

		}

		
	}


	public function arsip()
	{

		$id_admin = $this->uri->segment(3);
		$cek = $this->ModelPetugas->get_one("WHERE id_admin = '$id_admin' AND status = '1'")->row_array();

		if($cek['nama_admin']!=null){

			$data = array(

				'status' => '0'
			);

			$this->ModelPetugas->edit($id_admin,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menonaktifkan User
	                </div>');
					redirect('petugas');

		}else{
			redirect('petugas');
		}

		

	}


	public function aktif()
	{

		$id_admin = $this->uri->segment(3);
		$cek = $this->ModelPetugas->get_one("WHERE id_admin = '$id_admin' AND status = '0'")->row_array();

		if($cek['nama_admin']!=null){

			$data = array(

				'status' => '1'
			);

			$this->ModelPetugas->edit($id_admin,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mengaktifkan User
	                </div>');
					redirect('petugas');

		}else{
			redirect('petugas');
		}

		

	}







	public function reset()
	{

		$id_admin = $this->uri->segment(3);
		$cek = $this->ModelPetugas->get_one("WHERE id_admin = '$id_admin' AND status = '1'")->row_array();

		if($cek['nama_admin']!=null){

			$data = array(

				'password' => md5($cek['username'])
			);

			$this->ModelPetugas->edit($id_admin,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mereset password User
	                </div>');
			redirect("petugas/edit/$cek[id_admin]");

		}else{
			redirect('petugas');
		}

		

	}

	
}
