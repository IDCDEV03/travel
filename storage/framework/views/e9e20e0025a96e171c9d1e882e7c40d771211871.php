
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ตั้งค่าข้อมูล</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             
                    <div class="card-body">                       
                        <a href="<?php echo e(route('admin_setting_update', ['id' => Auth::user()->id])); ?>" class="btn btn-pill btn-outline-primary-2x" type="button"> แก้ไขข้อมูลผู้ดูแลระบบ </a>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/admin/admin_setting.blade.php ENDPATH**/ ?>