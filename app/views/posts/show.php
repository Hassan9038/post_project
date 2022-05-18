<?php include_once '../app/views/inc/header.inc.php'; 
if(!isset($_SESSION['user_name'])){ // chek user has session
  redirect('users/login');
  exit();
}

?>


<!-- Start button Add new Post --> 

<div class="p-2  mt-3 card-header" style="background: #ffffffc2;">

    <div class="mt-2 p-1" style="background-color:#f8f9fa00; border-radius: 10px ; border:2px solid #282323c2 ;">
    <a href="#" class=" " data-toggle="modal" data-target="#addNoteModal" style="text-decoration: none ; color: #777">
        <h5 class=" mt-3" 
        style="background-color:transparent;"> &nbsp; 
        <i class="fa fa-user-circle fa-lg align-self-center "></i>
        &nbsp; &nbsp;What are you think  Ms :  <?php echo $_SESSION['user_name']; ?> ?
        </h5>
    </a>
    </div>
  
</div>
<div class="mb-3" style="clear: both;"></div>
<?php 
// print the Error when the textarea empty 
  if(isset($_POST) && !empty($data_new_post['post_err'])){ ?>
    <div class="alert alert-danger"><?php echo $data_new_post['post_err']; ?> </div>
    <?php 
  }
?>

<?php 
// print the successfully added post 
  if(isset($_POST['add_post']) && empty($data_new_post['post_err'])){ ?>
    <div class="alert alert-success">Post Added successfully </div>
    <?php 
  }
?>
<!-- End Button Add new Post -->

<!-- Start Add New Modal -->
<div class="modal fade" id="addNoteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-light">Add New Post</h4>
        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <!-- Start Form Add Post --> 
         <form class="px-3" action="<?php echo URLROOT ?>posts/add" method="post" id="add-note-form">
           <!-- user_id -->
         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
           <div class="form-group">
             <textarea name="post" class="form-control form-control-lg"
             placeholder="Write Your Post Here..." rows="6" ></textarea>
           </div>
           <div class="form-group">
             <input type="submit" name="add_post"  value="Add Post"
             class="btn btn-lg btn-block text-light">
           </div>
         </form>
         <!-- End From Add Post --> 
      </div>
    </div>
  </div>
</div>
 <!-- End Add New Modal -->



 <!-- Start Show post --> 
 <?php 
 foreach($data as $post){ ?>
 

  <div class="card mb-3 card-post">
  <div class="card-header  font-weight-bold text-light">
    <i class="fa fa-user fa-lg fa-2x " style="color: #000 ; border:1px solid #333 ;width:40px ; height: 40px ; text-align: center ; line-height:40px"></i>
    &nbsp; <?php echo $post['userName']; ?>
    <br>
    <span class="text-light pt-2"><?php echo date($post['created_at']) ?></span>
  </div>
  <div class="card-body">
  
    <p class="card-text p-3" style="background-color: #FFF"> <?php echo $post['post'] ?> ... </p>
  </div>
  <div class="card-footer text-muted">
    <div class="com" style="">
       <hr>
       
        <!-- Start Comment --> 
        <div class="comment">
   
          <?php  
          
            if(!empty($data_comment = $this->postModel->get_all_comment($post['id']))){ 

              foreach($this->postModel->get_all_comment($post['id']) as $comment){  ?>
                
                  <div class="show-comment">
                    <div class="item-comment p-2 mb-2" style="background-color: #FFF; ">
                    <span>
                      <i class="fa fa-user fa-2x"></i>
                    </span> &nbsp;
                    <span>
                      <b><?php echo $comment['uname'] ?></b>
                    </span> &nbsp; &nbsp;
                    Date : 
                    <span>
                      <?php echo $comment['created_at'] ?>
                    </span>
                  
                    <p class="mt-2 lead pl-5">
                    <?php echo $comment['comment'] ?>
                    </p>
                  
                    </div>
                  </div>

                  <?php
              
              }
   
            }
            
          ?>
         
          <!-- Form comment  --> 
          <div>
              <form action="<?php echo URLROOT; ?>comments/add" method="post" class="my-post-form">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
              <input type="text" name="comment" class="form-control" required
              placeholder="Type your comment ...">
            </form> 
          </div>        
         </div>
        <!-- End Comment --> 
    </div>
  </div>
</div>
 <?php 
 }
   
 ?>


 <!-- End Show post --> 




<?php include_once '../app/views/inc/footer.inc.php'; ?>
