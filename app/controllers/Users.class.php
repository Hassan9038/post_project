<?php
class Users extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // register
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // filter the post array
            $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);

            // Assign the value on array
            $data = [
                'name' => $_POST['userName'],
                'email' => $_POST['userEmail'],
                'password' => $_POST['userPassword'],
                'confirm-password' => $_POST['userConfirmPassword'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];

            // validation the form

            if (!preg_match("/[a-zA-Z]/",$data['name'])) { // chek the user name is  empty
                $data['name_err'] = "Usename can Be <b>Empty</b>";
             }
             // check the email is empty
            if(empty($data['email'])) $data['email_err'] = 'Please fill your email';
            // Check the password is empty
            if(empty($data['password'])) $data['password_err'] = 'Please fill your password';
            // Check the Confirm password is empty
            if(empty($data['confirm-password'])) $data['confirm-password_err'] = 'Please fill your confirm password';
            // Check the password is matched
            if($data['password'] != $data['confirm-password']) $data['confirm-password_err'] = "The password don't match ";
            // Check the password is less than 6 Charachters
            if (strlen($data['confirm-password']) < 6) {
                $data['confirm-password_err'] = "The Password Mouts Be Larger Than  <b>6 Charachter</b>";
              }

            // check if username exists
            if($this->userModel->getUserByName($data['name'])){
                $data['name_err'] = "Sorry This user is exist";
            }

            // check if emapty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err']) ){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // success
                if($this->userModel->register($data['name'] , $data['email'] , $data['password'])){
                    redirect("users/login");

                }else{
                    echo "No";
                }
            }else{
                // Errors
               $this->view('users/register' , $data);
            }

        }else{

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm-password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];
            $this->view('users/register' , $data);

        }
    }


    // login user
    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);

            $data = [
                'name' => $_POST['userName'],
                'password' => $_POST['userPassword'],
                'name_err' => '',
                'password_err' => ''
            ];

            // validation
            if(empty($data['name'])) $data['name_err'] = 'Please fill your name';
            if(empty($data['password'])) $data['password_err'] = 'Please fill your password';

            // check if user exists
            if(!$this->userModel->getUserByName($data['name']) && !empty($data['name'])){
                $data['name_err'] = "User not found";
            }

            // check if emapty
            if(empty($data['name_err']) && empty($data['password_err'])){

                // success
                $user = $this->userModel->login($data['name'] , $data['password']);

                if($user){
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['user_name'] = $user->userName;
                    redirect("posts/show");
                }else{
                    //password incorrect
                    $data['password_err'] = "Password incorrect";
                    $this->view('users/login', $data);
                }
            }else{
                // Errors
               $this->view('users/login' , $data);
            }

        }else{

            $data = [
                'name' => '',
                'password' => '',
                'name_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login' , $data);

        }

        $this->view('users/login');
    }

    // profile function
    public function profile(){
        $data = $this->userModel->get_user_info($_SESSION['user_name']);
        $this->view('users/profile' , $data);
    }

    // logout function
    public function logout(){
        $_SESSION['user_id'] = null;
        $_SESSION['user_name'] = null;
        session_unset();
        session_destroy();
        redirect("users/login");
    }


    // Edit username and email handel function
    public function edit()
    {
        $data = $this->userModel->get_user_info($_SESSION['user_name']);
        if(isset($_POST['profile_name'])){

            $Edit_data = [
                'username' => $_POST['userName'],
                'email' => $_POST['userEmail'],
                'userId' => $_SESSION['user_id'],
                'name_err' => '',
                'email_err' => ''
            ];

            // validation
            if(empty($Edit_data['username'])) $Edit_data['name_err'] = "Username can't be epmty";
            if(empty($Edit_data['email'])) $Edit_data['email_err'] = "Email Can't be empty";


            // if the form is valid update the data
            if(empty($Edit_data['name_err']) && empty($Edit_data['email_err'])){
              $this->userModel->update_name($Edit_data['username'] , $Edit_data['email'] , $Edit_data['userId']);
              redirect('users/logout');
            }else{
              $this->view('users/edit' , $data , $data_new_post = [] , $data_comment = [] , $Edit_data);

            }

        }else{
            $Edit_data = [
                'username' => '',
                'email' => '',
                'userId' => '',
                'name_err' => '',
                'email_err' => ''
            ];
          $this->view('users/edit' , $data , $Edit_data);
        }
    }


    // Change Password function
    public function changepassword()
    {
      if (isset($_POST['change_password'])) {

        $change_pass_data = [
            'old_password' => $_POST['oldPassword'],
            'new_password' => $_POST['newPassword'],
            'confirm_password' => $_POST['confirmPassword'],
            'old_password_err' => '',
            'new_password_err' => ''
          ];
          
          // current user info 
          $data = $this->userModel->get_user_info($_SESSION['user_name']);
          $urrent_user_name = $data->userName;

          //validation 
          if(empty($change_pass_data['old_password'])) $change_pass_data['old_password_err'] = "Please Enter Your Current Password";
          if(empty($change_pass_data['new_password'])) $change_pass_data['new_password_err'] = "New Password Can't Be Empty";
          if($change_pass_data['new_password'] != $change_pass_data['confirm_password']) $change_pass_data['new_password_err'] = "Password Dos't Matched";
          if(strlen($change_pass_data['new_password']) < 6) $change_pass_data['new_password_err'] = "The Password Must Be Larger Than 6 Characters";
           // check currnet password 
          if(!$this->userModel->check_password($urrent_user_name , $change_pass_data['old_password'])) $change_pass_data['old_password_err'] = "The Current Password Not Currect";
          
          // if the password in currenct 
          if(empty($change_pass_data['old_password_err']) && empty($change_pass_data['new_password_err'])){
              $change_pass_data['new_password'] = password_hash($change_pass_data['new_password'], PASSWORD_DEFAULT);

              //check if the password changed 
              if($this->userModel->change_password($change_pass_data['new_password'] , $_SESSION['user_id'])){
                redirect('users/logout');
                exit();
              }else{
                $change_pass_data['new_password_err'] = "Something is Wrong!";
                $this->view('users/change_password' ,$data = [] , $data_new_post = [] , $data_comment = [] , $Edit_data = [] , $change_pass_data);
              }
              
          }else{
            $this->view('users/change_password' ,$data = [] , $data_new_post = [] , $data_comment = [] , $Edit_data = [] , $change_pass_data);

          }
   
      }else{
        $change_pass_data = [
          'old_password' => '',
          'new_password' => '',
          'confirm_password' => '',
          'old_password_err' => '',
          'new_password_err' => ''
        ];
        $this->view('users/change_password' , $change_pass_data);
      }
      
    }

}
