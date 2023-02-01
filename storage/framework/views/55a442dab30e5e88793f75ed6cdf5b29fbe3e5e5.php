
<?php $__env->startSection('title', 'ข้อมูลคำสั่งซื้อ'); ?>

<?php $__env->startSection('css'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลคำสั่งซื้อ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <b><?php echo e(session('success')); ?></b>
                </div>
            <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                      <div class="tabbed-card">
                        <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
                          <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1" data-bs-toggle="pill" href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">โปรแกรมปกติ</a></li>
                          <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill" href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1" aria-selected="false">โปรแกรมส่วนตัว</a></li>
                   
                        </ul>
                        <div class="tab-content" id="pills-clrtabContent1">
                          <div class="tab-pane fade show active" id="pills-clrhome1"    role="tabpanel" aria-labelledby="pills-clrhome-tab1">
                         
                            <div class="table-responsive">
                                <table class="table align-middle table-bordered display" >
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อผู้สั่งจอง</th>
                                            <th>รหัสทัวร์</th>
                                            <th>ชื่อแพ็คเกจ</th>
                                            <th>จำนวนที่นั่ง</th>
                                            <th>วันที่สั่งจอง</th>
                                            <th>สถานะ</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ($i = 1); ?>
                                        <?php $__currentLoopData = $package_tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($row->member_name); ?></td>
                                                <td><?php echo e($row->code_tour); ?></td>
                                                <td><?php echo e($row->package_name); ?></td>
                                                <td><?php echo e($row->number_of_travel); ?></td>
                                                <td>                                 
                                                    <?php echo e(Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s')); ?>

                                                </td>
                                                <td>
                                <?php if($row->booking_status == '0'): ?>
                                <span class="badge bg-warning  txt-dark">รอเสนอราคา</span>
                                <?php elseif($row->booking_status == '1'): ?>
                                <span class="badge bg-info">
                                    ส่งใบเสนอราคาแล้ว
                                </span>
                                <?php elseif($row->booking_status == '2'): ?>
                                <span class="badge bg-danger f-w-100">
                                    ยกเลิกการสั่งจอง
                                </span>
                                <?php elseif($row->booking_status == '3'): ?>
                                <span class="badge bg-danger">
                                    ยกเลิกใบเสนอราคา
                                </span>
                                <?php elseif($row->booking_status == '4'): ?>
                                <span class="f-w-300 badge bg-secondary">
                                    แจ้งชำระเงินแล้ว <br> รอตรวจสอบ
                                </span>
                                <?php elseif($row->booking_status == '5'): ?>
                                <span class="badge bg-success f-w-100">
                                    ดำเนินการเรียบร้อย
                                </span>
                                <?php endif; ?>
                                                 
                                                </td>
                                                <td> <a href="<?php echo e(url('/admin/booking_cf/'.$row->booking_id)); ?>"> <i class="fa fa-edit"></i> รายละเอียด</a></td>
                                            </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                    </tbody>
                                </table>
                            </div>
                            
                          </div>
                          <div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel" aria-labelledby="pills-clrprofile-tab1">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อผู้สั่งจอง</th>
                                            <th>ชื่อแพ็คเกจ</th>
                                            <th>จำนวนที่นั่ง</th>
                                            <th>วันที่สั่งจอง</th>
                                            <th>สถานะ</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ($a = 1); ?>
                                        <?php $__currentLoopData = $private_tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($a++); ?></th>
                                            <td><?php echo e($item->member_name); ?></td>
                                            <td><?php echo e($item->place_name); ?></td>
                                            <td><?php echo e($item->number_of_travel); ?></td>
                                            <td>  <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')); ?></td>
                                            <td>

                                                <?php if($item->booking_status == '0'): ?>
                                                <span class="badge bg-warning  txt-dark">รอเสนอราคา</span>
                                                <?php elseif($item->booking_status == '1'): ?>
                                                <span class="badge bg-info">
                                                    ส่งใบเสนอราคาแล้ว
                                                </span>
                                                <?php elseif($item->booking_status == '2'): ?>
                                                <span class="badge bg-danger f-w-100">
                                                    ยกเลิกการสั่งจอง
                                                </span>
                                                <?php elseif($item->booking_status == '3'): ?>
                                                <span class="badge bg-danger">
                                                    ยกเลิกใบเสนอราคา
                                                </span>
                                                <?php elseif($item->booking_status == '4'): ?>
                                                <span class="f-w-300 badge bg-secondary">
                                                    แจ้งชำระเงินแล้ว <br> รอตรวจสอบ
                                                </span>
                                                <?php elseif($item->booking_status == '5'): ?>
                                                <span class="badge bg-success f-w-100">
                                                    ดำเนินการเรียบร้อย
                                                </span>
                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('/admin/booking_cf_private/'.$item->booking_id)); ?>"> <i class="fa fa-edit"></i> รายละเอียด</a>
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

          

           
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/admin/booking_chk.blade.php ENDPATH**/ ?>