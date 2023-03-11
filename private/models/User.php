<?php
/**
 * User Model
 */
class User extends Model
{
	protected $allowedColumns = [
		'firstname',
		'lastname',
		'email',
		'password',
		'gender',
		'rank',
		'date',
		'image',
		'school_id',
	];

	protected $beforeInserted = [
		'make_user_id',
		'make_school_id',
		'hash_password'
	];

	protected $beforeUpdate = [
		'hash_password'
	];



	// validate function
	public function validate($DATA , $id = '')
	{
		$this->errors = array();

    // check for firstname
		if (empty($DATA['firstname'])) {
			$this->errors['firstname'] = "Only letters allowed in first name";
		}

		// check for lastname
		if (empty($DATA['lastname'])) {
			$this->errors['lastname'] = "Only letters allowed in last name";
		}

		// check if email exists
		if (trim($id) == "") {
			// code...
			if ($this->where('email',$DATA['email'])) {
			$this->errors['email'] = 'The email is  already in user';
		}

		}else{

			if ($this->query("SELECT email FROM $this->table WHERE email = :email && user_id != :id",['email'=>$DATA['email'], 'id'=>$id])) {
			$this->errors['email'] = 'The email is  already in user';
		}


		}
		
		// check for email

		if (empty($DATA['email']) || !filter_var($DATA['email'] , FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = 'The email not vaild';
		}


		// check for gender
		$genders = ['female' , 'male'];
		if (empty($DATA['gender']) || !in_array($DATA['gender'] , $genders)) {
			$this->errors['gender'] = 'The gender not vaild';
		}

		// check for ranks
		$ranks = ['student' , 'reception' , 'lecturer' , 'admin' , 'super_admin'];
		if (empty($DATA['rank']) || !in_array($DATA['rank'] , $ranks)) {
			$this->errors['rank'] = 'The rank not vaild';
		}


		// check for password
		if (isset($DATA['password'])) {
		
			if (empty($DATA['password']) || $DATA['password'] != $DATA['password2']) {
			$this->errors['password'] = 'The password do not match';
			}

			// check for password lenght
			if (strlen($DATA['password']) < 8) {
				$this->errors['password'] = 'The password must be at largerthan or equal 8 charachters';
			}
		}
		

		if (count($this->errors) == 0) {
			return true;
		}

		return false;
	}

    // get user id 
	public function make_user_id($data)
	{
		# code...
		$data['user_id'] = strtolower($data['firstname'] . '.' . $data['lastname']);
		return $data;
	}

	public function make_school_id($data)
	{
		# code...
		if(isset($_SESSION['USER']->school_id)){
			$data['school_id'] = $_SESSION['USER']->school_id;

			while ($this->where('user_id' , $data['user_id'])) {
				// code...
				$data['user_id'] .= rand(100,9999);
			}

		}
		return $data;
	}



	public function hash_password($data)
	{
		# code...
		if (isset($data['password'])) {
			
			$data['password'] = password_hash($data['password'] , PASSWORD_DEFAULT);

		}
		return $data;
	}


}
