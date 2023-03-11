<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
   <!-- Start users card -->
   <?php if($row): ?>
       <div class="card-group justify-content-center">

       
           <form method="post">

             <!-- Start Add new school -->
            <h3>Edit School</h3>
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
           
             <input class="form-control" type="text" name="school" value="<?=get_var('school' ,$row[0]->school)?>" placeholder="School Name" autofocus>
             <br>
             <input class="btn btn-primary float-right" type="submit" value="Save">
             <a href="<?=ROOT?>schools">
               <input class="btn btn-danger" type="button" value="Cancel">
             </a>
           </form>  
       <?php else: ?>  
         <div class="text-center">
           <h3>The school was not found </h3><br>
          <a href="<?=ROOT?>schools">
               <input class="btn btn-danger" type="button" value="Cancel">
          </a>
       
         </div>
       <!-- End Add new school -->    

      </div>
   <?php endif; ?> 
  <!-- Start users card -->

</div>

<?php $this->view('includes/footer') ; ?>