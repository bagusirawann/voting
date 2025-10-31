<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evoting extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_pemilih')==''){
			
				redirect('user');

			}else{
				

			}

		}
	
	public function index()
	{

		$data['pemilih'] = $this->db->select('count(id_pemilih) as total')->get_where('pemilih',['status' => '1'])->row_array();
		$id = $this->db->order_by('voting.id_voting','DESC')->get('voting')->row_array();

		$data['sudah'] = $this->db->select('riwayat_voting.*,pemilih.nama_pemilih,count(riwayat_voting.id_pemilih) as total')
		->join('pemilih','riwayat_voting.id_pemilih=pemilih.id_pemilih')
		->get_where('riwayat_voting',['riwayat_voting.id_voting'=>$id['id_voting']])->row_array();

			
		$data['val'] = $id;
		$data['list_kandidat'] = $this->db->join('detail_voting','voting.id_voting = detail_voting.id_voting')->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')->get_where('voting',['voting.id_voting'=>$id['id_voting'],'voting.status'=>'1'])->result();

		$data['profile'] = $this->db->get_where('pemilih',['id_pemilih' => $this->session->userdata('id_pemilih')])->row_array();

		if($id['status']=='2'){

			
			$data['list_kandidat'] = $this->db->join('detail_voting','voting.id_voting = detail_voting.id_voting')->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')->get_where('voting',['voting.status'=>'2'])->result();


		}

		

		$data['validate'] = $this->db->get_where('voting',['voting.status'=>'2'])->row_array();


		$this->load->view('evoting',$data);
	}



	public function pilih()
	{

		$id_detail = $this->uri->segment(3);
		$id_voting = $this->uri->segment(4);
		$id_kandidat = $this->uri->segment(5);

		$val = array(

			'id_pemilih' => $this->session->userdata('id_pemilih'),
			'id_voting' => $id_voting,
			'id_kandidat' => $id_kandidat,
			'status' => '1'

		);

		$this->db->insert('riwayat_voting',$val);


		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Berhasil!</strong> Memilih, Hasil pemilihan baru bisa dilihat setelah proses vote selesai
	                </div>');

		redirect('evoting');


	}
	
}
