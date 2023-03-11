<?php
/**
 * Main model
 */
class Model extends Database
{

	public $errors = array();

	public function __construct()
	{

		//echo $this::class; this work on 8 verion xampp
		//echo get_class($this); => $this::class; it is same 
		// get class name and make table name to query
		if (!property_exists($this, 'table')) {

			 $this->table = strtolower(get_class($this)). "s";

		}
	}

	//get primary key
	protected function get_primary_key($table)
	{
		$query = "SHOW KEYS FROM $table WHERE Key_name = 'primary'";
		$db = new Database();
		$data = $db->query($query);
		if (!empty($data[0])) {
			
			return $data[0]->Column_name ;
		}

		return 'id';
	}


    // get more than one row
	public function where($column , $value , $order = 'DESC' , $limit = 10 , $offset = 0)
	{
		//$column = addcslashes($column);
		$primary_key = $this->get_primary_key($this->table);
		$query = "select * FROM $this->table where $column = :value ORDER BY $primary_key $order lIMIT $limit OFFSET $offset" ;
		$data = $this->query($query,[
			'value' => $value
		]);

		if(is_array($data)){

			if (property_exists($this, 'afterSelect')) { // get the data without join table

			   foreach($this->afterSelect as $func){

				$data = $this->$func($data);
			  }
	    }

		}


		return $data;
	}


	 // get one row
	public function first($column , $value ,$order = 'DESC')
	{
		 //$column = addcslashes($column);
		$primary_key = $this->get_primary_key($this->table);
		$query = "select * FROM $this->table where $column = :value ORDER BY $primary_key $order";
		$data = $this->query($query,[
			'value' => $value
		]);

		if(is_array($data)){

			if (property_exists($this, 'afterSelect')) { // get the data without join table

			   foreach($this->afterSelect as $func){

				$data = $this->$func($data);
			  }
	        }

		}

		if (is_array($data)) {
			// code...
			$data = $data[0];
		}

		return $data;
	}



	//fetchAll
	public function findAll($order = 'DESC' , $limit = 100 , $offset = 0)
	{
		$primary_key = $this->get_primary_key($this->table);
		$query = "SELECT * FROM $this->table ORDER BY $primary_key $order lIMIT $limit OFFSET $offset";
		$data = $this->query($query);

		  // run functions After select
		if(is_array($data)){

			if (property_exists($this, 'afterSelect')) { // get the data without join table

			   foreach($this->afterSelect as $func){

				$data = $this->$func($data);
			  }
	        }

		}

	  return $data;
	}

	// insert function
	public function insert($data)
	{
		// remove unwanted columns
		if (property_exists($this, 'allowedColumns')) {

			foreach($data as $key => $column){
				if(!in_array($key , $this->allowedColumns)){
					unset($data[$key]);
				}
			}
	   }

	   // run functions before insert

	   if (property_exists($this, 'beforeInserted')) {

		   foreach($this->beforeInserted as $func){

			$data = $this->$func($data);
		  }
      }

		$keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:' , $keys);

	    $query = "INSERT INTO $this->table($columns) VALUES (:$values)";

		return $this->query($query , $data);
	}


	// update record
	public function update($id , $data)
	{
		// remove unwanted columns
		if (property_exists($this, 'allowedColumns')) {

			foreach($data as $key => $column){
				if(!in_array($key , $this->allowedColumns)){
					unset($data[$key]);
				}
			}
	   }

	   // run functions before insert

	   if (property_exists($this, 'beforeUpdate')) {

		   foreach($this->beforeUpdate as $func){

			$data = $this->$func($data);
		  }
      }

		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .= $key . "=:" . $key . ",";
		}

		$str = trim($str , ",");

		$data['id'] = $id;

	   $query = "UPDATE $this->table SET $str WHERE id = :id";

		return $this->query($query , $data);
	}


	// delete record
	public function delete($id)
	{
		$query = "DELETE FROM $this->table WHERE id = :id";

		$data['id'] = $id;

		return $this->query($query , $data);

	}
}
?>
