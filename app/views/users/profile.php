<?php include_once '../app/views/inc/header.inc.php';
if(!isset($_SESSION['user_name'])){
  redirect('users/login');
  exit();
}
?>

  <!-- Start login form -->
  <div class="row justity-content-center wrapper " id="login-box" >
        <div class="col-lg-8 my-auto mx-auto" >
          <div class="card-group myShadow">
            <div class="card rounded-left p-4" style="flex-grow:1.4">
              <h1 class="font-weight-bold text-primary">Your Information  <i class="fa fa-user pull-right"></i> </h1>
              <hr class="my-3">

              <div  method="post" class="px-3" id="login-form">
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                  <label class="font-weight-bold">User Name :</label>
                      <p class="ml-3 "><?php  echo $data->userName; ?> </p>
                    </div>
                </div>

                <!-- Password Input -->
                <hr class="my-3">
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                  <label class="font-weight-bold">Your Email :</label>
                      <p class="ml-3 "><?php  echo $data->userEmail; ?> </p>
                </div>
             </div>
             <a  class="btn btn-outline-dark text-light pull-right align-self-center m-auto bg-primary mt-4 myLinkBtn " href="<?php echo URLROOT ;?>users/edit">Change Your Username & Email</a>

             <a  class="btn btn-outline-dark text-light pull-right align-self-center m-auto bg-primary mt-4 myLinkBtn " href="<?php echo URLROOT ;?>users/changepassword">Change Your Password</a>
            </div>
          </div>
        </div>
      </div>
      <!-- End login form -->

 <?php include_once '../app/views/inc/footer.inc.php'; ?>
