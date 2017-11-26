<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends MY_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getHomeLocation(){
		$result = $this->db->get("home");

		if ($result->num_rows() > 0) {
			return $result->result();
		}
		return FALSE;

	}

	public function findSchools($homeId)
	{
		$home = $this->getByWhere('home', 'id', $homeId, TRUE);

		$sql = "SELECT
				lf.*,
				(6371 *
					acos(
						cos( radians( {$home->latitude} ) ) *
						cos( radians( il.latitude ) ) *
						cos(
							radians( il.longitude ) - radians( {$home->longitude} )
						) +
						sin(radians( {$home->latitude} )) *
						sin(radians( il.latitude ))
					)
				) `distance`
				FROM institute_location  il
				INNER JOIN list_field lf ON lf.id = il.institute_type
				ORDER BY
				`distance`
				LIMIT
				25";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) {
			return $result->result();
		}

		return [];
	}

	public function findHomesFromSchool($schoolId, $distance)
	{
		$school = $this->getByWhere('institute_location', 'institute_type', $schoolId, TRUE);

		$sql = "SELECT
				h.*,
				(6371 *
					acos(
						cos( radians( {$school->latitude} ) ) *
						cos( radians( h.latitude ) ) *
						cos(
							radians( h.longitude ) - radians( {$school->longitude} )
						) +
						sin(radians( {$school->latitude} )) *
						sin(radians( h.latitude ))
					)
				) `distance`
				FROM home h
				HAVING `distance` <= {$distance}
				ORDER BY
				`distance`
				LIMIT
				25";

		$result = $this->db->query($sql);

		if ($result->num_rows() > 0) {
			return $result->result();
		}

		return [];
	}

}