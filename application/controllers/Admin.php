<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model('ModelAuth');

			
			
		}
	
	public function index()
	{
		if($this->session->userdata('nama_admin')==''){
			
			$this->load->view('admin/login');

			}else{

				redirect('dashboard');
		}
		
	}

	public function auth()
	{
		$uname = $this->input->post('username');
		$pass = md5($this->input->post('password'));


		$cek = $this->ModelAuth->akses($uname,$pass)->row_array();

		if($cek['nama_admin']==NULL || $cek['nama_admin']==''){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Username Dan Password anda salah 
                </div>');
			redirect('admin');
		}else{

		    $this->session->set_userdata('nama_admin',$cek['nama_admin']);
		    $this->session->set_userdata('id_admin',$cek['id_admin']);

			redirect('dashboard');
		}


	}

	public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}
}
