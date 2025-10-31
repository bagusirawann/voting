<?php 
	class ModelPemilih extends CI_Model
	{
		public $tbl = "pemilih";
		public $id = "id_pemilih";
		
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
			return $this->db->get_where($this->tbl,['id_pemilih'=>$id]);
		}

		public function get_one($where)
		{
			return $this->db->query("SELECT * FROM $this->tbl $where");
		}

		public function total($where)
		{
			return $this->db->query("SELECT count(id_pemilih) as total FROM $this->tbl $where");
		}

		public function simpan($val)
		{
			return $this->db->insert($this->tbl,$val);
		}


		public function edit($id_pemilih,$val)
		{
			$this->db->where($this->id,$id_pemilih);
			return $this->db->update($this->tbl,$val);
		}

		



	}
 ?>