<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_admin')==''){
			
				redirect('admin');

			}else{

				$this->load->model('ModelVoting');

			}
		}
	
	public function index()
	{
		$data['record'] = $this->ModelVoting->lihat_semua()->result();
		$this->template->load('admin/index','admin/voting/data',$data);
	}

	public function create()
	{

		if(isset($_POST['submit'])){

			$nama_voting = $this->input->post('nama_voting');
			$date_start = $this->input->post('date_start');

			$voting = $this->ModelVoting->get_one("ORDER BY id_voting DESC")->row_array();
			

			if($voting['id_voting']!=""){
				$tambah = substr($voting['id_voting'], -3)+1;
				if(strlen($tambah)==1){
					$id_voting="VOT00".$tambah;
				}else if(strlen($tambah)==2){
					$id_voting="VOT0".$tambah;
				}else if(strlen($tambah)==3){
					$id_voting="VOT".$tambah;
				}
			}else{

				$id_voting = "VOT001";

			}

				$data = array(
						'id_voting' => $id_voting,
						'id_admin' => $this->session->userdata('id_admin'),
						'nama_voting' => $nama_voting,
						'date_start' => $date_start,
						'status' => '3'
				);

				$this->ModelVoting->simpan($data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect('voting/create');


		}else{

			$voting_live = $this->db->get_where('voting',['status'=>'2'])->row_array();

			if($voting_live['id_voting']!=''){
				$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Alert!</strong> Anda tidak bisa menambah Voting ketika Status Voting sedang berlangsung!
	                </div>');
				redirect("voting/edit/$voting_live[id_voting]");


			}else{


				$cek_validate = $this->db->get_where('voting',['status'=>'3'])->row_array();
				if($cek_validate['nama_voting'] != ''){

					$data['val'] = $cek_validate;
					$data['btn'] = 'cek';
					$data['kandidat'] = $this->db->get_where('kandidat',['status'=>'1'])->result();

					$data['list_kandidat'] = $this->db->join('detail_voting','voting.id_voting = detail_voting.id_voting')->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')->get_where('voting',['voting.status'=>'3','voting.id_voting'=>$cek_validate['id_voting']])->result();
					$this->template->load('admin/index','admin/voting/input',$data);

				}else{

					$data['btn'] = 'Input';
					$this->template->load('admin/index','admin/voting/input',$data);

				}


			}


			

			

		}

		
	}


	public function tambah_kandidat()
	{

		$btn = $this->input->post('btn');
		$id_voting = $this->input->post('id_voting');
		if(isset($_POST['submit'])){

			$cek_kandidat = $this->db->get_where('detail_voting',['id_voting'=>$this->input->post('id_voting'), 'id_kandidat' => $this->input->post('id_kandidat')] )->row_array();

			if($cek_kandidat['id_kandidat'] !=''){


				$this->session->set_flashdata('msg2', '<div class="alert alert-danger alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Gagal!</strong> Kandidat sudah ada
	                </div>');

			}else{

				$data = array(
				'id_voting' => $this->input->post('id_voting'),
				'id_kandidat' => $this->input->post('id_kandidat'),
				'poin' => 0
			);

			$this->ModelVoting->simpan_detail($data);

			$this->session->set_flashdata('msg2', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');

			}

			if($btn=='EDIT'){
				redirect("voting/edit/$id_voting");
			}else{
				redirect('voting/create');
			}
			
			

		}else{
			redirect('voting/create');
		}

	}




	public function edit()
	{

		$id = $this->uri->segment(3);

		if(isset($_POST['submit'])){

			$id_voting = $this->input->post('id_voting');
			$nama_voting = $this->input->post('nama_voting');
			$date_start = $this->input->post('date_start');
			


			

				$data = array(
						'id_admin' => $this->session->userdata('id_admin'),
						'nama_voting' => $nama_voting,
						'date_start' => $date_start
				);

				$this->ModelVoting->edit($id_voting,$data);




				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong>
	                </div>');
					redirect("voting/edit/$id_voting");



		}else{


			$data['btn'] = 'EDIT';
			$data['kandidat'] = $this->db->get_where('kandidat',['status'=>'1'])->result();
			$data['list_kandidat'] = $this->db->join('detail_voting','voting.id_voting = detail_voting.id_voting')->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')->get_where('voting',['voting.id_voting'=>$id])->result();
			$data['val'] = $this->ModelVoting->get_edit($id)->row_array();
			$this->template->load('admin/index','admin/voting/input',$data);

		}

		
	}


	public function arsip()
	{

		$id_voting = $this->uri->segment(3);
		$cek = $this->ModelVoting->get_one("WHERE id_voting = '$id_voting' AND status = '1'")->row_array();

		if($cek['nama_voting']!=null){

			$data = array(

				'status' => '0'
			);

			$this->ModelVoting->edit($id_voting,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menonaktifkan voting
	                </div>');
					redirect('voting');

		}else{
			redirect('voting');
		}

		

	}


	public function aktif()
	{

		$id_voting = $this->uri->segment(3);
		$cek = $this->ModelVoting->get_one("WHERE id_voting = '$id_voting' AND status = '0'")->row_array();

		if($cek['nama_voting']!=null){

			$data = array(

				'status' => '1'
			);

			$this->ModelVoting->edit($id_voting,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mengaktifkan voting
	                </div>');
					redirect('voting');

		}else{
			redirect('voting');
		}

		

	}


	public function hapus()
	{
		$btn = $this->uri->segment(4);
		$id = $this->uri->segment(5);
		$id_voting = $this->uri->segment(3);
		$cek = $this->db->get_where('detail_voting',['id_detail_voting'=>$id_voting])->row_array();

		if($cek['id_voting']!=null){

			$this->ModelVoting->hapus($id_voting);

			$this->session->set_flashdata('msg2', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menghapus Kandidat
	                </div>');
					if($btn=='EDIT'){
						redirect("voting/edit/$id");
					}else{
						redirect('voting/create');
					}

		}else{
			redirect('voting');
		}

		

	}




	public function simpan()
	{

		$id_voting = $this->uri->segment(3);
		$cek = $this->db->select("id_voting,count(id_voting) as jmlh")->get_where('detail_voting',['id_voting'=>$id_voting])->row_array();

		if($cek['id_voting']!=null && $cek['jmlh']>1){

			$data = array(

				'status' => '2'
			);

			$this->ModelVoting->edit($id_voting,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Menyimpan
	                </div>');
					redirect('voting');

		}else{
			$this->session->set_flashdata('msg2', '<div class="alert alert-danger alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Gagal!</strong> Kandidat Belum dipilih / Jumlah kandidat tidak boleh 1
	                </div>');
			redirect('voting/create');
		}

		

	}





	public function end()
	{

		$id_voting = $this->uri->segment(3);
		$cek = $this->db->select("id_voting,count(id_voting) as jmlh")->get_where('detail_voting',['id_voting'=>$id_voting])->row_array();

		if($cek['id_voting']!=null && $cek['jmlh']>1){

			$data = array(

				'status' => '1',
				'date_end' => date('Y-m-d H:i:s')
			);

			$this->ModelVoting->edit($id_voting,$data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Mengakhiri
	                </div>');
					redirect('voting');

		}

		

	}




	public function print()
    {
       
    	$id_voting =  $this->uri->segment(3);

        $data['record']=$this->db->select('voting.*,detail_voting.*,kandidat.nama_kandidat')
        ->join('detail_voting','detail_voting.id_voting = voting.id_voting')
        ->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')
        ->get_where('voting',["voting.id_voting"=> "$id_voting"])->result();

        $data['data'] = $this->db->select('nama_voting')->get_where('voting',['id_voting' => "$id_voting"])->row_array();
        $data['jmlpemilih'] = $this->db->select('count(id_pemilih) as total')->get_where('riwayat_voting',['riwayat_voting.id_voting'=> "$id_voting"])->row_array();

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Rekap Hasil.pdf";
            $this->pdf->load_view('admin/voting/cetak',$data);
        
        

    }

	
}
