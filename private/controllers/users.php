<?php 
/**
 * Users controller class 
 */
class Users extends Controller
{
	
	public function index()
	{
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}

		$user = new User();
		$limit = 10;

		$pager = new Pager($limit);

		$offset = $pager->offset;

		$school_id = Auth::getSchool_id();

		$query = "SELECT * FROM users WHERE school_id = :school_id && rank NOT IN ('student') ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $arr['school_id']  = $school_id;
    if (isset($_GET['find'])) {

    	$find = '%' . trim($_GET['find']) . '%';

		$query = "SELECT * FROM users WHERE school_id = :school_id && rank NOT IN ('student') && (firstname LIKE :find || lastname LIKE :find)ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $arr['find']  = $find;
    }

    $data = $user->query($query, $arr);

    $crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
  	$crumbs[] = ['staff' , 'users'];
        
        if (Auth::access('admin')) {

        	$this->view('users' , [
			'crumbs' => $crumbs,
			'pager' => $pager,
			'rows' => $data,
		   ]);

        }else{
          $this->view('access-denied');
        }
		
	}

}