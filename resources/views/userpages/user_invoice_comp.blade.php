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
        @media print {
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
                <a href="{{ url()->previous() }}" class="btn btn-secondary">ย้อนกลับ</a>
                <button class="btn btn-primary" onclick="window.print()">พิมพ์</button>
            </div>
        </div>
    </div>

    <div id="printable">
        @foreach($invoice as $item)
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
                              <td style="width: 20%" class="text-center">
                                <img class="media-object img-60"
                            src="{{ asset('assets/images/sp-logo-200.png') }}"
                            alt="" width="180px"><br>
                              </span>
                              </td>
                              <td style="width: 60%">
                                <span class="fs-16"><strong>ห้างหุ้นส่วนจำกัด เอส แอนด์ พี อินเตอร์เนชั่นแนลเซอร์วิส</strong><br>
                                  <span>
                                    โทร. 093-545-9009</span>
                                 <br>
                                <p class="fs-14"> ที่อยู่ : 8/4 ม.1 ถ.หน้าสนามบินนานาชาติอุดรธานี อ.เมือง จ.อุดรธานี 41000
                                 <br>
                                 เลขประจำตัวผู้เสียภาษี : 0413550000339
                             </p>  
                              </td>                        
                            </tr>
                          </tbody>
                        </table>
                        
                        <hr >
                        <!-- End InvoiceTop-->
                        <p class="fs-20">ใบจองแพ็คเกจ</p>
                        <table class="table table-bordered border-dark">
                          <tbody>
                            <tr>
                              <td style="width: 50%" colspan="2">ชื่อ : {{ auth()->user()->member_name }}</td>                            
                    
                              <td style="width: 20%" colspan="2">เลขที่ : {{ $item->quotation_id }}</td>
                                                  
                            </tr>
                            <tr>
                              <td style="width: 50%" colspan="2">ที่อยู่ : {{$item->member_address}}</td>
                              <td style="width: 20%" colspan="2">วันที่ :
                                @foreach ($invoice2 as $row)
                                {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                                @endforeach
                            </tr>
                            <tr>
                              <td style="width: 50%" colspan="2">อีเมล : {{$item->member_email}}</td>                          
                              <td style="width: 50%" colspan="2">ใช้ได้ถึง:  {{ Carbon\Carbon::parse($item->date_start)->format('d/m/Y') }}</td>
                              
                            </tr>
                            <tr>
                              <td style="width: 50%" colspan="2">โทร : {{$item->user_phone}}</td> 
                     <td></td>
                            </tr>
                          </tbody>
                        </table>
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
                                            <p class="m-0">{{ $item->code_tour }}</p>
                                        </td>
                                        <td>
                                            <label>{{ $item->package_name }}
                                                <br>
                                                จำนวนที่นั่ง : {{ $item->number_of_travel }}
                                                <br>
                                                วันที่เดินทางไป-กลับ :
                                                {{ Carbon\Carbon::parse($item->date_start)->format('d/m/Y') }}
                                                -
                                                {{ Carbon\Carbon::parse($item->date_end)->format('d/m/Y') }}
                                            </label>
                                        </td>
                        
                                        <td>
                                            <p class="itemtext">
                                                @php
                                                    $total_price = number_format($item->total_price);
                                                    echo $total_price;
                                                @endphp</p>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td class="txt-secondary">
                                            <p class="m-0">งวดที่ 1</p>
                                        </td>
                                        <td class="txt-secondary">
                                            <label>มัดจำ 50% 
                                                ( ชำระเงินแล้ว )
                                            </label>
                                        </td>
                        
                                        <td class="txt-secondary"> 
                                            <p class="itemtext">
                                                @php
                                                    $deposit_price = number_format($item->price_deposit);
                                                    echo $deposit_price;
                                                @endphp</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="m-0">งวดที่ 2</p>
                                        </td>
                                        <td>
                                            <label>ชำระส่วนที่เหลือ ( ชำระเงินแล้ว
                                          )</label>
                                        </td>
                                        <td>
                                            <p class="itemtext">
                                                @php
                                                    $result = $item->total_price - $item->price_deposit;
                                                    echo number_format($result);
                                                @endphp
                                           </p>
                                        </td>
                                    </tr>
                                  
                                    <tr>                                                           
                                        <td colspan="2" align="right">
                                            <h6 class="mb-0 p-2">ยอดชำระรวมทั้งสิ้น</h6>
                                        </td>
                                        <td class="payment">
                                            <h6 class="mb-0 p-2">
                                            {{number_format($item->total_price)}}
                                           บาท</h6>
                                        </td>                       
                                    </tr>
                                    <tr>
                                      <td >ตัวอักษร</td>
                                      <td align="right"> 
                                        ( @php
                                        echo num2wordsThai($item->total_price).'บาทถ้วน'
                                        ;
                                        @endphp  )</td>
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
                                      @foreach ($bank_data as $row)
                                      <li>{{$row->bank_name}}
                                          /
                                          เลขที่บัญชี : {{$row->account_nummber}} /                                 ชื่อบัญชี : {{$row->bank_account_name}} /
                                  
                                      {{$row->bank_branch}}
                                       
                                      </li>
          @endforeach  
                                  </ul>
                                  </p>
                              
                              </div>
                            </div>
                            <div class="col-md-4">
                       
                              <span class="txt-success">
                                <strong>หมายเหตุ : ชำระเงินเรียบร้อยแล้ว </strong>
                               </span>
                           
                            </div>
                          </div>
                        </div>
                        <!-- End InvoiceBot-->
                      </div>

                      <!-- End Invoice-->
                      <!-- End Invoice Holder-->
                      <!-- Container-fluid Ends-->



@endforeach
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
