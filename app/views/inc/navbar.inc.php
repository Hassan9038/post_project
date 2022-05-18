<?php if(isset($_SESSION['user_name'])):  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>posts/show">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>posts/show">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>about_us">About us</a>
      </li>
     
  
        <li class="nav-item dropdown pull-right">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hi <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'] ;} ?>
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo URLROOT;  ?>users/profile">Profile</a>
          <a class="dropdown-item" href="<?php echo URLROOT; ?>users/logout">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<?php endif;  ?>