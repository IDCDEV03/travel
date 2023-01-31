<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500&display=swap" rel="stylesheet">

<style>
body {
  background-color: #eee;
}

div {
  font-family: 'Sarabun', sans-serif;
}
.fs-12 {
  font-size: 12px;
}
.fs-14 {
  font-size: 14px;
}

.fs-15 {
  font-size: 16px;
}
.fs-18 {
  font-size: 18px;
}

.fs-20 {
  font-size: 20px;
}

.name {
  margin-bottom: -2px;
}

.product-details {
  margin-top: 13px;
}
    </style>
    <style type="text/css">
        @media  print {
            #non-printable {
                display: none;
            }

            #printable {
                display: block;
            }
        }
    </style>
    <title>Invoice</title>
</head>

<body>

    <div id="non-printable">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-secondary">ย้อนกลับ</a>
                <button class="btn btn-primary" onclick="window.print()">พิมพ์</button>
            </div>
        </div>
    </div>

    <div id="printable">
        <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!---- start ----->

          <!-- Container-fluid starts-->
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="invoice">
                      <div>

                        <table class="table table-borderless">
                        
                          <tbody>
                            <tr>                          
                              <td>
                                <img class="media-object img-60"
                            src="<?php echo e(asset('assets/images/logo/logo-big.png')); ?>"
                            alt="" width="200px"><br>
                             <span class="fs-18"><strong>เอส แอนด์ พี อินเตอร์ทัวร์</strong> </span>
                              </td>
                              <td>
                                <h3>ใบจองแพ็คเกจ </h3>

                                </p>
                              </td>                        
                            </tr>
                            <tr>                        
                              <td>
                                <span>
                                 โทร. 093-545-9009</span>
                              <br>
                             <p> ที่อยู่ : 8/4 ม.1 ถ.หน้าสนามบินนานาชาติอุดรธานี <br>อ.เมือง จ.อุดรธานี 41000
                          </p>  
                              </td>  
                              <td>
                                <p>เลขที่: <span>
                                  <?php echo e($item->quotation_id); ?>

                              </span>
                              <br>
                                วันที่: <span>
                                  <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?>

      
                              </span><br> ใช้ได้ถึง:
                              <span>
                                  <?php
      $end = Carbon::parse($item->created_at)->addDays(15)->format('d/m/Y');
      echo $end;
      ?>
      
                              </span>
                                </td>                         
                            </tr>
                            
                          </tbody>
                        </table>
                        
                        <hr >
                        <!-- End InvoiceTop-->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="media">                             
                              <div class="media-body m-l-20">
                                <p>ลูกค้า</p>
                                <h4 class="media-heading"><?php echo e(auth()->user()->member_name); ?></h4>
                                <p>
                                    <?php echo e($item->member_email); ?> 
                                    <br><span><?php echo e($item->user_phone); ?></span></p>
                              </div>
                            </div>
                          </div>                      
                        </div>
                        <!-- End Invoice Mid-->
                        <div>
                          <div class="table-responsive invoice-table" id="table">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td><h6>รหัส</h6></td>
                                        <td class="item">
                                            <h6 class="p-2 mb-0">คำอธิบาย</h6>
                                        </td>
                                        <td class="Rate">
                                            <h6 class="p-2 mb-0">ราคา (บาท)</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="m-0"><?php echo e($item->code_tour); ?></p>
                                        </td>
                                        <td>
                                            <label><?php echo e($item->package_name); ?>

                                                <br>
                                                จำนวนที่นั่ง : <?php echo e($item->number_of_travel); ?>

                                                <br>
                                                วันที่เดินทางไป-กลับ :
                                                <?php echo e(Carbon\Carbon::parse($item->date_start)->format('d/m/Y')); ?>

                                                -
                                                <?php echo e(Carbon\Carbon::parse($item->date_end)->format('d/m/Y')); ?>

                                            </label>
                                        </td>
                        
                                        <td>
                                            <p class="itemtext">
                                                <?php
                                                    $total_price = number_format($item->total_price);
                                                    echo $total_price;
                                                ?></p>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td class="txt-secondary">
                                            <p class="m-0">งวดที่ 1</p>
                                        </td>
                                        <td class="txt-secondary">
                                            <label>มัดจำ50%</label>
                                        </td>
                        
                                        <td class="txt-secondary"> 
                                            <p class="itemtext">
                                                <?php
                                                    $deposit_price = number_format($item->price_deposit);
                                                    echo $deposit_price;
                                                ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="m-0">งวดที่ 2</p>
                                        </td>
                                        <td>
                                            <label>ชำระส่วนที่เหลือ (ก่อนวันเดินทาง 3 วัน)</label>
                                        </td>
                                        <td>
                                            <p class="itemtext">
                                                <?php
                                                    $result = $item->total_price - $item->price_deposit;
                                                    echo number_format($result);
                                                ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                        
                                        <td align="right">
                                            <h6 class="mb-0 p-2">จำนวนชำระค่ามัดจำงวดที่ 1 รวมทั้งสิ้น </h6>
                                        </td>
                                        <td class="payment">
                                            <h6 class="mb-0 p-2">
                                                <?php
                                                $deposit_price = number_format($item->price_deposit);
                                                    echo
                                                $deposit_price;
                                                ?>
                                                บาท</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                          <!-- End Table-->
                          <div class="row">
                            <div class="col-md-8">
                              <div>
                                <p class="legal"><strong>การชำระเงิน</strong>
                                  <ul>
                                      <li>โอนชำระผ่านบัญชี</li>
                                      <li>ธนาคารออมสิน
                                          <p>
                                          เลขที่บัญชี : 0202-8621-4901 <br>
                                          ชื่อบัญชี : นางสาวสวลี ศรีกุลวงษ์
                                      <br>
                                      สาขา : สาขาเทสโก้โลตัส นาดี อุดรธานี
                                  </p>
                                      </li>
                                  </ul>
                                  </p>
                              
                              </div>
                            </div>
                            <div class="col-md-4">
                              <?php if($item->quotation_status == '2'): ?>
                              <span class="txt-success">
                               <strong>หมายเหตุ : ดำเนินการชำระมัดจำงวดที่ 1 แล้ว 
                               </strong>
                               </span>
                               <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <!-- End InvoiceBot-->
                      </div>

                      <!-- End Invoice-->
                      <!-- End Invoice Holder-->
                      <!-- Container-fluid Ends-->



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\travel\resources\views/admin/invoice.blade.php ENDPATH**/ ?>