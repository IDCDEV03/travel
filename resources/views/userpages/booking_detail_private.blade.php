@extends('userLayouts.simple.master')
@section('title', 'ข้อมูลแพ็คเกจ')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลการจองแพ็คเกจ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($booking_detail as $item)      

                <div class="card">                    
                    <div class="card-body">
                                           

                        <div class="product-page-details">
                            
                                <h3>ชื่อแพ็คเกจ : {{ $item->place_name }}</h3>
                                 
                        </div>
                      

<hr>
<p class="h6 txt-primary">
สถานะ : 
@if($item->booking_status == 0)
<span class="badge bg-secondary f-w-100"> 
รอเจ้าหน้าที่ตรวจสอบรายละเอียด
</span>                       
@elseif($item->booking_status == 1)
<span class="badge bg-info">
ส่งใบเสนอราคาแล้ว
</span>       
<span class="txt-secondary">
    <a href="{{url('/user/quotation_private/'.$item->booking_id)}}" class="txt-secondary"> คลิกที่นี่ </a>เพื่อตรวจสอบใบเสนอราคา</span>   
    @elseif ($item->booking_status == '4')
    <span class="badge bg-secondary">
        แจ้งชำระเงินแล้ว รอตรวจสอบ
    </span> 
    @elseif ($item->booking_status == '5')
    <span class="badge bg-success f-w-100">
    ตรวจสอบการชำระเงินเรียบร้อย
    </span>    
    <a href="{{url('/user/quotation_private/'.$item->booking_id)}}" class="txt-secondary"> คลิกที่นี่ </a>เพื่อตรวจสอบใบจองแพ็คเกจ</span>
    @elseif ($item->booking_status == '2')
    <span class="badge bg-danger f-w-100">
        ยกเลิกการจอง
        </span>     
@endif 
</p>
<hr>
<p class="h6 txt-danger">รหัสการสั่งจอง : {{$item->booking_id}}</p>
                        <hr>
                        <div>
                            <table class="product-page-width">
                                <tbody>
                                   
                                    <tr>
                                        <td> <b>จำนวนลูกค้า &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td>{{ $item->number_of_travel }} คน </td>
                                    </tr>
                              
                                  
                                    <tr>
                                        <td> <b>วันที่เดินทางไป-กลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-success">
                                            {{ Carbon\Carbon::parse($item->date_start)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($item->date_end)->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>รวมระยะเวลา &nbsp;&nbsp;&nbsp;:
                                            </b></td>
                                        <td>
                                            @php
                                            $fdate = $item->date_start;
                                            $tdate = $item->date_end;
                                            $datetime1 = new DateTime($fdate);
                                            $datetime2 = new DateTime($tdate);
                                            $interval = $datetime1->diff($datetime2);
                                            $days = $interval->format('%a');
                                            print_r($days);
                                        @endphp
                                        วัน
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <hr>
<p class="text">
    รายละเอียดเพิ่มเติม : {{$item->member_detail}}
</p>
<p class="text">
    ช่องทางติดต่อกลับ : {{$item->member_contact}}
</p>
                        <hr>
                        @if ($item->booking_status == '0' OR $item->booking_status == '1')
                        <a href="{{ route('cancel_booking', ['id' => request()->id]) }}" class="btn btn-danger btn-sm" type="button" 
                        onclick="return confirm('ต้องการยกเลิกการจองใช่หรือไม่?')">ยกเลิกการสั่งจอง</a>
                        @endif
                    @endforeach



                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')

@endsection
