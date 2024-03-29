<?php
/**
 * Classes_model Model
 */
class Classes_model extends Model
{
	protected $table = 'classes';

	protected $allowedColumns = [
		'class',
		'date',
	];

	protected $beforeInserted = [
		'make_school_id',
		'make_class_id',
		'make_user_id',
	];

	protected $afterSelect = [
	'get_user',
	
    ];

	// validate function
	public function validate($DATA)
	{
		$this->errors = array();

    // check for class name
		if (empty($DATA['class']) || !preg_match("/^[a-zA-Z 0-9]+$/" , $DATA['class'])) {
			$this->errors['class'] = "Only letters allowed in class name";
		}

		
		if (count($this->errors) == 0) {
			return true;
		}

		return false;
	}

  // make school id
	public function make_school_id($data)
	{
		# code...
		if(isset($_SESSION['USER']->school_id)){ // it is class_id

			$data['school_id'] = $_SESSION['USER']->school_id;

		}
		
		return $data;
	}


	public function make_user_id($data)
	{
		# code...
		if(isset($_SESSION['USER']->user_id)){ // it is class_id

			$data['user_id'] = $_SESSION['USER']->user_id;

		}
		
		return $data;
	}
    
    
    // create class id 
	public function make_class_id($data)
	{
	
		$data['class_id'] = randdom_string(60);

	
		return $data;
	}

	 // create class id 
	public function get_user($data)
	{
		$user = new User();

		foreach($data as $key => $row){
			$result = $user->where('user_id' , $row->user_id);
			$data[$key]->user = is_array($result) ? $result[0] : false;
		}
	 
		return $data;
	}

}
