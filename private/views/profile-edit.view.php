<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">
	<h4 class="text-center">Edit Profile</h4>
 <?php if ($row):?>


    <?php 
    $image = get_image($row->image , $row->gender);
    ?>
    <form method="post" enctype="multipart/form-data">
	   <div class="row">
	   	<div class="col-4">
	   		<img src="<?=$image?>" class="d-block mx-auto border  p-1" style="width:200px">
      		<br>
	   		<?php if (Auth::access('reception') || Auth::i_own_content($row)): ?>
		   		<div class="text-center">
		   			<label for="edit_img" class="btn btn-sm btn-primary  font-weight-bold">
		   				<input onchange="display_image_name(this.files[0].name)" id="edit_img" type="file" name="image" style="display: none;">
		   			   Browse Image
		   		   </label>
		   		   <small class="text-muted file_info"></small>
		   	
	   		<?php endif; ?>
	   	  </div>
	   	</div>

	   	<!-- Start Edit form -->

	   	<div class="col-8 bg-light">
	   		
					<div class="container-fluid">
						<div class="mx-auto shadow rounded p-4">
							

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

							<input type="text"value="<?=get_var('firstname' , $row->firstname)?>" class="form-control mb-2" name="firstname" placeholder="First Name">
							<input type="text"value="<?=get_var('lastname', $row->lastname)?>" class="form-control mb-2" name="lastname" placeholder="Last Name">

							<input type="email"value="<?=get_var('email', $row->email)?>" class="form-control mb-2" name="email" placeholder="Email">

							<select class="form-control mb-2" name="gender">
								<option <?= get_select("gender" ,  $row->gender);?> value="<?= $row->gender;?>"><?=$row->gender?></option>
								<option <?= get_select("gender" , "male");?> value="male">Male</option>
								<option <?= get_select("gender" , "female");?> value="female">Female</option>
							</select>
				       
							<select class="form-control mb-2" name="rank">
								<option <?= get_select("rank" , $row->rank);?> value="<?=$row->rank?>"><?=ucfirst($row->rank)?></option>
								<option <?= get_select("rank" , "student");?> value="student">Student</option>
								<option <?= get_select("rank" , "reception");?> value="reception">Reception</option>
								<option <?= get_select("rank" , "lecturer");?> value="lecturer">Lecturer</option>
								<option <?= get_select("rank" , "admin");?> value="admin">Admin</option>
								<?php if(Auth::getRank() == 'super_admin'): ?>
								<option <?= get_select("rank" , "super_admin");?> value="super_admin">Super</option>
							   <?php endif;?>
							</select>   

							<input type="text" value="<?=get_var('password')?>" class="form-control mb-2" name="password" placeholder="Password"autocomplete="off">

							<input type="text" value="<?=get_var('password2')?>" class="form-control mb-2" name="password2" placeholder="Retype Password"autocomplete="off">

							<button type="submit" class="btn btn-primary float-right">Save Changes</button> <!-- Not work pull-right-->
				         
						      <a href="<?=ROOT?>profile/<?=$row->user_id?>">
						    	<button type="button" class="btn btn-danger ">Back to profile</button>
							</a>
				        
						</div>

					</div>
				
	   	</div>

	   </div>
	 </form>
	<!-- End Edit form -->
	<?php else: ?>
		<h3 class="text-center">That Profile was not found</h3>
<?php endif; ?>
</div>

<script type="text/javascript">
	function display_image_name(file_name) {
		
		document.querySelector('.file_info').innerHTML = "<br><b>Selected file : </b><br>" + file_name;
	}
</script>
<?php $this->view('includes/footer') ; ?>