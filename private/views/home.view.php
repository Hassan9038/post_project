<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>
<style type="text/css">
	h1{
		font-size: 80px;
		color:  #808;
	}

	a{
		text-decoration: none !important;
	}
	.card-header{
		font-weight: bold;
	}
	.card{
		min-width: 150px;
	}
	
</style>
<!-- Start Home page -->

<div class="container-fluid shadow mx-auto" style="max-width: 1000px;">
	<div class="row justify-content-center">
	      
	    <?php if(Auth::access('super_admin')):  ?> 
			<div class="card col-3 border m-4 shadow rounded p-0 text-right">
				<a href="<?=ROOT?>schools">
					<div class="card-header">المدارس</div>
		            <h1 class="text-center">
		              <i class="fa fa-graduation-cap"></i>
		            </h1>

				 	<div class="card-header">عرض كل المدارس</div>
			     </a>
			</div>
		<?php endif; ?>

	    <?php if(Auth::access('admin')):  ?> 
			<div class="card col-3 border m-4 shadow rounded p-0 text-right">
				<a href="<?=ROOT?>users">
					<div class="card-header">هيئة التدريس</div>
		            <h1 class="text-center">
		              <i class="fa fa-chalkboard-teacher"></i>
		            </h1>

					<div class="card-header">عرض جميع هيئة التدريس</div>
			    </a>
			</div>
		<?php endif; ?>

       <?php if(Auth::access('reception')):  ?> 
			<div class="card col-3 border m-4 shadow rounded p-0 text-right">
				<a href="<?=ROOT?>students">
					<div class="card-header">الطلاب</div>
		            <h1 class="text-center">
		              <i class="fa fa-user-graduate"></i>
		            </h1>

					<div class="card-header">عرض جميع الطلاب</div>
				</a>
			</div>
        <?php endif; ?>


		<div class="card col-3 border m-4 shadow rounded p-0 text-right">
			 <a href="<?=ROOT?>classes">
				<div class="card-header">الفصول</div>
	            <h1 class="text-center">
	              <i class="fa fa-university"></i>
	            </h1>

				<div class="card-header">عرض جميع الفصول</div>
			</a>
		</div>

	       
	

	    <?php if(Auth::access('super_admin')):  ?>     
			<div class="card col-3 border m-4 shadow rounded p-0 text-right" >
				<a href="<?=ROOT?>statistics">
					<div class="card-header">الاحصائيات</div>
		            <h1 class="text-center" style="font-size: 80px">
		              <i class="fa fa-chart-pie"></i>
		            </h1>

					<div class="card-header">عرض جميع الاحصائيات</div>
				</a>
			</div>
			    

			<div class="card col-3 border m-4 shadow rounded p-0 text-right">
				 <a href="<?=ROOT?>settings">
					<div class="card-header">الاعدادات</div>
		            <h1 class="text-center">
		              <i class="fa fa-cogs"></i>
		            </h1>

					<div class="card-header">عرض الاعدادات</div>
				</a>
			</div>
		<?php endif;?>    
	     
		<div class="card col-3 border m-4 shadow rounded p-0 text-right">
			<a href="<?=ROOT?>profile/">
				<div class="card-header">الملف الشخصي</div>
	            <h1 class="text-center" style="font-size: 80px">
	              <i class="fa fa-id-card"></i>
	            </h1>

				<div class="card-header">عرض ملف الشخصي</div>
			</a>
		</div>
		    

	        
		<div class="card col-3 border m-4 shadow rounded p-0 text-right">
			<a href="<?=ROOT?>logout">
				<div class="card-header">تسجيل خروج</div>
	            <h1 class="text-center">
	              <i class="fa fa-sign-out-alt"></i>
	            </h1>

				<div class="card-header">خروج من النظام</div>
			 </a>
		</div>
	  


	</div>

</div>
<!-- End Home Page -->
<?php $this->view('includes/footer') ; ?>