<div class="card-group justify-content-center">
  <div class="table-responsive" >
    <table class="table table-hover table-striped">
      <tr>
        <th></th>
        <th>Test Name</th>
        <th>Student</th>
        <th>Date submitted</th>
        <th>Marked by</th>
        <th>Date marked</th>
        <th>Answered</th>
        <th></th>
      </tr>

    
  <?php if(isset($test_rows) && $test_rows): ?>
    <?php foreach($test_rows as $test_row): ?>
     
      <tr>
        <td>
          <?php if(Auth::access('lecturer')): ?>
            <a href="<?=ROOT?>single_test/<?= $test_row->test_id?>">
              <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i>View</button>
            </a>
         <?php endif;?>
        </td>
        <td><?= $test_row->test_details->test?></td>
        <td><?= $test_row->user->firstname ?> <?= $test_row->user->lastname ?></td>
        

        <td><?=get_date($test_row->submitted_date);?></td>
        <td><?=($test_row->marked_by);?></td>
        <td><?=($test_row->marked_date);?></td>

        <td>

         <?php 
         $precentage =  get_answer_precentage($test_row->test_id , $test_row->user_id) ?>
         <?=$precentage?>%
        </td>

        <td>
          <?php if(can_take_test($test_row->test_id)): ?>
            <a href="<?=ROOT?>take_test/<?= $test_row->test_id?>">
               <button class="btn btn-sm btn-primary">Take this test</button>
            </a>
          <?php endif; ?>
        </td>
      
      </tr>
        

    <?php endforeach; ?>
  <?php else: ?>
   <tr><td colspan="6"><h4 class="text-center">No test were found at this time</h4></td></tr>
  <?php endif; ?>
  </table>
</div>
</div>

