<?php include_once '../app/views/inc/header.inc.php'; ?>

  <!-- Start login form -->
  <div class="row justity-content-center wrapper " id="login-box" >
        <div class="col-lg-10 my-auto mx-auto" >
          <div class="card-group myShadow">
            <div class="card rounded-left p-4" style="flex-grow:1.4">
              <h1 class="text-center font-weight-bold text-primary">Sign in to account</h1>
              <hr class="my-3">
              <!-- form login --> 
              <form action="<?php echo URLROOT; ?>users/login" method="post" class="px-3" id="login-form">
                <!-- User Name input --> 
                <?php 
                //print err message for name
                  if(isset($_POST) && !empty($data['name_err'])){ ?>
                     <span class="text-danger font-weight-bold"><?php echo $data['name_err']; ?></span> 
                  <?php 
                  }
                ?>
                <div id="loginAlert"></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fa fa-user fa-lg"></i>
                    </span>
                  </div>
                  <input type="text" name="userName"  class="form-control rounded-0 <?php if(!empty($data['name_err']) && isset($_POST)) echo 'is-invalid'; ?>"
                  placeholder="Type your username" value="<?php echo $data['name'] ?>" autocomplate="off">
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
                  placeholder="Enter your password"  value="<?php echo $data['password'] ?>">
                </div>
               
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block myBtn" value="Sign In" >
                </div>
              </form>
            </div>
            <div class="card justity-content-center rounded-right myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
              <hr class="my-3 bg-light myHr">
              <p class="text-center font-weight-bolder text-light lead">Enter your
              personal details and start your journey with us!</p>
              <a  class="btn btn-outline-light btn-lg align-self-center
              font-weight-bolder mt-4 myLinkBtn text-light" href="<?php echo URLROOT ;?>users/register">Sign Up</a>
              
            </div>
          </div>
        </div>
      </div>
      <!-- End login form -->
      
 <?php include_once '../app/views/inc/footer.inc.php'; ?>