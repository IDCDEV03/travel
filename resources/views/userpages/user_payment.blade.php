@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แจ้งการชำระเงิน </h3>
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                @if (request()->type == 'private')
                    @foreach ($payment_private as $item)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($bank_data as $row)
                                    <div class="col-md-2"><span>{{$row->bank_name}}</span></div>
                                    <div class="col-md-4"><span>ชื่อบัญชี : {{$row->bank_account_name}}</span></div>
                                    <div class="col-md-6"><span>{{$row->account_nummber}} {{$row->bank_branch}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 "><span>ใบจองที่ #{{ $item->quotation_id }}</span></div>
                                    <div class="col-md-6 "><span>จำนวนเงินมัดจำที่ต้องชำระ:
                                            @php
                                                $deposit_price = number_format($item->price_deposit);
                                                echo $deposit_price;
                                            @endphp
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
                                <form class="needs-validation" novalidate="" action="{{ route('user_payment') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                    <input type="hidden" value="{{ $item->quotation_id }}" name="quotation_id">
                                    <input type="hidden" value="{{ $item->booking_id }}" name="booking_id">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">จำนวนเงินที่โอน</label>
                                            <input class="form-control" type="text" name="payment_price">
                                            @error('payment_price')
                                                <span class="text-danger my-2">
                                                    << {{ $message }}>>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <h6>ธนาคารที่โอนชำระ</h6>
                                    </div>
                                    <div class="col">
                                        <select class="form-select digits">
                                            <option selected disabled value="">เลือก..</option>
                                            @foreach ($bank_data as $row)
                        
                                            <option value="{{$row->bank_name}}">{{$row->bank_name}}</option>
                                            @endforeach
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
                                                @error('payment_slip')
                                                    <span class="text-danger my-2">
                                                        << {{ $message }}>>
                                                    </span>
                                                @enderror
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
                        @endforeach
   
@elseif (request()->type == 'normal')
@foreach ($payment as $item)
<div class="card">
    <div class="card-body">
        <div class="row">

            @foreach ($bank_data as $row)
                                    <div class="col-md-2"><span>{{$row->bank_name}}</span></div>
                                    <div class="col-md-4"><span>ชื่อบัญชี : {{$row->bank_account_name}}</span></div>
                                    <div class="col-md-6"><span>{{$row->account_nummber}} {{$row->bank_branch}}</span>
                                    </div>
                                    @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 "><span>ใบเสนอราคาที่ #{{ $item->quotation_id }}</span></div>
            <div class="col-md-6 "><span>จำนวนเงินมัดจำที่ต้องชำระ:
                    @php
                        $deposit_price = number_format($item->price_deposit);
                        echo $deposit_price;
                    @endphp
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
        <form class="needs-validation" novalidate="" action="{{ route('user_payment') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <input type="hidden" value="{{ $item->quotation_id }}" name="quotation_id">
            <input type="hidden" value="{{ $item->booking_id }}" name="booking_id">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">จำนวนเงินที่โอน</label>
                    <input class="form-control" type="text" name="payment_price">
                    @error('payment_price')
                        <span class="text-danger my-2">
                            << {{ $message }}>>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="col-sm-12">
                <h6>ธนาคารที่โอนชำระ</h6>
            </div>
            <div class="col">               
                <select class="form-select digits">
                    <option selected disabled value="">เลือก..</option>
                    @foreach ($bank_data as $row)

                    <option value="{{$row->bank_name}}">{{$row->bank_name}}</option>
                    @endforeach
                  </select>
                    @error('payment_bank')
                        <span class="text-danger my-2">
                            << {{ $message }}>>
                        </span>
                    @enderror
                
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
                        @error('payment_slip')
                            <span class="text-danger my-2">
                                << {{ $message }}>>
                            </span>
                        @enderror
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
@endforeach
@endif
                        <!------------------------------------>
            </div>
        </div>

    </div>
 
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
