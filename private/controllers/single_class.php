<?php
/**
 * Single class controller class
 */
class Single_class extends Controller
{

	public function index($id = '')
	{
		$errors = array();
		if (!Auth::access('student')) {

			$this->redirect('Access_denied');
		}

		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];
		}

		$limit = 10;
		$pager = new Pager($limit);
        
        $offset = $pager->offset;

		// check the get page tab
		$page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'lecturers';
        
       
        $lect = new Lecturers_model();
      
        $results = false;
            
       
		if($page_tab == 'lecturers'){

			// display the lecturers
			$query = "SELECT * FROM class_lecturers WHERE class_id = :class_id && disabled = 0 LIMIT $limit OFFSET $offset";
			$lecturers = $lect->query($query, ['class_id' => $id]);
			$data['lecturers'] = $lecturers;
	
		}else
		if($page_tab == 'students'){

			// display the lecturers
			$query = "SELECT * FROM class_students WHERE class_id = :class_id && disabled = 0 LIMIT $limit OFFSET $offset";
			$students = $lect->query($query, ['class_id' => $id]);
			$data['students'] = $students;
	
		}else
		if($page_tab == 'tests'){

			// display the test
			$query = "SELECT * FROM tests WHERE class_id = :class_id  LIMIT $limit OFFSET $offset";
			$tests = $lect->query($query, ['class_id' => $id]);
			$data['tests'] = $tests;
	    }

	    $data['row']       = $row;
		$data['crumbs']    = $crumbs;
		$data['page_tab']  = $page_tab;
		$data['results']   = $results;
		$data['errors']    = $errors;
		$data['pager']     = $pager;

       
		$this->view('single-class' ,$data);
	}


	// add lecturer function 
	public function lectureradd($id='')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'lecturers-add';
        
       
        $lect = new Lecturers_model();
      
        $results = false;

        // Add lecturers
		if (($page_tab == 'lecturers-add' || $page_tab == 'lecturers-remove') && count($_POST) > 0) {


			if (isset($_POST['search'])) {
				// find lecturer...
				if (trim($_POST['name']) != '') {
					// code...
					$user = new User();
					$name = "%". trim($_POST['name']). "%";
					$query = "SELECT * FROM users WHERE (firstname LIKE :fname || lastname LIKE :lname) && rank = 'lecturer' LIMIT 10";
					$results = $user->query($query , ['fname'=>$name , 'lname'=>$name]);
				}else{
					$errors[] = "Please type a name to find";
				}
				
			}else
			if(isset($_POST['selected'])){
               // add lecturer
                
				$query = "SELECT disabled ,id FROM class_lecturers WHERE user_id = :user_id && class_id = :class_id  LIMIT 1";

				if (!$check = $lect->query($query , [
					'user_id' =>$_POST['selected'],
					'class_id' => $id,

				])) {

					$arr = array();

					$arr['user_id'] = $_POST['selected'];
					$arr['class_id'] = $id;
					$arr['disabled'] = 0 ; 
					$arr['date'] = date("Y-m-d H:i:s");
					
					$lect->insert($arr);

					$this->redirect('single_class/' .$id. '?tab=lecturers'); 
					
				}else{
					// check if user is active 
				
					if (isset($check[0]->disabled)){
						if ($check[0]->disabled) {

								$arr = array();
							$arr['disabled'] = 0 ; 
							
							$lect->update($check[0]->id,$arr);

							$this->redirect('single_class/' .$id. '?tab=lecturers'); 
							
						}else{
							$errors[] = "That lecturer already belongs to this class";
						}
  						
					}else{
						$errors[] = "That lecturer already belongs to this class";
					} 
						
				}	
			}
			
			
		}

        $data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
	}


	// remove lecturer function 
	public function lecturerremove($id='')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'lecturers-remove';
        
       
        $lect = new Lecturers_model();
      
        $results = false;

        // Add lecturers
		if (count($_POST) > 0) {


			if (isset($_POST['search'])) {
				// find lecturer...
				if (trim($_POST['name']) != '') {
					// code...
					$user = new User();
					$name = "%". trim($_POST['name']). "%";
					$query = "SELECT * FROM users WHERE (firstname LIKE :fname || lastname LIKE :lname) && rank = 'lecturer' LIMIT 10";
					$results = $user->query($query , ['fname'=>$name , 'lname'=>$name]);
				}else{
					$errors[] = "Please type a name to find";
				}
				
			}else
			if(isset($_POST['selected'])){
            
                
				$query = "SELECT id FROM class_lecturers WHERE user_id = :user_id && class_id = :class_id && disabled = 0 LIMIT 1";

                

				if ($row = $lect->query($query , [
					'user_id' =>$_POST['selected'],
					'class_id' => $id,

				])) {

					$arr = array();

					$arr['disabled'] = 1 ; 
					
					$lect->update($row[0]->id , $arr);

					$this->redirect('single_class/' .$id. '?tab=lecturers'); 
					
				}else{
					$errors[] = "That lecturer was not in this class";
				}    
			
		    }
		}

        $data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
	}


// add Student function 
	public function studentadd($id='')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'students-add';
        
       
        $stud = new Students_model();
      
        $results = false;

        // Add students
		if (($page_tab == 'students-add' || $page_tab == 'students-remove') && count($_POST) > 0) {


			if (isset($_POST['search'])) {
				// find student...
				if (trim($_POST['name']) != '') {
					// code...
					$user = new User();
					$name = "%". trim($_POST['name']). "%";
					$query = "SELECT * FROM users WHERE (firstname LIKE :fname || lastname LIKE :lname) && rank = 'student' LIMIT 10";
					$results = $user->query($query , ['fname'=>$name , 'lname'=>$name]);
				}else{
					$errors[] = "Please type a name to find";
				}
				
			}else
			if(isset($_POST['selected'])){
               // add student
                
				$query = "SELECT disabled ,id FROM class_students WHERE user_id = :user_id && class_id = :class_id  LIMIT 1";

				if (!$stud->query($query , [
					'user_id' =>$_POST['selected'],
					'class_id' => $id,

				])) {

					$arr = array();

					$arr['user_id'] = $_POST['selected'];
					$arr['class_id'] = $id;
					$arr['disabled'] = 0 ; 
					$arr['date'] = date("Y-m-d H:i:s");
					
					$stud->insert($arr);

					$this->redirect('single_class/' .$id. '?tab=students'); 
					
				}else{
					// check if user is active 
				
					if (isset($check[0]->disabled)){
						if ($check[0]->disabled) {

								$arr = array();
							$arr['disabled'] = 0 ; 
							
							$stud->update($check[0]->id,$arr);

							$this->redirect('single_class/' .$id. '?tab=students'); 
							
						}else{
							$errors[] = "That student already belongs to this class";
						}
  						
					}else{
						$errors[] = "That student already belongs to this class";
					} 
					
				}


			}
			
			
		}

        $data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
	}


	// remove lecturer function 
	public function studentremove($id='')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'students-remove';
        
       
        $stud = new Students_model();
      
        $results = false;

        // Add students
		if (count($_POST) > 0) {


			if (isset($_POST['search'])) {
				// find student...
				if (trim($_POST['name']) != '') {
					// code...
					$user = new User();
					$name = "%". trim($_POST['name']). "%";
					$query = "SELECT * FROM users WHERE (firstname LIKE :fname || lastname LIKE :lname) && rank = 'student' LIMIT 10";
					$results = $user->query($query , ['fname'=>$name , 'lname'=>$name]);
				}else{
					$errors[] = "Please type a name to find";
				}
				
			}else
			if(isset($_POST['selected'])){
            
                
				$query = "SELECT id FROM class_students WHERE user_id = :user_id && class_id = :class_id && disabled = 0 LIMIT 1";

                

				if ($row = $stud->query($query , [
					'user_id' =>$_POST['selected'],
					'class_id' => $id,

				])) {

					$arr = array();

					$arr['disabled'] = 1 ; 
					
					$stud->update($row[0]->id , $arr);

					$this->redirect('single_class/' .$id. '?tab=students'); 
					
				}else{
					$errors[] = "That student was not in this class";
				}    
			
		    }
		}

        $data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
	}



// add test function 
	public function testadd($id='')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		

		$row = $classes->first('class_id' , $id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'test-add';
        
       
        $test_class = new Tests_model();
      
        $results = false;

        // Add students
		if (isset($_POST) > 0) {

			

			if (isset($_POST['test'])) {
			 	// code...

			 	$arr = array();

				$arr['test'] = $_POST['test'];
				$arr['description'] = $_POST['description'];
				$arr['class_id'] = $id;
				$arr['disabled'] = 0 ; 
				$arr['date'] = date("Y-m-d H:i:s");
				
				$test_class->insert($arr);

				$this->redirect('single_class/' .$id. '?tab=tests');
			 } 
			
		
		}
			
			
	    $data['row'] = $row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
    }



// edit test function 
	public function testedit($id='' , $test_id = '')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		$tests = new Tests_model();
		

		$row = $classes->first('class_id' , $id);
		$test_row = $tests->first('test_id' , $test_id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'test-edit';
        
       
        $test_class = new Tests_model();
      
        $results = false;

        // Add students
		if (isset($_POST) > 0) {

			

			if (isset($_POST['test'])) {
			 	// code...

			 	$arr = array();

				$arr['test'] = $_POST['test'];
				$arr['description'] = $_POST['description'];
				$arr['disabled'] = $_POST['disabled']; 
		
			
				$test_class->update($test_row->id,$arr);

				$this->redirect('single_class/testedit/' .$id. '/' .$test_id.'?tab=test-edit');
			 } 
			
		
		}
			
			
	    $data['row'] = $row;
	    $data['test_row'] = $test_row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
    }



    // delete test function 
	public function testdelete($id='' , $test_id = '')
	{
		$errors = array();
		if (!Auth::logged_in()) {

			$this->redirect('login');
		}


		$classes = new Classes_model();
		$tests = new Tests_model();
		

		$row = $classes->first('class_id' , $id);
		$test_row = $tests->first('test_id' , $test_id);


		$crumbs[] = ['Dashboard' , "http://localhost/school/public/"];
		$crumbs[] = ['Classes' , 'classes'];
		if ($row) {
		   $crumbs[] = [$row->class , ''];

		}
		// check the get page tab
		$page_tab = 'test-delete';
        
       
        $test_class = new Tests_model();
      
        $results = false;

        // Add students
		if (isset($_POST) > 0) {

			

			if (isset($_POST['test'])) {
			 	// code...

			 	
				$test_class->delete($test_row->id);

				$this->redirect('single_class/' .$id. '?tab=tests');
			 } 
			
		
		}
			
			
	    $data['row'] = $row;
	    $data['test_row'] = $test_row;
		$data['crumbs'] = $crumbs;
		$data['page_tab'] = $page_tab;
		$data['results'] = $results;
		$data['errors'] = $errors;


		$this->view('single-class' ,$data);
        
		
    }



}
