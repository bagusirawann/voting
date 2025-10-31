<?php 
	class ModelKandidat extends CI_Model
	{
		public $tbl = "kandidat";
		public $id = "id_kandidat";
		
		function __construct()
		{
			parent::__construct();
			
		}
		public function lihat_semua()
		{
			return $this->db->get($this->tbl);
		}


		public function get_edit($id)
		{
			return $this->db->get_where($this->tbl,['id_kandidat'=>$id]);
		}

		public function get_one($where)
		{
			return $this->db->query("SELECT * FROM $this->tbl $where");
		}

		public function total($where)
		{
			return $this->db->query("SELECT count(id_kandidat) as total FROM $this->tbl $where");
		}

		public function simpan($val)
		{
			return $this->db->insert($this->tbl,$val);
		}


		public function edit($id_kandidat,$val)
		{
			$this->db->where($this->id,$id_kandidat);
			return $this->db->update($this->tbl,$val);
		}

		



	}
 ?>