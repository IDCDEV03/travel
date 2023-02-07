

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แจ้งการชำระเงิน </h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <?php if(request()->type == 'private'): ?>
                    <?php $__currentLoopData = $payment_private; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <?php $__currentLoopData = $bank_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2"><span><?php echo e($row->bank_name); ?></span></div>
                                    <div class="col-md-4"><span>ชื่อบัญชี : <?php echo e($row->bank_account_name); ?></span></div>
                                    <div class="col-md-6"><span><?php echo e($row->account_nummber); ?> <?php echo e($row->bank_branch); ?></span>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 "><span>ใบจองที่ #<?php echo e($item->quotation_id); ?></span></div>
                                    <div class="col-md-6 "><span>จำนวนเงินมัดจำที่ต้องชำระ:
                                            <?php
                                                $deposit_price = number_format($item->price_deposit);
                                                echo $deposit_price;
                                            ?>
                                            บาท
                                        </span></div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <h5>แจ้งหลักฐานการชำระเงิน</h5>
                                <span>กรอกข้อมูลการโอนเงินของท่าน พร้อมแนบรูปหลักฐาน</span>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="<?php echo e(route('user_payment')); ?>"
                                    method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="user_id">
                                    <input type="hidden" value="<?php echo e($item->quotation_id); ?>" name="quotation_id">
                                    <input type="hidden" value="<?php echo e($item->booking_id); ?>" name="booking_id">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">จำนวนเงินที่โอน</label>
                                            <input class="form-control" type="text" name="payment_price">
                                            <?php $__errorArgs = ['payment_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger my-2">
                                                    << <?php echo e($message); ?>>>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <h6>ธนาคารที่โอนชำระ</h6>
                                    </div>
                                    <div class="col">
                                        <select class="form-select digits">
                                            <option selected disabled value="">เลือก..</option>
                                            <?php $__currentLoopData = $bank_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                            <option value="<?php echo e($row->bank_name); ?>"><?php echo e($row->bank_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">สลิปการโอนเงิน</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="payment_slip"
                                                        accept="image/*">
                                                </div>
                                                <?php $__errorArgs = ['payment_slip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger my-2">
                                                        << <?php echo e($message); ?>>>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
<?php elseif(request()->type == 'normal'): ?>
<?php
$pay_type = request()->complete;
?>
<?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card">
    <div class="card-body">
        <div class="row">

            <?php $__currentLoopData = $bank_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2"><span><?php echo e($row->bank_name); ?></span></div>
                                    <div class="col-md-4"><span>ชื่อบัญชี : <?php echo e($row->bank_account_name); ?></span></div>
                                    <div class="col-md-6"><span><?php echo e($row->account_nummber); ?> <?php echo e($row->bank_branch); ?></span>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 "><span>ใบจองแพ็คเกจที่ #<?php echo e($item->quotation_id); ?></span></div>
            <div class="col-md-6 "><span>จำนวนเงินมัดจำที่ต้องชำระ:
                <?php if($pay_type == 'pay1'): ?>
                    <?php
                        $deposit_price = number_format($item->price_deposit);
                        echo $deposit_price;
                    ?>
                    บาท
                <?php elseif($pay_type == 'pay2'): ?>
                <?php
                $result = $item->total_price - $item->price_deposit;
                     echo number_format($result);
                 ?>
                 บาท
                <?php endif; ?>
                </span></div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h5>แจ้งหลักฐานการชำระเงิน</h5>
        <span>กรอกข้อมูลการโอนเงินของท่าน พร้อมแนบรูปหลักฐาน</span>
    </div>
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?php echo e(route('user_payment')); ?>"
            method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="user_id">
            <input type="hidden" value="<?php echo e($item->quotation_id); ?>" name="quotation_id">
            <input type="hidden" value="<?php echo e($item->booking_id); ?>" name="booking_id">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">จำนวนเงินที่โอน</label>
                    <input class="form-control" type="text" name="payment_price">
                    <?php $__errorArgs = ['payment_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger my-2">
                            << <?php echo e($message); ?>>>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <br>
            <div class="col-sm-12">
                <h6>ธนาคารที่โอนชำระ</h6>
            </div>
            <div class="col">               
                <select class="form-select digits">
                    <option selected disabled value="">เลือก..</option>
                    <?php $__currentLoopData = $bank_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($row->bank_name); ?>"><?php echo e($row->bank_name); ?> /
                        <?php echo e($row->account_nummber); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                    <?php $__errorArgs = ['payment_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger my-2">
                            << <?php echo e($message); ?>>>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
            </div>   
            <br> 
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">ที่อยู่ (เพื่อออกใบจอง)</label>
                    <input class="form-control" type="text" name="address_payment">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">สลิปการโอนเงิน</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" name="payment_slip"
                                accept="image/*">
                        </div>
                        <?php $__errorArgs = ['payment_slip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger my-2">
                                << <?php echo e($message); ?>>>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            

            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                <input class="btn btn-light" type="reset" value="ยกเลิก">
            </div>
        </form>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                        <!------------------------------------>
            </div>
        </div>

    </div>
 
    <script type="text/javascript">
        var session_layout = '<?php echo e(session()->get('layout')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\travel\resources\views/userpages/user_payment.blade.php ENDPATH**/ ?>