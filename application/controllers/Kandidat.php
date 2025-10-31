<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_admin')==''){
			
				redirect('admin');

			}else{

				$this->load->model('ModelKandidat');

			}
		}
	
	public function index()
	{
		$data['record'] = $this->ModelKandidat->lihat_semua()->result();
		$this->template->load('admin/index','admin/kandidat/data',$data);
	}

	public function create()
	{

		if(isset($_POST['submit'])){

			$nama_kandidat = $this->input->post('nama_kandidat');
			$alamat = $this->input->post('alamat');
			$desc = $this->input->post('desc');
			$visi = $this->input->post('visi');
			$misi = $this->input->post('misi');

			$kandidat = $this->ModelKandidat->get_one("ORDER BY id_kandidat DESC")->row_array();
			

			if($kandidat['id_kandidat']!=""){
				$tambah = substr($kandidat['id_kandidat'], -3)+1;
				if(strlen($tambah)==1){
					$id_kandidat="KDV00".$tambah;
				}else if(strlen($tambah)==2){
					$id_kandidat="KDV0".$tambah;
				}else if(strlen($tambah)==3){
					$id_kandidat="KDV".$tambah;
				}
			}else{

				$id_kandidat = "KDV001";

			}


				
				$config['upload_path'] = 'upload';
				$config['file_name'] = 'kandidat_'.date('his');
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size']  = '5048';
			  
			    $this->load->library('upload', $config); // Load konfigurasi uploadnya
			    $this->upload->initialize($config);
			    if($this->upload->do_upload('image')){ // Lakukan upload dan Cek jika proses upload berhasil
			      // Jika berhasil :
			      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			    }else{
			      // Jika gagal :
			      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			    }

				$file_data = $this->upload->data();
				$image = $file_data['file_name'];


				$data = array(
						'id_kandidat' => $id_kandidat,
						'nama_kandidat' => $nama_kandidat,
						'image' => $image,
						'alamat' => $alamat,
						'desc' => $desc,
						'visi' => $visi,
						'misi' => $misi,
						'status' => '1'
				);

				$this->ModelKandidat->simpan($data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect('kandidat/create');

		}else{

			$data['btn'] = 'Input';
			$this->template->load('admin/index','admin/kandidat/input',$data);

		}

		
	}




	public function edit()
	{

		$id = $this->uri->segment(3);

		if(isset($_POST['submit'])){

			$id_kandidat = $this->input->post('id_kandidat');
			$nama_kandidat = $this->input->post('nama_kandidat');
			$alamat = $this->input->post('alamat');
			$desc = $this->input->post('desc');
			$visi = $this->input->post('visi');
			$misi = $this->input->post('misi');
			

				
			if($_FILES['image']['tmp_name'] != ''){

				$config['upload_path'] = 'upload';
				$config['file_name'] = 'kandidat_'.date('his');
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size']  = '5048';
			  
			    $this->load->library('upload', $config); // Load konfigurasi uploadnya
			    $this->upload->initialize($config);
			    if($this->upload->do_upload('image')){ // Lakukan upload dan Cek jika proses upload berhasil
			      // Jika berhasil :
			      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			    }else{
			      // Jika gagal :
			      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			    }

				$file_data = $this->upload->data();
				$image = $file_data['file_name'];

			}else{
				$image = $this->input->post('image');
			}


				$data = array(
						'nama_kandidat' => $nama_kandidat,
						'image' => $image,
						'alamat' => $alamat,
						'desc' => $desc,
						'visi' => $visi,
						'misi' => $misi
				);

				$this->ModelKandidat->edit($id_kandidat,$data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect("kandidat/edit/$id_kandidat");


		}else{

			$data['btn'] = 'EDIT';
			$data['val'] = $this->ModelKandidat->get_edit($id)->row_array();
			$this->template->load('admin/index','admin/kandidat/input',$data);

		}

		
	}


	public function arsip()
	{

		$id_kandidat = $this->uri->segment(3);
		$cek = $this->ModelKandidat->get_one("WHERE id_kandidat = '$id_kandidat' AND status = '1'")->row_array();

		if($cek['nama_kandidat']!=null){

			$data = array(

				'status' => '0'
			);

			$this->ModelKandidat->edit($id_kandidat,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menonaktifkan Kandidat
	                </div>');
					redirect('kandidat');

		}else{
			redirect('kandidat');
		}

		

	}


	public function aktif()
	{

		$id_kandidat = $this->uri->segment(3);
		$cek = $this->ModelKandidat->get_one("WHERE id_kandidat = '$id_kandidat' AND status = '0'")->row_array();

		if($cek['nama_kandidat']!=null){

			$data = array(

				'status' => '1'
			);

			$this->ModelKandidat->edit($id_kandidat,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mengaktifkan Kandidat
	                </div>');
					redirect('kandidat');

		}else{
			redirect('kandidat');
		}

		

	}

	
}
