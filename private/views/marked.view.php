<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
   <!-- Start users card -->
   <h4>Markred Tests</h4>
     <!-- Start Search nav -->
    <nav class="navbar navbar-light bg-light">
          <form class="form-inline">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </button>
              </div>
              <input name="find" value="<?= isset($_GET['find'])?$_GET['find']: ''; ?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
            </div>
          
          </form> 
    </nav>
    <!-- End Search nav -->
   <?php include(views_path('marked'));  ?>
  
  <!-- Start users card -->

</div>

<?php $this->view('includes/footer') ; ?>