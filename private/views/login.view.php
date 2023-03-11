<?php $this->view('includes/header'); 

?>

<!-- Start Login -->
<div class="container-fluid">
	<form action="" method="post">
		<div class="mx-auto shadow rounded p-3" style="width: 100% ; max-width: 550px; margin-top: 50px;">
			<h2 class="text-center"> منظومة ادارة المدارس بمدينة انجمينا</h2>
			<img src="<?=ROOT?>assets/logo.svg" class="d-block border border-primary rounded-circle mx-auto" style="width: 120px;">
			<h3 class="text-right">تسجيل دخول</h3>


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
			 
			<input type="email" value="<?=get_var('email')?>" class="form-control mb-2" name="email" placeholder="البريد الاكتروني" autofocus autocomplete="off">

			<input type="password" value="<?=get_var('password')?>" class="form-control mb-2" name="password" placeholder="كلمة السر"autocomplete="off">

			<button class="btn btn-primary" style="float:right">تسجل دخول</button>
			<div style="clear:both"></div>
		</div>
	</form>
</div>

<!-- End Login -->
<?php $this->view('includes/footer') ; ?>