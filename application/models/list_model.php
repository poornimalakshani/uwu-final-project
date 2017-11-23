<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getListFields($list, $needFull = false)
	{
		$this->db->join('list_field', 'list_field.list_id = list.id', 'inner');
		$this->db->where('list.list_type', $list);
		$this->db->order_by('list_field.field', 'ASC');

		$result = $this->db->get('list');

		if ($result->num_rows() > 0) {
			if($needFull) {
				return $result->result();
			} else {
				$formated = ['' => ''];

				foreach($result->result() as $x) {
					$formated[$x->id] = $x->field;
				}

				return $formated;
			}
		}

		return [];
	}
}
?>