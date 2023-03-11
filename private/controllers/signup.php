<?php
/**
 * signup controller class
 */
class Signup extends Controller
{

	public function index()
	{
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}

		$errors = array();
		$mode = isset($_GET['mode']) ? $_GET['mode'] : 'users';

		if (count($_POST) > 0) {
			$user = new User();

			if ($user->validate($_POST)) {
				// code...

				$_POST['date'] = date("Y-m-d H:i:s");

                if (Auth::access("reception")) {
                	// code...
                	if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
                		// code...
                		$_POST['rank'] = 'admin';
                	}
					  $user->insert($_POST);
                }

				$redirect = $mode == 'students' ? 'students' : 'users';
				$this->redirect($redirect);
			} else {
				// Errors
				$errors = $user->errors;
			}

		}
		if (Auth::access("reception")) {

			$this->view('signup', [
			'errors' => $errors,
			'mode' => $mode,
		    ]);

		}else{
			$this->view('access-denied');
		}
		
	}
}
?>
