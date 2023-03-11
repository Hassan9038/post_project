<!-- Start Search nav -->
<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">
            <i class="fa fa-search"></i>
        </span>
      </div>
      <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
      </div>
    </form>
     <div>
      <?php if(Auth::access('lecturer')):?>
       <a href="<?=ROOT?>single_class/studentadd/<?=$row->class_id?>?select=true">
        <button class="btn-sm btn-primary p-2 float-right"><i class="fa fa-plus"></i> Add student</button>
      </a>
       <a href="<?=ROOT?>single_class/studentremove/<?=$row->class_id?>?&select=true">
        <button class="btn-sm btn-danger mr-3 p-2  float-right"><i class="fa fa-minus"></i> Remove student</button>
      </a>
        &nbsp;
       <?php endif;  ?>

    </div>
</nav>
<!-- End Search nav -->

 <!-- Start users card -->
<div class="card-group justify-content-center">
  <?php if(is_array($students)):  ?>
     <?php foreach ($students as $student ) : ?>

       <?php 
          $row = $student->user; 
           include(views_path('user')); 
       ?> 
     <?php endforeach;?>    

  <?php else:  ?>
    <h4 class="text-center">No students were found in this class</h4>
  <?php endif;  ?>
</div>
<br class="clearfix">
 <?php $pager->display(); ?>