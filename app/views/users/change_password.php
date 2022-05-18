<?php include_once '../app/views/inc/header.inc.php';
if(!isset($_SESSION['user_name'])){
  redirect('users/login');
  exit();
}
?>

  <!-- Start register form -->
  <div class="row justity-content-center wrapper " id="register-box" >
        <div class="col-lg-8 my-auto mx-auto">

            <div class="card rounded-right p-4" style="flex-grow:1.4">
              <h1 class="text-center font-weight-bold text-primary">Change Your Password</h1>
              <hr class="my-3">

              <!-- Start Register  form  -->
              <form action="<?php echo URLROOT; ?>users/changepassword" method="post" class="px-3" id="register-form">

                <!--Old  Password Input -->
                <?php 
                  // print the error if the filed is empty or not matched
                  if(!empty($change_pass_data['old_password_err'])) { ?>
                  <span class="text-danger"><?php echo $change_pass_data['old_password_err'];  ?></span>   
                <?php 
                  }
                  ?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="oldPassword" class="form-control rounded-0 " placeholder="Enter Your Current Password" >
                </div>
               

                <!-- new Password Input -->
                <?php 
                  // print the error if the filed is empty or not matched
                  if(!empty($change_pass_data['new_password_err'])) { ?>
                  <span class="text-danger"><?php echo $change_pass_data['new_password_err'];  ?></span>   
                <?php 
                  }
                  ?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="newPassword" class="form-control rounded-0 " placeholder="Enter New Password" >
                </div>

                <!--Confirm Password Input -->
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="confirmPassword" class="form-control rounded-0 " placeholder="Enter Confirm Password" >
                </div>
                <!-- submit input -->
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block myBtn" value="Change Password" name="change_password">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- End register form -->

<?php include_once '../app/views/inc/footer.inc.php'; ?>
