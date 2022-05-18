<?php 
class Posts extends Controller{

    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

   
    // check to add new post 
    public function add(){

        $data = $this->postModel->get_all_post(); // get All Posts from database
        $data_comment = $this->postModel->get_all_comment(); // get All Comment From database

        if(isset($_POST['add_post'])){  // issset click add post  
            
            $data_new_post = [
                'post' =>  $_POST['post'],
                'userID' => $_POST['user_id'],
                'post_err' => ''
            ];

           // validation the form
            if(empty($data_new_post['post'])) {
                $data_new_post['post_err'] = "Post con't be empty";
            }

            if(!empty($data_new_post['post_err'])){
                $this->view('posts/show',$data , $data_new_post , $data_comment  = $this->postModel->get_all_comment());
            }


            if(empty($data_new_post['post_err'])){
                // success insert the post
                if($this->postModel->add_post($data_new_post['post'] , $data_new_post['userID'])){

                    redirect('posts/show');
                }
            }
                
        }else{ // not set click add post 
            
            $this->view('posts/show',$data);
          
        }    
        
    }

  
   // show the post and add new comment 
    public function show(){

       $data = $this->postModel->get_all_post(); // get All Posts from database

       $data_comment = $this->postModel->get_all_comment(); // get All Comment From database
      
       $this->view('posts/show',$data , $data_comment  = $this->postModel->get_all_comment());
       
        
    }

    
}