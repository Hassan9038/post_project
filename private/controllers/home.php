<?php 
/**
 * home controller class 
 */
class Home extends Controller
{
	
	public function index()
	{
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}

		
		$this->view('home');
	}

}