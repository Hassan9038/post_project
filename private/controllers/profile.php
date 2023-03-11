<?php 
/**
 * Profile controller class 
 */
class Profile extends Controller
{
	
	public function index($id = '')
	{
		// check to login 
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$user = new User();

		$id = trim($id == '') ? Auth::getUser_id() : $id;

		$row = $user->first('user_id' , $id);

		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['profile' , 'profile'];

		if ($row) {
		   $crumbs[] = [$row->firstname , 'profile'];
		}

		// get more info depending on tab
		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'info';

		if ($page_tab == 'classes' && $row) {
			// code...
			$class = new Classes_model();
			$mytable = "class_students"; 
			if ($row->rank == 'lecturer') {
				// code...
				$mytable = "class_lecturers";
			}

		
			$query  = "SELECT * FROM $mytable WHERE user_id = :user_id && disabled = 0";

			$data['stud_classes'] = $class->query($query ,['user_id' => $id]);

			$data['student_classes'] = array();

			if ($data['stud_classes']) {
				
				foreach ($data['stud_classes'] as $key => $arow) {
				
					$data['student_classes'][] = $class->first('class_id' , $arow->class_id);
				}
			}
		}else
		if ($page_tab == 'tests' && $row) {
			// code...
			$disable = "disabled = 0 &&";
			$class = new Classes_model();
			$mytable = "class_students"; 
			if ($row->rank == 'lecturer') {
				// code...
				$mytable = "class_lecturers";
				$disable = "";
			}

		
			$query  = "SELECT * FROM $mytable WHERE user_id = :user_id && disabled = 0";

			$data['stud_classes'] = $class->query($query ,['user_id' => $id]);

			$data['student_classes'] = array();

			if ($data['stud_classes']) {
				
				foreach ($data['stud_classes'] as $key => $arow) {
				
					$data['student_classes'][] = $class->first('class_id' , $arow->class_id);
				}
			}

			// collect class id's
			$class_ids = [];
			foreach ($data['student_classes'] as $key => $class_row) {
				$class_ids[] = $class_row->class_id;
			}

			$id_str = "'" . implode("','", $class_ids). "'";
			
			$query = "SELECT * FROM tests WHERE $disable class_id IN ($id_str)";

			$tests_model = new Tests_model();

			$tests = $tests_model->query($query);	

			$data['test_rows'] = $tests;
		}



		$data['row'] = $row;
		$data['page_tab'] = $page_tab;
		$data['crumbs'] = $crumbs;

		if (Auth::access('reception') || Auth::i_own_content($row)) {
			$this->view('profile' , $data);
		}else{
			$this->view('access-denied');
		}
		
	}

	// edit profile 
	public function edit($id = '')
	{
		// check to login 
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}

		$errors = array();
		$user = new User();

		$id = trim($id == '') ? Auth::getUser_id() : $id;

		if (count($_POST) > 0 && Auth::access('reception')) {
			// somethinf was posted

			// check if password exist 
        	if (trim($_POST['password']) == "") {
        	
        		unset($_POST['password']);
        		unset($_POST['password2']);
        	}

			if ($user->validate($_POST , $id)) {

				//check for files
				if ($myimage = upload_image($_FILES)) {
					
					$_POST['image'] = $myimage;
				}
				

        	if ($_POST['rank'] == 'super_admin' && $_SESSION['USER']->rank != 'super_admin') {
        		// code...
        		$_POST['rank'] = 'admin';
        	}

        	//get User id

        	$myrow = $user->first('user_id' , $id);

        	if (is_object($myrow)) {
        		$user->update($myrow->id , $_POST);
        	}


				$redirect = "profile/edit/" . $id;
				$this->redirect($redirect);
			} else {
				// Errors
				$errors = $user->errors;
			}
		}

		$row = $user->first('user_id' , $id);


		$data['row'] = $row;
		$data['errors'] = $errors;
		

		if (Auth::access('reception') || Auth::i_own_content($row)) {
			$this->view('profile-edit' , $data);
		}else{
			$this->view('access-denied');
		}

    }
}