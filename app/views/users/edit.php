<?php include_once '../app/views/inc/header.inc.php';
if(!isset($_SESSION['user_name'])){
  redirect('users/login');
  exit();
}
?>

  <!-- Start register form -->
  <div class="row justity-content-center wrapper " id="register-box" >
        <div class="col-lg-6 my-auto mx-auto">
          <div class="card-group myShadow">

            <div class="card rounded-right p-4" style="flex-grow:1.4">
              <h1 class="text-center font-weight-bold text-primary">Update Your Profile</h1>
              <hr class="my-3">

              <!-- Start Register form  -->
              <form action="<?php echo URLROOT; ?>users/edit" method="post" class="px-3" id="register-form">
                <!-- Username input -->

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="userName" id="name" class="form-control rounded-0 <?php if(!empty($Edit_data['name_err']) && isset($_POST)) echo 'is-invalid'; ?> "
                   placeholder="Type Your Username" value="<?php echo $data->userName;  ?>">

                </div>
                <?php if (!empty($Edit_data['name_err'])): ?>
                  <span class="text-danger"><?php echo $Edit_data['name_err']; ?></span>
                <?php endif; ?>


                <!-- Email input -->

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0 ">
                      <i class="fa fa-envelope fa-lg"></i>
                    </span>
                  </div>
                  <input type="email" name="userEmail" id="remail" class="form-control rounded-0 <?php if(!empty($Edit_data['email_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                  placeholder="E-Mail" value="<?php echo $data->userEmail; ?>">
                </div>
                <?php if (!empty($Edit_data['email_err'])): ?>
                  <span class="text-danger"><?php echo $Edit_data['email_err']; ?></span>
                <?php endif; ?>




                <!-- submit input -->
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block myBtn" name="profile_name"
                   value="Update" id="register-btn">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- End register form -->

<?php include_once '../app/views/inc/footer.inc.php'; ?>
