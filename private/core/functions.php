<?php
// get the value 
function get_var($key , $default = ""){

  if (isset($_POST[$key])) {
    return $_POST[$key];
  }
  return $default;

}

// function get selected
function get_select($key , $value){

  if (isset($_POST[$key])) {
    if ($_POST[$key] == $value) {
      return "selected";
    }
  }

  return "";
}

function esc($var){
  return htmlspecialchars($var);

}


function randdom_string($length)
{
  # code...
  $arr = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','j','h','i','g','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','J','H','I','L','M','N','O','P','Q','R','S','T','U','V', 'W','X','Y','Z');
 
  $text = "";

for ($i=0;  $i < $length ; $i++) { 
   
   $random = rand(0,61);
  
   $text .= $arr[$random] = $arr[rand(0,50)];
  
}

return  $text;
}


// get date function 
function get_date($date)
{
  // code...
  return date("jS M, Y",strtotime($date));
}

function show($data){
  echo "<pre>" ;
  print_r($data);
  echo "</pre>";
}



// get image 
function get_image($image , $gender = "male"){

   if (!file_exists("$image")) {

        $image = ASSETS. "female1.jpg";

        if ($gender == 'male') {

          $image = ASSETS. "male1.jpg";
        }
    }else{

      $class_img = new Image();

       $image = ROOT . $class_img->profile_thumb($image);
    }

    return $image;

}

// function to load tab 
function views_path($view){

  if (file_exists('../private/views/' .$view. '.inc.php')) {

      return '../private/views/' .$view. '.inc.php';
    }else{
      return '../private/views/404.view.php';
    }

} 

// upload image
function upload_image($FILES)
{

  //check for files
        
  if (count($FILES) > 0) {
      // cwe have an image 
      $allowed[] = 'image/jpeg';
      $allowed[] = 'image/jpg';
      $allowed[] = 'image/png';
   

    if ($FILES['image']['error'] == 0 && in_array($FILES['image']['type'], $allowed)) {
      // code...
      
      $folder = "uploads/";

      if (!file_exists($folder)) {
        
        mkdir($folder , 0777 ,true);
      }

      $destination = $folder . time() . "_" . $FILES['image']['name'];
      move_uploaded_file($FILES['image']['tmp_name'], $destination);
      return $destination;
    }

 }
 return false;
}

// Student taken test
function has_taken_test($test_id){

  return 'No';
}

// can take test 
function can_take_test($my_test_id){

  $class = new Classes_model();
  $mytable = "class_students"; 
  if (Auth::getRank() != "student") {
     return false;
  }


  $query  = "SELECT * FROM $mytable WHERE user_id = :user_id && disabled = 0";

  $data['stud_classes'] = $class->query($query ,['user_id' => Auth::getUser_id()]);

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
  
  $query = "SELECT * FROM tests WHERE class_id IN ($id_str)";

  $tests_model = new Tests_model();

  $tests = $tests_model->query($query); 

  $data['test_rows'] = $tests;

  $my_tests = array_column($tests, 'test_id');

  if (in_array($my_test_id , $my_tests)) {
    return true;
  }

  return false;
}


// get the answer 
function get_answer($saved_answers , $id)
{

if (!empty($saved_answers)) {
  
    foreach ($saved_answers as  $row) {
      if ($id == $row->question_id) {
        
        return $row->answer;
      }
    }

  }

return '';
}


// // get answer percentage
// function get_answer_precentage1($questions , $saved_answers)
// {

//   $total_answer_count = 0;
//   if (!empty($questions)) {
//     // code...
//     foreach ($questions as  $quest) {
//       // code...
//       $answer = get_answer($saved_answers , $quest->id);

//       if (!empty($answer) && trim($answer) != "") {
//         // code...
//         $total_answer_count++ ;

//       }
//     }
//   }

//   if ($total_answer_count > 0) {
//     // code...
//     $total_questions = count($questions);
       
//     return ($total_answer_count / $total_questions) * 100 ;
//   }

//     return 0;
// }


// get answer percentage
function get_answer_precentage($test_id , $user_id)
{
  $quest = new Questions_model();
  $answers = new Answers_model();

  $questions = $quest->query("SELECT * FROM test_question WHERE test_id = :test_id" , ['test_id'=> $test_id]);

  $query = "SELECT question_id , answer FROM answers WHERE user_id = :user_id && test_id = :test_id ";
  $saved_answers = $answers->query($query,[

      'user_id' =>  $user_id,
      'test_id' => $test_id,
      
    ]);

  $total_answer_count = 0;

  if (!empty($questions)) {
    // code...
    foreach ($questions as  $quest) {
      // code...
      $answer = get_answer($saved_answers , $quest->id);

      if (!empty($answer) && trim($answer) != "") {
        // code...
        $total_answer_count++ ;

      }
    }
  }

  if ($total_answer_count > 0) {
    // code...
    $total_questions = count($questions);
       
    return ($total_answer_count / $total_questions) * 100 ;
  }

    return 0;
}
