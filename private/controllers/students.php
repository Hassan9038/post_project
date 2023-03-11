<?php 
/**
 * Students controller class 
 */
class Students extends Controller
{
	
	public function index()
	{
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}

		$user = new User();
    
		$school_id = Auth::getSchool_id();

		

		$limit = 10;

		$pager = new Pager($limit);

		$offset = $pager->offset;


        $query = "SELECT * FROM users WHERE school_id = :school_id && rank IN ('student') ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $arr['school_id']  = $school_id;
        if (isset($_GET['find'])) {

        	$find = '%' . trim($_GET['find']) . '%';

    		$query = "SELECT * FROM users WHERE school_id = :school_id && rank IN ('student') && (firstname LIKE :find  || lastname LIKE :find) ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $arr['find']  = $find;
        }
        
 
        $data = $user->query($query ,$arr);

        $crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['students' , 'students'];

		if (Auth::access('reception')) {
			// code...
			$this->view('students' , [
			'crumbs' => $crumbs,
			'rows' => $data,
			'pager' => $pager,
		   ]);
		}else{
			$this->view('access-denied');
		}
		
	}

}