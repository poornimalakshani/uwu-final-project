<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert($table_name, $insert)
	{
		$this->db->insert($table_name, $insert);
		return $this->db->insert_id();
	}

	public function update($table_name, $where, $where_id, $update)
	{
		$this->db->where($where, $where_id);
		$this->db->update($table_name, $update);

		return TRUE;
	}

	public function delete($table_name, $where, $where_id)
	{
		$this->db->where($where, $where_id);
		$this->db->delete($table_name);
		
		return TRUE;
	}

	public function getAll($table_name, $orderBy = '')
	{
		if (!empty($orderBy)) {
			$this->db->order_by($orderBy);
		}

		$result = $this->db->get($table_name);

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;
		
	}

	public function getByWhere($table_name, $where, $where_val, $is_first_row = false, $orderBy = '')
	{
		$this->db->where($where, $where_val);

		if (!$is_first_row && !empty($orderBy)) {
			$this->db->order_by($orderBy);
		}

		$result = $this->db->get($table_name);

		if ($result->num_rows() > 0) {
			if($is_first_row)
				return $result->first_row();
			else
				return $result->result();
		}
		return FALSE;
		
	}


}
?>