<?php $this->view('includes/header'); ?>

<!-- Start Signup form-->
<form method="post">
	<div class="container-fluid">
		<div class="mx-auto shadow rounded p-3" style="width: 100% ; max-width: 350px; margin-top: 50px;">
			<h2 class="text-center">My School</h2>
			<img src="<?=ROOT?>assets/logo2.jpg" class="d-block border border-primary rounded-circle mx-auto" style="width: 100px;">
			<h3>Add User</h3>

           <!-- Start Errors -->
			<?php if (count($errors) > 0): ?>
				<div class="alert alert-warning alert-dismissble fade show p-0" role="alert">
					<strong>Errors:</strong> <br>
					<?php foreach ($errors as $error): ?>
						<?php echo $error . '<br>';  ?>
					<?php endforeach; ?>
					<button type="button" class="close" data-dismiss="alert" aria-lable="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

			<?php endif; ?>
			<!-- End Errors -->


			<input type="text"value="<?=get_var('firstname')?>" class="form-control mb-2" name="firstname" placeholder="First Name">
			<input type="text"value="<?=get_var('lastname')?>" class="form-control mb-2" name="lastname" placeholder="Last Name">

			<input type="email"value="<?=get_var('email')?>" class="form-control mb-2" name="email" placeholder="Email">

			<select class="form-control mb-2" name="gender">
				<option <?= get_select("gender" , "");?> value="">--Select a Gender</option>
				<option <?= get_select("gender" , "male");?> value="male">Male</option>
				<option <?= get_select("gender" , "female");?> value="female">Female</option>
			</select>
            <?php if($mode == 'students'):  ?>
             <input type="hidden" name="rank" value="student">
       
            <?php else: ?>
				<select class="form-control mb-2" name="rank">
					<option <?= get_select("rank" , "");?> value="">--Select a Rank</option>
					<option <?= get_select("rank" , "student");?> value="student">Student</option>
					<option <?= get_select("rank" , "reception");?> value="reception">Reception</option>
					<option <?= get_select("rank" , "lecturer");?> value="lecturer">Lecturer</option>
					<option <?= get_select("rank" , "admin");?> value="admin">Admin</option>
					<?php if(Auth::getRank() == 'super_admin'): ?>
					<option <?= get_select("rank" , "super_admin");?> value="super_admin">Super</option>
				   <?php endif;?>
				</select>

           

           <?php endif; ?>

			<input type="text" value="<?=get_var('password')?>" class="form-control mb-2" name="password" placeholder="Password"autocomplete="off">

			<input type="text" value="<?=get_var('password2')?>" class="form-control mb-2" name="password2" placeholder="Retype Password"autocomplete="off">

			<button type="submit" class="btn btn-primary float-right">Add User</button> <!-- Not work pull-right-->
            <?php if($mode == 'students'):  ?>
			    <a href="<?=ROOT?>students">
			    	<button type="button" class="btn btn-danger ">Cancel</button>
				</a>
            <?php else: ?>
				 <a href="<?=ROOT?>users">
			    	<button type="button" class="btn btn-danger ">Cancel</button>
				</a>
		    <?php endif;?>

		</div>

	</div>
</form>
<!-- End Signup form- -->
<?php $this->view('includes/footer') ; ?>
