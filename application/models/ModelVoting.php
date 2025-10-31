<?php 
	class ModelVoting extends CI_Model
	{
		public $tbl = "voting";
		public $id = "id_voting";
		
		function __construct()
		{
			parent::__construct();
			
		}
		public function lihat_semua()
		{
			return $this->db->where('status !=','3')->get($this->tbl);
		}


		public function get_edit($id)
		{
			return $this->db->get_where($this->tbl,['id_voting'=>$id]);
		}

		public function get_one($where)
		{
			return $this->db->query("SELECT * FROM $this->tbl $where");
		}

		public function total($where)
		{
			return $this->db->query("SELECT count(id_voting) as total FROM $this->tbl $where");
		}

		public function simpan($val)
		{
			return $this->db->insert($this->tbl,$val);
		}

		public function simpan_detail($val)
		{
			return $this->db->insert('detail_voting',$val);
		}


		public function edit($id_voting,$val)
		{
			$this->db->where($this->id,$id_voting);
			return $this->db->update($this->tbl,$val);
		}

		public function hapus($id)
		{
			$this->db->where('id_detail_voting', $id);
			$this->db->delete('detail_voting');
		}



	}
 ?>