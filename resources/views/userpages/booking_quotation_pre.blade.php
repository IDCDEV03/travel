@extends('userLayouts.simple.master')
@section('title', 'Invoice')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/Prompt/Prompt-Bold.ttf')}}">
@endsection

@section('style')
<style>
    @media print
{
#non-printable { display: none; }
#printable { display: block; }
}
</style>
@endsection

@section('breadcrumb-title')
    <h3>ใบจองแพ็คเกจ</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="card">
                    <div class="card-body">
                        @foreach ($user_quotation as $item)
                            <div class="invoice">
<div id="printable">
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left"><img class="media-object img-60"
                            src="{{ asset('assets/images/sp-logo-200.png') }}"
                            alt=""></div>
                    <div class="media-body m-l-20 text-right">
                        <h4 class="media-heading">ห้างหุ้นส่วนจำกัด เอส แอนด์ พี อินเตอร์เนชั่นแนลเซอร์วิส</h4>
                        <p>sp.tour.ud@gmail.com<br>
                            <span><i class="fa fa-phone-square"></i>
                                093-545-9009</span>
                            <br>
                            <i class="fa fa-briefcase"></i> ที่อยู่ : 8/4 ม.1 ถ.หน้าสนามบินนานาชาติอุดรธานี อ.เมือง จ.อุดรธานี 41000
                            <br>
                            เลขประจำตัวผู้เสียภาษี : 0413550000339       
                        </p>                      
                    </div>
                </div>
                <!-- End Info-->
            </div>
            <div class="col-sm-6">
                <div class="text-md-end text-xs-center">
                    <h3>ใบจองแพ็คเกจ </h3>
                    <p>เลขที่: <span>
                            {{ $item->quotation_id }}
                        </span>
                        <br>
                        วันที่: <span>
                            @foreach ($user_quotation2 as $row)
                            {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}
                            @endforeach
                        </span><br> ใช้ได้ถึง:
                        <span>                          
                        {{Carbon::parse($item->date_start)->format('d/m/Y')}}
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
            <h4 class="media-heading">{{ auth()->user()->member_name }}</h4>
            <p>
                {{$item->member_email}} 
                <br><span>{{$item->user_phone}}</span></p>
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
                    <label>มัดจำ 50% ( กรุณาชำระภายในวันที่
                        @foreach ($user_quotation2 as $row)
                        @php
                      $end_date = Carbon::parse($row->created_at)->addDays(5)->format('d/m/Y');
                      echo $end_date;
                        @endphp
                        )
                    @endforeach</label>
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
                    <label>ชำระส่วนที่เหลือ ( ก่อนวันเดินทาง 15 วัน )</label>
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
                    <h6 class="mb-0 p-2">จำนวนชำระค่ามัดจำงวดที่ 1 รวมทั้งสิ้น </h6>
                </td>
                <td class="payment">
                    <h6 class="mb-0 p-2">
                        @php
                        $deposit_price = number_format($item->price_deposit);
                            echo
                        $deposit_price;
                        @endphp
                        บาท</h6>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@php
$date_today = Carbon::now()->format('d/m/Y');
@endphp
                                      <!-- End Table-->
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p class="legal"><strong>การชำระเงิน</strong>
                        <ul>
                            
                            @if ($date_today <= $end_date)
                            <li>โอนชำระผ่านบัญชี</li>
                              
                            @elseif ($date_today >= $end_date)
                            <li class="txt-danger">เกินกำหนดชำระ</li>
                            @endif
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    @foreach ($bank_data as $row)
                    <li>{{$row->bank_name}}
                        /
                        เลขที่บัญชี : {{$row->account_nummber}} /                                 ชื่อบัญชี : {{$row->bank_account_name}} /                        
                    {{$row->bank_branch}}                             
                    </li>
                    @endforeach   
                </div>
            </div>
                                    </div>
                                    <!-- End InvoiceBot-->
                                </div>
                                <div id="non-printable">
                                    <div class="col-sm-12 text-center mt-3">
                                    @if($item->quotation_status == '0')
                                    
                                        @if ($date_today <= $end_date)
                                        <a href="{{url('/user/payment/'.$item->quotation_id.'/normal')}}" class="btn btn-secondary">แจ้งชำระเงิน</a>
                                        @elseif ($date_today >= $end_date)
                                        <a href="#" class="btn btn-light disabled" >เกินกำหนดชำระ</a>
                                        @endif                                 
                                    @endif
                                    @if ($date_today <= $end_date)
                                    <a href="{{url('/user/invoice/'.$item->booking_id.'/none')}}" class="btn btn btn-primary me-2" type="button"
                                    >พิมพ์</a>
                                    @endif
                                </div>
                                </div>
                                <!-- End Invoice-->
                                <!-- End Invoice Holder-->
                                <!-- Container-fluid Ends-->
                            </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/print.js') }}"></script>
@endsection
