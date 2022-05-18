<?php 
class Post{

    private $db;

    public function __construct()
    {
        $this->db = new Database; // user this to connection with the database 
    }

    // Add new post 
    public function add_post($post , $user_id){
        $this->db->query("INSERT INTO `posts`(`post`, `user_id`) VALUES (:post , :id)");
        $this->db->bind(':post' , $post);
        $this->db->bind(':id' , $user_id);

        if($this->db->execute()) return true;
        else return false;
    }

    // get All post
    public function get_all_post(){
        $this->db->query("SELECT posts.* , users.userName  FROM posts INNER JOIN users ON posts.user_id = users.id
        ORDER BY id DESC");
        $results = $this->db->fetchAll();
        if($this->db->fetchAll()) return $results;
        else return false;

    }

   
    // get All Comment
    public function get_all_comment($post_id = null){
        $this->db->query("SELECT  replay.* , posts.id as postid , users.userName as uname FROM replay INNER JOIN posts ON replay.post_id = posts.id
        INNER JOIN users ON replay.user_id = users.id WHERE post_id = :postId");
        $this->db->bind(":postId" , $post_id);

        $results = $this->db->fetchAll();
        if($results) return $results;
        else return false;

    }
}
