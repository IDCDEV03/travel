@extends('layouts.simple.master')
@section('title', 'ข้อมูลคำสั่งซื้อ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลคำสั่งซื้อ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <b>{{ session('success') }}</b>
                </div>
            @endif

                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">              
                       
                                               
                        <div class="table-responsive">
                            <table class="display table-bordered" id="basic-1">
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
                                        @php($i = 1)
                                        @foreach ($package_tour as $row)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $row->member_name }}</td>
                                                <td>{{ $row->code_tour }}</td>
                                                <td>{{ $row->package_name }}</td>
                                                <td>{{ $row->number_of_travel }}</td>
                                                <td>                                 
                                                    {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s') }}
                                                </td>
                                                <td>
                                @if ($row->booking_status == '0')
                                <span class="txt-secondary">รอเสนอราคา</span>
                                @elseif ($row->booking_status == '1')
                                <span class="txt-info">
                                    ส่งใบจองแล้ว
                                </span>
                                @elseif ($row->booking_status == '2')
                                <span class="txt-danger f-w-100">
                                    ยกเลิกการสั่งจอง
                                </span>
                                @elseif ($row->booking_status == '3')
                                <span class="txt-danger">
                                    ยกเลิกใบจอง
                                </span>
                                @elseif ($row->booking_status == '4')
                                <span class="f-w-300 txt-secondary">
                                    แจ้งชำระเงินแล้ว รอตรวจสอบ
                                </span>
                                @elseif ($row->booking_status == '5')
                                <span class="txt-success f-w-100">
                                    ชำระมัดจำงวดที่ 1 แล้ว
                                </span>
                                @elseif ($row->booking_status == '6')
                                <span class="txt-success f-w-100">
                                    ชำระเงินครบแล้ว
                                </span>
                                @endif
                                                 
                                                </td>
                                                <td> <a href="{{url('/admin/booking_cf/'.$row->booking_id)}}"> <i class="fa fa-edit"></i> รายละเอียด</a></td>
                                            </tr>
                                         @endforeach       
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
@endsection

@section('script') 
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
