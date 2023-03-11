<?php
/**
 * main controller class
 */
class Controller
{
	public function controller_name()
	{
		// code...
		return get_class($this);
	}
	// load view
	public function  view($view , $data = array())
	{
		 extract($data);

		if (file_exists('../private/views/' .$view. '.view.php')) {

			require '../private/views/' .$view. '.view.php';
		}else{
			require '../private/views/404.view.php';
		}
	}

   // load model function
	public function load_model($model)
	{
		if (file_exists("../private/models/" .ucfirst($model). ".php")) {

			require "../private/models/" .ucfirst($model). ".php" ;

			 return $model = new $model();
		}

		return false;
	}

	// redirect function
	public function redirect($link)
	{
		header("location:" .ROOT. $link);
		die();
	}

}
