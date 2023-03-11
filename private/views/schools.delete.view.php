<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
   <!-- Start users card -->
   <?php if($row): ?>
       <div class="card-group justify-content-center">

       
           <form method="post">

             <!-- Start Add new school -->
            <h3>Are you sure to want to delete</h3>
           
           
             <input class="form-control" type="text" name="school" value="<?=get_var('school' ,$row[0]->school)?>" placeholder="School Name" disabled> <!-- not Delete form disabled input -->
             <input type="hidden" name="id"> <!-- Delete form here -->
             <br>
             <input class="btn btn-danger float-right" type="submit" value="Delete">
             <a href="<?=ROOT?>schools">
               <input class="btn btn-success" type="button" value="Cancel">
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