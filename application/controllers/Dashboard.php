<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
		{
			parent::__construct();

			if($this->session->userdata('nama_admin')==''){
			
				redirect('admin');

			}else{
				

			}

		}
	
	public function index()
	{

		$data['pemilih'] = $this->db->select('count(id_pemilih) as total')->get_where('pemilih',['status' => '1'])->row_array();
		$id = $this->db->order_by('voting.id_voting','DESC')->get_where('voting',['status'=>'2'])->row_array();

		$data['sudah'] = $this->db->select('riwayat_voting.*,pemilih.nama_pemilih,count(riwayat_voting.id_pemilih) as total')
		->join('pemilih','riwayat_voting.id_pemilih=pemilih.id_pemilih')
		->get_where('riwayat_voting',['riwayat_voting.id_voting'=>$id['id_voting']])->row_array();

			
		$data['val'] = $id;
		$data['list_kandidat'] = $this->db->join('detail_voting','voting.id_voting = detail_voting.id_voting')->join('kandidat','kandidat.id_kandidat = detail_voting.id_kandidat')->get_where('voting',['voting.id_voting'=>$id['id_voting'],'voting.status'=>'2'])->result();



		$this->template->load('admin/index','admin/dashboard/dashboard',$data);
	}

	
}
