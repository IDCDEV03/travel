@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>หน้าหลักสมาชิก</h3>
@endsection


@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif

                <div class="list-group"><a class="list-group-item list-group-item-action flex-column align-items-start "
                        href="{{ url('userpages/book_package/' . Auth::id()) }}">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">สั่งจองแพ็คเกจทัวร์</h5>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p><small>Donec id elit non mi porta.</small>
                    </a><a href="{{ route('booking_status') }}" class="list-group-item list-group-item-action flex-column align-items-start"
                        href="javascript:void(0)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">ตรวจสอบสถานะการจอง</h5>
                      
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p><small class="text-muted">Donec id elit non mi porta.</small>
                    </a><a class="list-group-item list-group-item-action flex-column align-items-start"
                        href="javascript:void(0)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">แจ้งชำระค่าบริการ</h5>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p><small class="text-muted">Donec id elit non mi porta.</small>
                    </a></div>
            </div>
        </div>
    </div>
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
