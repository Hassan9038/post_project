<?php 
class Comment{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

     // Add new  comment
     public function add_comment($comment , $user_id , $post_id){
        $this->db->query("INSERT INTO `replay`(`comment`,  `user_id`, `post_id`) VALUES (:comment , :user_id , :post_id)");
        $this->db->bind(':comment' , $comment);
        $this->db->bind(':user_id' , $user_id);
        $this->db->bind(':post_id' , $post_id);
        if($this->db->execute()) return true;
        else return false;
    }
}