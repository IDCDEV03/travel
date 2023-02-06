<?php $__env->startSection('title', 'ข้อมูลธนาคาร'); ?>

<?php $__env->startSection('css'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลธนาคาร</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">          
                    <div class="card-header">  
                    <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">เพิ่มบัญชีธนาคาร</button>
                </div> 
                    <div class="card-body">                      
                        <div class="table-responsive">
                            <table class="table align-middle table-bordered display" >
                                <thead class="bg-primary">
                                    <tr>
                  
                                        <th>ชื่อธนาคาร</th>
                                        <th>ชื่อบัญชี</th>
                                        <th>เลขที่บัญชี</th>
                                        <th>สาขา</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $__currentLoopData = $data_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                             
                                        <tr>
                                        
                                            <td><?php echo e($row->bank_name); ?></td>
                                            <td><?php echo e($row->bank_account_name); ?></td>
                                            <td><?php echo e($row->account_nummber); ?></td>
                                            <td><?php echo e($row->bank_branch); ?></td>
                                            <td>
                                            
                                                    <a href="#" class="btn btn-info" >
                                                        <i class="fa fa-edit"></i> แก้ไข</a>
                                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash-o"></i> ลบ</a>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!---modal----->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีธนาคาร</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">.
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" >ชื่อธนาคาร</label>
                        <input class="form-control" type="text" name="bank_name">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">ชื่อบัญชี</label>
                        <input class="form-control" type="text" name="bank_account_name">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">เลขที่บัญชี</label>
                        <input class="form-control" type="text" name="account_nummber">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">สาขา</label>
                        <input class="form-control" type="text" name="bank_branch">
                      </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit">บันทึกข้อมูล</button>
          <button class="btn btn-primary" type="button" data-bs-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/admin/bank.blade.php ENDPATH**/ ?>