@extends('layouts.simple.master')
@section('title', 'ตรวจสอบการแจ้งชำระเงิน')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ตรวจสอบการแจ้งชำระเงิน</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                @foreach ($user_payment as $row)
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">                
                            <div class="card-body">
                                <div class="row">
                    <div class="col-md-4"><span class="h5">ใบเสนอราคาที่
                        </span>
                        <a class="btn btn-warning txt-dark" type="button" data-bs-toggle="modal"
                            data-bs-target=".bd-example-modal-lg">#{{ $row->quotation_id }}</a>
                    </div>
                        <div class="col-md-8">
                <span class="h5">ยอดชำระมัดจำงวดที่ 1 :
                    {{ number_format($row->price_deposit) }} บาท</span></div>
                    </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="h5">สลิปการโอนเงิน</span><br>
                                        <img src="{{ asset($row->payment_slip) }}" class="img-fluid" width="350px">
                                    </div>
<div class="col-md-8">
    <ul class="h5 f-w-100">
        <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>โอนชำระผ่าน :
            {{ $row->payment_bank }}</li>
        <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>จำนวนเงิน :
            {{ number_format($row->payment_price) }} บาท</li>
        <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>แจ้งโอนเมื่อ :
            {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i') }}</li>
    </ul>
<hr>
<span class="txt-secondary">
คงเหลือยอดชำระ   :  
@php
$result = $row->total_price - $row->price_deposit;
echo number_format($result);
@endphp
 บาท </span>
 <hr>
 <a href="{{url('/admin/update_payment/'.$row->quotation_id.'/'.request()->id)}}" class="btn btn-lg btn-primary" type="button" onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')" >ยืนยันการชำระเงิน</a>
 <button class="btn btn-lg btn-danger" type="button" >ยอดชำระไม่ถูกต้อง</button>
<hr>
            </div>
            
        </div>

    </div>
</div>
</div>
 @endforeach
<!----------------------Modal--------------------->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myLargeModalLabel">ใบเสนอราคา</h4>
<button class="btn-close" type="button" data-bs-dismiss="modal"
aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="card">
<div class="card-body">
@foreach ($user_payment as $item)
<div class="invoice">
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left"><img class="media-object img-60"
                            src="{{ asset('assets/images/other-images/logo.png') }}"
                            alt=""></div>
                    <div class="media-body m-l-20 text-right">
                        <h4 class="media-heading">ธันวรัตม์ ทราเวล</h4>
                        <p>hello@Cuba.in<br>
                            <span><i class="fa fa-phone-square"></i>
                                081-2616178</span>
                            <br>
                            <i class="fa fa-briefcase"></i> ที่อยู่ :
                        </p>
                    </div>
                </div>
                <!-- End Info-->
            </div>
            <div class="col-sm-6">
                <div class="text-md-end text-xs-center">
                    <h3>ใบเสนอราคา </h3>
                    <p>เลขที่: <span>
                            {{ $item->quotation_id }}
                        </span>
                        <br>
                        วันที่: <span>
                            {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}

                        </span><br> ใช้ได้ถึง:
                        <span>
                            @php
                                $end = Carbon::parse($item->created_at)
                                    ->addDays(7)
                                    ->format('d/m/Y');
                                echo $end;
                            @endphp

                        </span>
                    </p>
                </div>
                <!-- End Title-->
            </div>
        </div>
    </div>
    <hr>
    <!-- End InvoiceTop-->
    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="media-body m-l-20">
                    <p>ลูกค้า</p>
                    <h4 class="media-heading">
                        {{ auth()->user()->member_name }}</h4>
                    <p>JohanDeo@gmail.com<br><span>555-555-5555</span></p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- End Invoice Mid-->
    <div>
        <div class="table-responsive invoice-table" id="table">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h6>รหัส</h6>
                        </td>
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
                                จำนวนที่นั่ง :
                                {{ $item->number_of_travel }}
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
                    <tr>
                        <td class="txt-secondary">
                            <p class="m-0">งวดที่ 1</p>
                        </td>
                        <td class="txt-secondary">
                            <label>มัดจำ50%</label>
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
                            <label>ชำระส่วนที่เหลือ</label>
                        </td>
                        <td>
    <p class="itemtext">
        @php
                                    $result = $item->total_price - $item->price_deposit;
                                    echo number_format($result);
@endphp</p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>

                        <td align="right">
                            <h6 class="mb-0 p-2">จำนวนชำระค่ามัดจำงวดที่ 1
                                รวมทั้งสิ้น </h6>
                        </td>
                        <td class="payment">
                            <h6 class="mb-0 p-2">
                                @php
                                    $deposit_price = number_format($item->price_deposit);
                                    echo $deposit_price;
                                @endphp
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
                        <li>ธนาคารกรุงไทย</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="col-md-4">


            </div>
        </div>
    </div>
    <!-- End InvoiceBot-->

</div>
</div>

                                    <!-- End Invoice-->
                                    <!-- End Invoice Holder-->
                                    <!-- Container-fluid Ends-->
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
@endsection
