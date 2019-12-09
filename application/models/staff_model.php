<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff_Model extends My_Model {
protected $table = 'tbl_staffs_a123456';
protected $primary_key = 'fld_staff_num';

function login($data)
	{
		$condition = "fld_staff_num =" . "'" . $data['username'] . "' AND " . "fld_staff_password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
	}
}
}
?>