<?php $__env->startSection('title', 'สั่งจองแพ็คเกจทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	
	<div class="card">
        <div class="card-header">
          <h5>สั่งจองแพ็คเกจทัวร์ส่วนตัว</h5>
        </div>

        <form class="form needs-validation" method="POST" action="<?php echo e(route('insert_booking')); ?>">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label class="form-label">ชื่อผู้สั่งจอง
                    <span class="text-danger">*</span>                    
                  </label>
                  <input class="form-control" type="text" placeholder="ระบุชื่อ-นามสกุล" name="member_name" value="<?php echo e(Auth::user()->member_name); ?>" required>
                  <input type="hidden" name="member_id" value="<?php echo e(Auth::user()->id); ?>">
                </div>
              </div>
            </div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">อีเมล
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control" type="email" 
                    placeholder="กรุณาระบุอีเมลสำหรับการติดต่อรับใบเสนอราคา"
                    name="member_email" value="<?php echo e($row->email); ?>" readonly>
                  </div>
                </div>
              </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">แพ็คเกจที่ต้องการจอง
                      <span class="text-danger">*</span> 
                    </label>
                    <select class="js-example-basic-single col-sm-12 " name="package_name">
                      <option value="" disabled selected>เลือกแพ็คเกจที่ท่านสนใจ</option>
                      <optgroup label="ในประเทศ">                        
                        <?php $__currentLoopData = $package_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->package_type == '1'): ?>
                        <option value="<?php echo e($item->package_id); ?>"><?php echo e($item->package_name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </optgroup>
                      <optgroup label="ต่างประเทศ">
                        <?php $__currentLoopData = $package_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->package_type == '2'): ?>
                        <option value="<?php echo e($item->package_id); ?>"><?php echo e($item->package_name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">จำนวนที่นั่ง
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control" type="number" name="number_of_travel" placeholder="ระบุเป็นตัวเลขเท่านั้น" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">วัน/เวลาที่ออกเดินทาง
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control digits"  name="date_start" type="datetime-local" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">วัน/เวลาที่เดินทางกลับ
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control digits"  name="date_end" type="datetime-local" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">รายละเอียด/ความต้องการอื่นๆเพิ่มเติม</label>
                    <textarea class="form-control" name="member_detail" row="4"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">ระบุช่องทางสำหรับให้เจ้าหน้าที่ติดต่อกลับ
                      <span class="text-danger">*</span> 
                    </label>
                    <textarea class="form-control" row="3" name="member_contact" placeholder="เช่น Line ID หรือ เบอร์โทรศัพท์" required></textarea>
                  </div>
                </div>
              </div>



          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
            <input class="btn btn-light" type="reset" value="ยกเลิก">
          </div>
        </form>
     
		
	
	</div>
</div>
<script type="text/javascript">
	var session_layout = '<?php echo e(session()->get('layout')); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/userpages/private_package.blade.php ENDPATH**/ ?>