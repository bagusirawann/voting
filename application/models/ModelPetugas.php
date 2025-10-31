<?php 
	class ModelPetugas extends CI_Model
	{
		public $tbl = "admin";
		public $id = "id_admin";
		
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
			return $this->db->get_where($this->tbl,['id_admin'=>$id]);
		}

		public function get_one($where)
		{
			return $this->db->query("SELECT * FROM $this->tbl $where");
		}

		public function total($where)
		{
			return $this->db->query("SELECT count(id_admin) as total FROM $this->tbl $where");
		}

		public function simpan($val)
		{
			return $this->db->insert($this->tbl,$val);
		}


		public function edit($id_admin,$val)
		{
			$this->db->where($this->id,$id_admin);
			return $this->db->update($this->tbl,$val);
		}

		



	}
 ?>