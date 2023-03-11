<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">	
   <?php $this->view('includes/crumbs' ,['crumbs'=> $crumbs]); ?>
   <!-- Start users card -->
   <div class="card-group justify-content-center">
    <h4>المدارس</h4>

    <table class="table table-hover table-striped text-right" style="direction: right">
      <tr>
        <th></th>
        <th>اسم المدرسة</th>
        <th>اضافة بواسطة</th>
        <th>تاريخ الاضافة</th>
        <th>
          <a href="<?=ROOT?>schools/add">
            <button class="btn-sm btn-primary"><i class="fa fa-plus"></i> اضافة مدرسة جديدة</button>
          </a>
        </th>
      </tr>

    
  <?php if($rows): ?>
    <?php foreach($rows as $row): ?>
     
      <tr>
        <td>
          <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i> عرض تفاصيل</button>
        </td>
        <td><?= $row->school?></td>
        <td><?= $row->user->firstname ?> <?= $row->user->lastname ?></td>
        <td><?= get_date($row->date)?></td>
        <td>
          <a href="<?=ROOT?>schools/edit/<?= $row->id?>" title="تعديل">
             <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> </button>
          </a>

          <a href="<?=ROOT?>schools/delete/<?= $row->id?>" title="حذف">
             <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> </button>
          </a>

          <a href="<?=ROOT?>switch_school/<?= $row->id?>">
             <button class="btn btn-sm btn-success">تشغيل المدرسة <i class="fa fa-gear"> </i> </button>
          </a>
          

        </td>
      </tr>
        

    <?php endforeach; ?>
  <?php else: ?>
   <h4>No Schools were found at this time</h4>
  <?php endif; ?>
</table>
  </div>
  <!-- Start users card -->

</div>

<?php $this->view('includes/footer') ; ?>