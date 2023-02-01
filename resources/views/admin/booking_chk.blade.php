@extends('layouts.simple.master')
@section('title', 'ข้อมูลคำสั่งซื้อ')

@section('css')
 
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
                      <div class="tabbed-card">
                        <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
                          <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1" data-bs-toggle="pill" href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">โปรแกรมปกติ</a></li>
                          <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill" href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1" aria-selected="false">โปรแกรมส่วนตัว</a></li>
                   
                        </ul>
                        <div class="tab-content" id="pills-clrtabContent1">
                          <div class="tab-pane fade show active" id="pills-clrhome1"    role="tabpanel" aria-labelledby="pills-clrhome-tab1">
                         
                            <div class="table-responsive">
                                <table class="table align-middle table-bordered display" >
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
                                <span class="badge bg-warning  txt-dark">รอเสนอราคา</span>
                                @elseif ($row->booking_status == '1')
                                <span class="badge bg-info">
                                    ส่งใบเสนอราคาแล้ว
                                </span>
                                @elseif ($row->booking_status == '2')
                                <span class="badge bg-danger f-w-100">
                                    ยกเลิกการสั่งจอง
                                </span>
                                @elseif ($row->booking_status == '3')
                                <span class="badge bg-danger">
                                    ยกเลิกใบเสนอราคา
                                </span>
                                @elseif ($row->booking_status == '4')
                                <span class="f-w-300 badge bg-secondary">
                                    แจ้งชำระเงินแล้ว <br> รอตรวจสอบ
                                </span>
                                @elseif ($row->booking_status == '5')
                                <span class="badge bg-success f-w-100">
                                    ดำเนินการเรียบร้อย
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
                          <div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel" aria-labelledby="pills-clrprofile-tab1">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th>#</th>
                                            <th>ชื่อผู้สั่งจอง</th>
                                            <th>ชื่อแพ็คเกจ</th>
                                            <th>จำนวนที่นั่ง</th>
                                            <th>วันที่สั่งจอง</th>
                                            <th>สถานะ</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($a = 1)
                                        @foreach ($private_tour as $item)
                                        <tr>
                                            <th scope="row">{{ $a++ }}</th>
                                            <td>{{$item->member_name}}</td>
                                            <td>{{$item->place_name}}</td>
                                            <td>{{$item->number_of_travel}}</td>
                                            <td>  {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s') }}</td>
                                            <td>

                                                @if ($item->booking_status == '0')
                                                <span class="badge bg-warning  txt-dark">รอเสนอราคา</span>
                                                @elseif ($item->booking_status == '1')
                                                <span class="badge bg-info">
                                                    ส่งใบเสนอราคาแล้ว
                                                </span>
                                                @elseif ($item->booking_status == '2')
                                                <span class="badge bg-danger f-w-100">
                                                    ยกเลิกการสั่งจอง
                                                </span>
                                                @elseif ($item->booking_status == '3')
                                                <span class="badge bg-danger">
                                                    ยกเลิกใบเสนอราคา
                                                </span>
                                                @elseif ($item->booking_status == '4')
                                                <span class="f-w-300 badge bg-secondary">
                                                    แจ้งชำระเงินแล้ว <br> รอตรวจสอบ
                                                </span>
                                                @elseif ($item->booking_status == '5')
                                                <span class="badge bg-success f-w-100">
                                                    ดำเนินการเรียบร้อย
                                                </span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{url('/admin/booking_cf_private/'.$item->booking_id)}}"> <i class="fa fa-edit"></i> รายละเอียด</a>
                                            </td>
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
    </div>
@endsection

@section('script') 
@endsection
