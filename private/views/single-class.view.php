<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">
	<?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
 <?php if ($row):?>
    <h4 class="text-center"><?=esc(ucwords($row->class ))?></h4>
	   <div class="row">
       <!-- Start table -->
	   	<div class="col bg-light">
	   		<table class="table table-hover table-striped table-bordered">
	   			<tr><th>Created By : </th><td><?=esc(ucwords($row->user->firstname))?> <?=esc($row->user->lastname) ?></td>
	   			<th>Date Created : </th><td><?=get_date($row->date) ?></td></tr>
	   		</table>
	   	</div>
	   	<!-- End table -->
	   </div>
	 
	   <div class="container-fluid">
	   	 <ul class="nav nav-tabs">
	 		<?php if(Auth::access('lecturer')): ?>
				<li class="nav-item">
				  <a class="nav-link <?= $page_tab=='lecturers' ?'active' : '' ;?>" href="<?=ROOT?>single_class/<?= $row->class_id?>?tab=lecturers">Lecturers</a>
				</li>
			<?php endif ;?>
			<li class="nav-item ">
		   	  <a class="nav-link <?= $page_tab=='students' ?'active' : '' ;?>" href="<?=ROOT?>single_class/<?= $row->class_id?>?tab=students">Students</a>
			</li>
			<?php if(Auth::access('lecturer')): ?>
				<li class="nav-item">
				  <a class="nav-link <?= $page_tab=='tests' ?'active' : ''; ?>" href="<?=ROOT?>single_class/<?= $row->class_id?>?tab=tests">Tests</a>
				</li>
		   <?php endif ;?>
	     </ul>

	   

	    <?php 
       switch ($page_tab) {
       	case 'lecturers':
       		// code...
	    		if (Auth::access('lecturer')) {
       	      include(views_path('class-tab-lecturers')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}
       		break;

    		case 'students':
    		// code...
    		   include(views_path('class-tab-students')) ;
    	   	break;

    		case 'tests':
	    		// code...
	    		if (Auth::access('lecturer')) {
	    		   include(views_path('class-tab-tests')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

  		   break;

  		   case 'test-add':
	    		// code...
	    		if (Auth::access('lecturer')) {
	    		   include(views_path('class-tab-test-add')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}
    		   
  		   break;

  		   case 'test-edit':
    			// code...
	    		if (Auth::access('lecturer')) {
	    		   include(views_path('class-tab-test-edit')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

  		   break;

  		   case 'test-delete':
    		// code...
	    		if (Auth::access('lecturer')) {
	    		   include(views_path('class-tab-test-delete')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}
    		
  		   break;

    		case 'lecturers-add':
    		// code...
	    		if (Auth::access('lecturer')) {
    		      include(views_path('class-tab-lecturers-add')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}
    		
    		 break;


    		case 'lecturers-remove':
    		// code...
    		  if (Auth::access('lecturer')) {
    		      include(views_path('class-tab-lecturers-remove')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

    		break;

    		case 'students-add':
    		// code...
    		   if (Auth::access('lecturer')) {
    		   include(views_path('class-tab-students-add')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

    		break;

    		case 'students-remove':
    		// code...
    		   if (Auth::access('lecturer')) {
    		   include(views_path('class-tab-students-remove')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

    		 break;    	   
    	   
    	   case 'tests-add':
    		// code...
    		   if (Auth::access('lecturer')) {
    		   include(views_path('class-tab-tests-add')) ;
	    		}else{
	    			include(views_path('access-denied')) ;
	    		}

    		 break;
    	
    	
       	default:
       		// code...
       		break;
       }

	     ?>

	   </div>
	<?php else: ?>
		<h3 class="text-center">That Class was not found</h3>
<?php endif; ?>
</div>

<?php $this->view('includes/footer') ; ?>
