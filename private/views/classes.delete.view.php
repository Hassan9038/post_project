<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
   <!-- Start users card -->
   <?php if($row): ?>
       <div class="card-group justify-content-center">

       
           <form method="post">

             <!-- Start Add new class -->
            <h3>Are you sure to want to delete</h3>
           
           
             <input class="form-control" type="text" name="class" value="<?=get_var('class' ,$row[0]->class)?>" placeholder="Class Name" disabled> <!-- not Delete form disabled input -->
             <input type="hidden" name="id"> <!-- Delete form here -->
             <br>
             <input class="btn btn-danger float-right" type="submit" value="Delete">
             <a href="<?=ROOT?>classes">
               <input class="btn btn-success" type="button" value="Cancel">
             </a>
           </form>  
       <?php else: ?>  
         <div class="text-center">
           <h3>The class was not found </h3><br>
          <a href="<?=ROOT?>classes">
               <input class="btn btn-danger" type="button" value="Cancel">
          </a>
       
         </div>
       <!-- End Add new class -->    

      </div>
   <?php endif; ?> 
  <!-- Start users card -->

</div>

<?php $this->view('includes/footer') ; ?>