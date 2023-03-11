<!-- Start Card infomation page -->

<?php 
  $image = get_image($row->image , $row->gender);
?>
                
<div class="card m-2 shadow-sm" style="max-width: 12rem; min-width: 12rem;">
    <img src="<?=$image ?>" class="card-img-top p-1  shadow-sm d-block mx-auto  m-auto">
    <div class="card-body">
        <h5 class="card-title text-center"><?=$row->firstname ?> <?=$row->lastname ;?></h5>
        <p class="card-text text-center"><?=str_replace("_" , " ",  $row->rank)  ;  ?></p>
        <a href="<?=ROOT?>profile/<?=$row->user_id?> " class="btn btn-primary">Profile</a>

        <!-- Show the select button when you add lecturer -->
        <?php if(isset($_GET['select'])): ?>
          <button name="selected" value="<?=$row->user_id?>" class="btn btn-danger float-right">Select</button>
        <?php endif;?>
    </div>
</div>

<!-- End Card -->