<?php include_once '../app/views/inc/header.inc.php'; ?>

  <!-- Start register form -->
  <div class="row justity-content-center wrapper " id="register-box" >
        <div class="col-lg-10 my-auto mx-auto">
          <div class="card-group myShadow">
            <div class="card justity-content-center rounded-left myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
              <hr class="my-3 bg-light myHr">
              <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info!</p>
              <a  class="btn btn-outline-light btn-lg align-self-center
              font-weight-bolder mt-4 myLinkBtn text-light" href="<?php echo URLROOT ;?>users/login">Sign In</a>
            </div>
            <div class="card rounded-right p-4" style="flex-grow:1.4">
              <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
              <hr class="my-3">

              <!-- Start Register  form  --> 
              <form action="<?php echo URLROOT; ?>users/register" method="post" class="px-3" id="register-form">
                <!-- Username input -->
                <?php
                //print err message for name
                  if(isset($_POST) && !empty($data['name_err'])){ ?>
                     <span class="text-danger font-weight-bold"><?php echo $data['name_err']; ?></span>
                  <?php
                  }
                ?>

                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="userName" id="name" class="form-control rounded-0 <?php if(!empty($data['name_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                  placeholder="Enter Your Username" value="<?php echo $data['name'] ?>">
                </div>

                <!-- Email input -->
                <?php
                //print err message for Email
                  if(isset($_POST) && !empty($data['email_err'])){ ?>
                     <span class="text-danger font-weight-bold"><?php echo $data['email_err']; ?></span>
                  <?php
                  }
                ?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0 ">
                      <i class="fa fa-envelope fa-lg"></i>
                    </span>
                  </div>
                  <input type="email" name="userEmail" id="remail" class="form-control rounded-0 <?php if(!empty($data['email_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                  placeholder="E-Mail" value="<?php echo $data['email'] ?>">
                </div>


                <!-- Password Input -->
                <?php
                //print err message for password
                  if(isset($_POST) && !empty($data['password_err'])){ ?>
                     <span class="text-danger font-weight-bold"><?php echo $data['password_err']; ?></span>
                  <?php
                  }
                ?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="userPassword" class="form-control rounded-0 <?php if(!empty($data['password_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                   placeholder="password"
                  value="<?php echo $data['password'] ?>" >
                </div>


                <!-- Confirm password -->
                <?php
                //print err message for confirm passowrd
                  if(isset($_POST) && !empty($data['confirm-password_err'])){ ?>
                     <span class="text-danger font-weight-bold"><?php echo $data['confirm-password_err']; ?></span>
                  <?php
                  }
                ?>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-key fa-lg"></i>
                    </span>
                  </div>
                  <input type="password" name="userConfirmPassword" class="form-control rounded-0 <?php if(!empty($data['confirm-password_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                   placeholder="Confirm password" value="<?php echo $data['confirm-password'] ?>">
                </div>

                <!-- submit input -->
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block myBtn" value="Sign Up" id="register-btn">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- End register form -->

<?php include_once '../app/views/inc/footer.inc.php'; ?>
