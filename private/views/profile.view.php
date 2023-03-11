<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
 <?php if ($row):?>


    <?php 
    $image = get_image($row->image , $row->gender);
    ?>

	   <div class="row">
	   	<div class="col-lg-4">
	   		<img src="<?=$image?>" class="d-block mx-auto rounded-circle border border-primary p-1" style="width:150px">
	   		<h3 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname) ?></h3>

	   		<?php if (Auth::access('reception') || (Auth::access('reception') && $row->rank == 'student')): ?>
		   		<div class="text-center">
		   			<a href="<?=ROOT?>profile/edit/<?=$row->user_id?>">
		   				<button class="btn btn-sm btn-info  font-weight-bold">Edit</button>
		   			</a>

		   			<a href="<?=ROOT?>profile/delete/<?=$row->user_id?>">
	   		    		<button class="btn btn-sm btn-danger font-weight-bold">Delete</button>
	   		      </a>
		   		</div>
	   		<?php endif; ?>
	   	</div>
	   	<div class="col-lg-8 bg-light">
		   	<div class="table-responsive">
		   		<table class="table table-hover table-striped table-bordered">
		   			<tr><th>First Name : </th><td><?=esc($row->firstname )?></td></tr>
		   			<tr><th>Last Name : </th><td><?=esc($row->lastname )?></td></tr>
		   			<tr><th>Email : </th><td><?=esc($row->email) ?></td></tr>
		   			<tr><th>Gender : </th><td><?=esc($row->gender) ?></td></tr>
		   			<tr><th>Rank : </th><td><?=esc(ucwords(str_replace("_"," ",$row->rank))) ?></td></tr>
		   			<tr><th>Date Created : </th><td><?=get_date($row->date) ?></td></tr>
		   		</table>
		   	</div>
	   	</div>
	   </div>
	    <hr>
	   <div class="container-fluid">
	   	 <ul class="nav nav-tabs">
			<li class="nav-item">
			  <a class="nav-link <?=$page_tab == 'info' ? 'active' : '' ;?>" href="<?=ROOT?>profile/<?=$row->user_id?>">Baseic Info</a>
			</li>
			<?php if (Auth::access('lecturer') || Auth::i_own_content($row)): ?>
				<li class="nav-item">
			   	  <a class="nav-link <?=$page_tab == 'classes' ? 'active' : '' ;?>" href="<?=ROOT?>profile/<?=$row->user_id?>?tab=classes">My Classes</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link <?=$page_tab == 'tests' ? 'active' : '' ;?>" href="<?=ROOT?>profile/<?=$row->user_id?>?tab=tests">Tests</a>
				</li>
		  <?php endif; ?>
	     </ul>

	     <?php 
	       switch ($page_tab) {
	       	case 'info':
	       		// code...
	       	   include(views_path('profile-tab-info'));
	       		break;

	       	case 'classes':
	       		// code...
	       	   if (Auth::access('lecturer') || Auth::i_own_content($row)) {
	       	   	// code...
		       	    include(views_path('profile-tab-classes'));

	       	   }else{
                  include(views_path('access-denied'));
	       	   }

	       		break;
	       	

	       	case 'tests':
	       		// code...
	            include(views_path('profile-tab-tests'));
	       		break;
	       	
	       	
	       	default:
	       		// code...
	       		break;
	       }


	      ?>

	    
	     
	   </div>
	<?php else: ?>
		<h3 class="text-center">That Profile was not found</h3>
<?php endif; ?>
</div>

<?php $this->view('includes/footer') ; ?>