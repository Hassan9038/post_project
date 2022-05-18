<?php 
class Comments extends Controller{


    public function __construct()
    {
        $this->userComment = $this->model('Comment'); // create instance from comment class 
    }


    // Check the Add comment 
    public function add()
    {
      
        if(isset($_POST['comment'])){
            
         $data = [
             'comment' => $_POST['comment'],
             'user_id' => $_POST['user_id'], 
             'post_id' => $_POST['post_id']
           
         ];

         $this->userComment->add_comment($data['comment'] , $data['user_id'] , $data['post_id']);
         redirect("posts/show"); 
        exit();
    
      }

    }
}