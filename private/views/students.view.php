<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
    <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
    
    <!-- Start Search nav -->
    <nav class="navbar navbar-light bg-light">
          <form class="form-inline" method="get">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </button>
              </div>
              <input type="text" name="find" value="<?= isset($_GET['find'])?$_GET['find']: ''; ?>" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            </div>
          </form>
          <a href="<?=ROOT?>signup?mode=students">
           <button class="btn-sm btn-primary float-right"><i class="fa fa-plus"></i> Add New</button>
         </a>
    </nav>
    <!-- End Search nav -->
         
    
   <!-- Start users card -->
   <div class="card-group justify-content-center">

    

        <?php if($rows): ?>

            <?php foreach($rows as $row): ?>

               <?php include(views_path('user'));  ?>
            <?php endforeach; ?>
            
        <?php else: ?>
               <h4>No student were found at this time</h4>

        <?php endif; ?>

   </div>
  <!-- Start users card -->

  <?php $pager->display(); ?>

</div>

<?php $this->view('includes/footer') ; ?>