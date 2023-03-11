<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <!-- Start users card -->
   <div class="card-group justify-content-center">


   <form method="post">

     <!-- Start Add new class -->
    <h3>Add New Class</h3>
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
   
     <input class="form-control" type="text" name="class" value="<?=get_var('class')?>" placeholder="Class Name" autofocus>
     <br>
     <input class="btn btn-primary float-right" type="submit" value="Create">
     <a href="<?=ROOT?>classes">
       <input class="btn btn-danger" type="button" value="Cancel">
     </a>
   </form>    
   <!-- End Add new class -->    

  </div>
  <!-- Start users card -->

</div>

<?php $this->view('includes/footer') ; ?>