<?php
/**
 * Lecturers_model Model
 */
class Lecturers_model extends Model
{
	protected $table = 'class_lecturers';

	protected $allowedColumns = [
		'user_id',
		'class_id',
		'school_id',
		'disabled',
		'date',
	];

	protected $beforeInserted = [
		'make_school_id',
	];

	protected $afterSelect = [
	'get_user',
	
    ];



  // make school id
	public function make_school_id($data)
	{
		# code...
		if(isset($_SESSION['USER']->school_id)){ // it is class_id

			$data['school_id'] = $_SESSION['USER']->school_id;

		}
		
		return $data;
	}



	 // user id 
	public function get_user($data)
	{
		$user = new User();

		foreach($data as $key => $row){
			if (isset($row->user_id)) {
				// code...
				$result = $user->where('user_id' , $row->user_id);
			    $data[$key]->user = is_array($result) ? $result[0] : false;
			}
			
		}
	 
		return $data;
	}

}
