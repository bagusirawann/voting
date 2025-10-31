<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model('ModelAuth');

			
			
		}
	
	public function index()
	{
		if($this->session->userdata('nama_pemilih')==''){
			
			$this->load->view('login');

			}else{

				redirect('evoting');
		}
		
	}

	public function auth()
	{
		$uname = $this->input->post('username');
		$pass = md5($this->input->post('password'));


		$cek = $this->ModelAuth->aksesUser($uname,$pass)->row_array();

		if($cek['nama_pemilih']==NULL || $cek['nama_pemilih']==''){

			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Gagal!</strong> Username Dan Password anda salah 
                </div>');

			redirect('login');
		}else{

		    $this->session->set_userdata('nama_pemilih',$cek['nama_pemilih']);
		    $this->session->set_userdata('id_pemilih',$cek['id_pemilih']);

			redirect('evoting');
		}


	}

	public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
}
