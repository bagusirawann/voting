<?php 
	class ModelAuth extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function akses($user,$pass)
		{	
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			$this->db->where('status','1');
			return $this->db->get('admin');
		}

		public function aksesUser($user,$pass)
		{	
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			$this->db->where('status','1');
			return $this->db->get('pemilih');
		}
	}
 ?>