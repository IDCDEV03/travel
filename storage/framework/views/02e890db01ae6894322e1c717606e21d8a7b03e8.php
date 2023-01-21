<?php $__env->startSection('title', 'ข้อมูลการจองรถ'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลจองรถ</h3>
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
                        <a href="<?php echo e(route('add_car')); ?>" class="btn btn-secondary" type="button">
                            <i class="fa fa-plus-square"></i> เพิ่มคิวรถใหม่</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="cell-border hover" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>ชื่อรถ</th>
                                        <th>ทะเบียนรถ</th>
                                        <th>จำนวนรอบ</th>
                                        <th>วันที่สร้าง</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php ($i = 1); ?>
                                    <?php $__currentLoopData = $list_car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($row->car_name); ?></td>
                                            <td><?php echo e($row->car_number); ?></td>
                                            <td><?php echo e($row->car_book); ?></td>
                                            <td><?php echo e(Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s')); ?></td>
                                            <td>
                                            
                                                    <a href="<?php echo e(url('/admin/edit_car/'.$row->id)); ?>" class="btn btn-primary" >
                                                        <i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>
                                                
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/admin/list_car.blade.php ENDPATH**/ ?>