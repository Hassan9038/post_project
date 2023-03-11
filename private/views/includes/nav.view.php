 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=ROOT?>">
     <img src="<?=ROOT?>assets/logo2.jpg" class=" border border-primary rounded-circle mx-auto" style="width: 50px;">
    <?= Auth::getSchool_name(); ?> 

     </a>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=ROOT?>">لوحة التحكم <span class="sr-only">(current)</span></a>
      <?php if(Auth::access('super_admin')):  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>schools">المدارس</a>
        </li>
      <?php endif; ?>
       
      <?php if(Auth::access('admin')):  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>users">هيئة التدريس</a>
        </li>
      <?php endif; ?>

      <?php if(Auth::access('reception')):  ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>students">الطلاب</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>classes">الفصول</a>
      </li>

      </ul> 
  </div>
   <div class="avbar-nav dropdown float-end mr-5" >
    <a style="color: rgba(0,0,0,.5);" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
      <?= Auth::getFirstname(); ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="<?=ROOT?>profile">Profile</a>
      <a class="dropdown-item" href="<?=ROOT?>">Dashboard</a>
       <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?=ROOT?>logout">Logout</a>
    </div>
  </div>
</nav>
