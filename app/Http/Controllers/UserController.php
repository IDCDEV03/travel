<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\member_booking_package;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\package_tour;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\BookingConfirm;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
//Line_Alert
  public function LineAlert($msg)
  {
    //$sToken = "7TNq5qLJOm7BgMbJUtGAcNPzBvdzv8XTBbpk5JvX725";
    $sToken = "voGmGu1AvbR9VbDkC0dY2fTLJxQgOUEryUCfxsjGbx7";
    $sMessage = $msg; 
    
    $chOne = curl_init(); 
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $chOne, CURLOPT_POST, 1); 
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec( $chOne ); 
  }

  public function book_package($id,$pkid)
  {
    $users = DB::table('users')
      ->where('id', '=', $id)
      ->get();
    $package_all = DB::table('package_tours')
      ->where('package_id', '=', $pkid)
      ->get();
    return view('userpages.book_package', compact('package_all', 'users'));
  }

  public function private_package($id)
  {
    $users = DB::table('users')
      ->where('id', '=', $id)
      ->get();
    $package_all = DB::table('package_tours')
      ->where('package_status', '=', '1')
      ->get();
    return view('userpages.private_package', compact('package_all', 'users'));
  }

  public function insert_booking(Request $request)
  {

    $ิbooking_id = Str::random(12);

    //บันทึกข้อมูล
    member_booking_package::insert([
      'booking_id' => $ิbooking_id,
      'member_id' => $request->member_id,
      'member_name' => $request->member_name,
      'member_email' => $request->member_email,
      'member_address' => $request->member_address,
      'member_phone' => $request->member_phone,
      'package_id' => $request->package_id,
      'number_of_travel' => $request->number_of_travel,
      'date_start' => $request->date_start,
      'date_end' => $request->date_end,
      'member_detail' => $request->member_detail,
      'member_contact' => $request->member_contact,
      'booking_status' => '0',
      'created_at' => Carbon::now()
    ]);

   //Line_Alert
    $msg_alrert = "มีรายการสั่งจองแพ็คเกจทัวร์";    
    $this->LineAlert($msg_alrert);

    $this->booking_mail($request->member_id);
    return redirect()->route('userPages.home')->with('success', "บันทึกข้อมูลการสั่งจองเรียบร้อยแล้ว กรุณารอเจ้าหน้าที่ตรวจสอบ");
  }

  public function booking_mail ($id)
  {
    $user_email = User::find($id);  
    $email = $user_email->email; 
    Mail::to($email)->send(new BookingConfirm($user_email));
  }

  public function booking_status()
  {
    $user_id = Auth::user()->id;

    $list_booking = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_booking_packages.member_id', '=', $user_id)
      ->orderBy('member_booking_packages.created_at', 'desc')
      ->get();
    return view('userpages.booking_status', compact('list_booking'));
  }

  public function booking_detail($id)
  {
    $booking_detail = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();
    return view('userpages.booking_detail', compact('booking_detail'));
  }

  public function user_quotation($id)
  {
    $user_quotation = DB::table('member_booking_packages')
      ->join('booking_quotations', 'member_booking_packages.booking_id', '=', 'booking_quotations.booking_id')
      ->join(
        'package_tours',
        'member_booking_packages.package_id',
        '=',
        'package_tours.package_id'
      )
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

      $bank_data = DB::table('sp_banks')
      ->get();
    return view('userpages.booking_quotation', compact('user_quotation','bank_data'));
  }

  public function user_quotation_pre($id)
  {
    $user_quotation = DB::table('member_booking_packages')
      ->join('booking_quotations', 'member_booking_packages.booking_id', '=', 'booking_quotations.booking_id')
      ->join(
        'package_tours',
        'member_booking_packages.package_id',
        '=',
        'package_tours.package_id'
      )
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();
      
      $user_quotation2 = DB::table('member_booking_packages')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

      $bank_data = DB::table('sp_banks')
      ->get();
    
    return view('userpages.booking_quotation_pre', compact('user_quotation','user_quotation2','bank_data'));
  }

  public function user_payment($id,$type,$complete)
  {

    $bank_data = DB::table('sp_banks')
    ->get(); 

    $payment = DB::table('booking_quotations')
      ->where('booking_quotations.quotation_id', '=', $id)
      ->get();

    $payment_private = DB::table('booking_quotation_privates')
    ->where('booking_quotation_privates.quotation_id', '=', $id)
    ->get();
    return view('userpages.user_payment', compact('payment','payment_private','bank_data'));
  }

  public function add_payment(Request $request)
  {
    $request->validate(
      [
        'payment_slip.*' => 'mimes:jpg,jpeg,png|max:2048',
        'payment_slip' => 'required',
        'payment_price' => 'required',
        'payment_bank' => 'required'

      ],
      [
        'payment_slip.required' => "กรุณาเพิ่มรูปภาพสลิปการโอน",
        'payment_price.required' => "กรุณาระบุยอดโอนชำระ",
        'payment_bank.required' => "กรุณาเลือกธนาคารที่ท่านโอนชำระ"
      ]
    );

    $payment_slip = $request->file('payment_slip');
    $name_gen = hexdec(uniqid());
    $payment_ext = strtolower($payment_slip->getClientOriginalExtension());
    $payment_slip_name = $name_gen . '.' . $payment_ext;
    $upload_location = 'public/package_file/';
    $full_path = $upload_location . $payment_slip_name;

    $pay_ins = $request->pay_installment;
    if ($pay_ins == 'pay1')
    {
      $pay_status = '1';
    }elseif ($pay_ins == 'pay2')
    {
      $pay_status = '4';
    }
          
    DB::table('user_payments')->insert(
      [
        'user_id' => $request->user_id,
        'quotation_id' => $request->quotation_id,
        'payment_price' => $request->payment_price,
        'payment_bank' => $request->payment_bank,
        'payment_slip' => $full_path,
        'payment_status' => $pay_status,
        'pay_installment' => $request->pay_installment,
        'created_at' => Carbon::now()
      ]
    );

    DB::table('booking_quotations')
      ->where('quotation_id', '=', $request->quotation_id)
      ->update([
        'quotation_status' => '1',
        'updated_at' => Carbon::now()
      ]);

    DB::table('member_booking_packages')
      ->where('booking_id', '=', $request->booking_id)
      ->update([
        'booking_status' => '4',
        'updated_at' => Carbon::now()
      ]);

    //Line_Alert
    $msg_alrert = "มีการแจ้งโอนเงินแพ็คเกจทัวร์";
    $this->LineAlert($msg_alrert);

    $payment_slip->move($upload_location, $payment_slip_name);
    return redirect()->route('booking_status')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }


  public function user_invoice($id,$com)
  {
    $invoice = DB::table('booking_quotations')
      ->join('member_booking_packages', 'booking_quotations.booking_id', '=', 'member_booking_packages.booking_id')
      ->join('package_tours', 'booking_quotations.package_id', '=', 'package_tours.package_id')
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('booking_quotations.booking_id', '=', $id)
      ->get();

      $invoice2 = DB::table('member_booking_packages')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

      $bank_data = DB::table('sp_banks')
      ->get();
    return view('userpages.user_invoice', compact('invoice','bank_data','invoice2'));
  }

  public function user_invoice_comp($id)
  {
    $invoice = DB::table('booking_quotations')
      ->join('member_booking_packages', 'booking_quotations.booking_id', '=', 'member_booking_packages.booking_id')
      ->join('package_tours', 'booking_quotations.package_id', '=', 'package_tours.package_id')
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('booking_quotations.booking_id', '=', $id)
      ->get();

      $invoice2 = DB::table('member_booking_packages')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

      $bank_data = DB::table('sp_banks')
      ->get();
    return view('userpages.user_invoice_comp', compact('invoice','bank_data','invoice2'));
  }

  public function user_cancel_booking($id)
  {
    DB::table('booking_quotations')
      ->where('booking_id', '=', $id)
      ->update([
        'quotation_status' => '4',
        'updated_at' => Carbon::now()
      ]);

    DB::table('member_booking_packages')
      ->where('booking_id', '=', $id)
      ->update([
        'booking_status' => '2',
        'updated_at' => Carbon::now()
      ]);
    return redirect()->route('booking_status')->with('cancel', "ยกเลิกการจองเรียบร้อยแล้ว");
  }

  public function user_profile()
  {
    $user_profile = DB::table('users')
      ->where('id', '=', Auth::user()->id)
      ->get();
    return view('userpages.user_profile_update', compact('user_profile'));
  }

  public function user_profile_update(Request $request, $id)
  {
    DB::table('users')
      ->where('id', '=', $id)
      ->update([
        'username' => $request->username,
        'member_name' => $request->member_name,
        'email' => $request->email,
        'user_phone' => $request->user_phone,
        'updated_at' => Carbon::now()
      ]);
    return redirect()->route('user_profile')->with('success', "แก้ไขข้อมูลเรียบร้อยแล้ว");
  }

  public function user_password()
  {
    $user_password = DB::table('users')
      ->where('id', '=', Auth::user()->id)
      ->get();
    return view('userpages.user_password_update', compact('user_password'));
  }

  public function update_password(Request $request)
  {
    $request->validate([
      'old_password' => 'required',
      'new_password' => 'required|confirmed',
    ]);

    #Match The Old Password
    if (!Hash::check($request->old_password, auth()->user()->password)) {
      return back()->with("error", "รหัสผ่านเก่าไม่ถูกต้อง!");
    }

    User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->new_password)
    ]);
    return back()->with("status", "เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!");
  }

  public function all_packages(Request $request)
  {
    $search = $request['search'] ?? "";
    if ($search != "")
    {
      $all_packages = DB::table('package_tours')
      ->where('package_name','like',"%$search%")
      ->get();
    }else
    {
      $all_packages = DB::table('package_tours')
      ->where('package_status','=','1')
      ->orderBy('created_at', 'desc')
      ->get();
    }
   
    return view('userpages.all_packages', compact('all_packages','search'));
  }

  public function insert_booking_private(Request $request)
  {

    $ิbooking_id = Str::random(12);

    //บันทึกข้อมูล
    DB::table('member_booking_privates')
     ->insert([
      'booking_id' => $ิbooking_id,
      'member_id' => $request->member_id,
      'member_name' => $request->member_name,
      'member_email' => $request->member_email,
      'place_name' => $request->place_name,
      'number_of_travel' => $request->number_of_travel,
      'date_start' => $request->date_start,
      'date_end' => $request->date_end,
      'member_detail' => $request->member_detail,
      'member_contact' => $request->member_contact,
      'booking_status' => '0',
      'created_at' => Carbon::now()
    ]);

     return redirect()->route('booking_status')->with('success', "บันทึกข้อมูลการสั่งจองเรียบร้อยแล้ว กรุณารอเจ้าหน้าที่ตรวจสอบ");
  }

  public function booking_private()
  {
    $user_id = Auth::user()->id;

    $booking_private = DB::table('member_booking_privates')
      ->where('member_id', '=', $user_id)
      ->orderBy('created_at', 'desc')
      ->get();
    return view('userpages.booking_private', compact('booking_private'));
  }

  public function booking_detail_private($id)
  {
    $booking_detail = DB::table('member_booking_privates')    
      ->where('booking_id', '=', $id)
      ->get();
    return view('userpages.booking_detail_private', compact('booking_detail'));
  }
  
  public function private_quotation($id)
  {
    $user_quotation = DB::table('member_booking_privates')
      ->join('booking_quotation_privates', 'member_booking_privates.booking_id', '=', 'booking_quotation_privates.booking_id')
      ->join('users','member_booking_privates.member_id','=','users.id')
      ->where('member_booking_privates.booking_id', '=', $id)
      ->get();
    return view('userpages.booking_quotation_private', compact('user_quotation'));
  }

}
