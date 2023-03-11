<!-- Start Add lecturer form -->
<form method="post" class="m-auto p-3" style="width: 100% ; max-width: 400px">

	 <!-- Start Errors -->
	<?php if (count($errors) > 0): ?>
		<div class="alert alert-warning text-center alert-dismissble fade show p-2" role="alert">
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
	<h4 class="mt-2">Add Lecturer</h4>
	<input value="<?= get_var('name')?>"  autofocus type="text" class="form-control" name="name" placeholder="Add Lecturer">
	<br>
	<button class="btn btn-primary float-right" name="search">Search</button>

	<a href="<?=ROOT?>single_class/<?= $row->class_id?>?tab=lecturers">
	   <button class="btn btn-danger float-left" type="button">Cancel</button>
	</a>
	<div class="clearfix"></div>
</form>
<!-- Start Add lecturer form -->
<div class="container-fluid">
	<form method="post">

		<div class="card-group justify-content-center">

			
		  <?php if(isset($results) && $results): ?>
			<!-- Start table to add lecturer -->
	      
			    <?php foreach($results as $row): ?>
	            
			      <?php include(views_path('user')); ?>

			    <?php endforeach; ?>
		  
		    <!-- End table to add lecturer -->
		    <?php else: ?>
        </div>
		       <?php if(count($_POST) > 0): ?>
		       	<hr>
	            <h4 class="text-center"> No results were found</h4>
		       <?php endif; ?>

			<?php endif; ?>
		   
	   
   </form>
</div>