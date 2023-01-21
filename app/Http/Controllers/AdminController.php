<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\member_booking_package;
use App\Models\package_img;
use App\Models\package_tour;
use App\Models\ListCar;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

  public function home()
  {
    $userbooking = DB::table('member_booking_packages')
      ->where('booking_status', '=', 0)
      ->get();
    return view('admin.index', compact('userbooking'));
  }

  public function index()
  {
    $package_tour = package_tour::All();
    return view('admin.list_package', compact('package_tour'));
  }

  public function admin_setting()
  {
    return view('admin.admin_setting');
  }

  public function booking_chk()
  {
    $package_tour = DB::table('package_tours')
    ->join('member_booking_packages', 'package_tours.package_id', '=','member_booking_packages.package_id')
    ->get();
    return view('admin.booking_chk', compact('package_tour'));
  }

  public function booking_cf($id)
  {
    $booking_user = DB::table('member_booking_packages')
      ->leftjoin('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->leftjoin('booking_quotations','member_booking_packages.booking_id', '=', 'booking_quotations.booking_id')      
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

    return view('admin.booking_cf', compact('booking_user'));
  }

  public function edit_pk($id)
  {
    $pk_tour = DB::table('package_tours')
      ->where('id', '=', $id)
      ->get();
    return view('admin.edit_package', compact('pk_tour'));
  }

  public function edit_pk_img($id)
  {
    $pk_tour_img = DB::table('package_imgs')
      ->where('package_id', '=', $id)
      ->get();
    $pk_img_count = DB::table('package_imgs')
      ->where('package_id', '=', $id)->count();
    return view('admin.edit_package_img', compact('pk_tour_img', 'pk_img_count'));
  }

  public function package_img_delete($id)
  {
    //ลบข้อมูลจากฐานข้อมูล
    $pk_img = package_img::find($id);
    $image_path = 'public/package_file/' . $pk_img->package_img;
    unlink($image_path);

    $delete = package_img::find($id)->delete();
    return redirect()->back()->with('delete', "ลบข้อมูลเรียบร้อย");
  }

  public function update_img(Request $request, $id)
  {
    $images = $request->package_img;
    $upload_location = 'public/package_file/';
    $imageName = time() . rand(1, 99) . '.' . $images->extension();
    $images->move($upload_location, $imageName);

    package_img::insert([
      'package_id' => $id,
      'package_img' => $imageName,
      'created_at' => Carbon::now()
    ]);
    return redirect()->back()->with('success', "เพิ่มข้อมูลเรียบร้อย");
  }


  public function package_detail($id)
  {
    $package_detail = DB::table('package_tours')
      ->where('package_id', '=', $id)
      ->get();
    return view('admin.package_detail', compact('package_detail'));
  }

  public function update_package(Request $request, $id)
  {
    //การเข้ารหัสรูปภาพ
    $package_file = $request->file('package_file');
    $package_cover = $request->file('package_cover');
    if ($package_cover) {
      $old_cover = $request->old_cover;
      $package_cover = $request->file('package_cover');
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_cover = strtolower($package_cover->getClientOriginalExtension());
      $pk_cover_name = $name_gen . '.' . $pk_cover;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $pk_cover_full_path = $upload_location . $pk_cover_name;
      unlink($old_cover);

      package_tour::find($id)->update([
        'package_cover' => $pk_cover_full_path,
      ]);
      $package_cover->move($upload_location, $pk_cover_name);
    } else {
      package_tour::find($id)->update([
        'package_cover' => $request->old_cover
      ]);
    }

    if ($package_file) {
      //การเข้ารหัสรูปภาพ
      $package_file = $request->file('package_file');
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_ext = strtolower($package_file->getClientOriginalExtension());
      $package_file_name = $name_gen . '.' . $pk_ext;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $full_path = $upload_location . $package_file_name;

      $package_veh = $request->package_veh;

      if ($package_veh) {
        $package_veh_list = implode(',', (array) $request['package_veh']);
      } else {
        $package_veh_list = $request->old_veh;
      }
      package_tour::find($id)->update([
        'package_name' => $request->package_name,
        'package_place' => $request->package_location,
        'package_type' => $request->package_type,
        'code_tour' => $request->code_tour,
        'package_veh' => $package_veh_list,
        'package_min_customer' => $request->package_min_cus,
        'package_total_day' => $request->package_total_day,
        'package_period_start' => $request->package_period_start,
        'package_period_end' => $request->package_period_end,
        'package_price' => $request->package_price,
        'package_file' => $full_path,
        'package_deposit' => $request->package_deposit,
        'highlight_tour' => $request->highlight_tour,
        'package_detail' => $request->package_detail,
        'package_status' => $request->package_status,
        'updated_at' => Carbon::now()
      ]);
      $package_file->move($upload_location, $package_file_name);
      return redirect()->route('list_package')->with('update', "แก้ไขข้อมูลเรียบร้อยแล้ว");
    } else {
      $package_veh = $request->package_veh;

      if ($package_veh) {
        $package_veh_list = implode(',', (array) $request['package_veh']);
      } else {
        $package_veh_list = $request->old_veh;
      }
      package_tour::find($id)->update([
        'package_name' => $request->package_name,
        'package_place' => $request->package_location,
        'package_type' => $request->package_type,
        'code_tour' => $request->code_tour,
        'package_veh' => $package_veh_list,
        'package_min_customer' => $request->package_min_cus,
        'package_total_day' => $request->package_total_day,
        'package_period_start' => $request->package_period_start,
        'package_period_end' => $request->package_period_end,
        'package_price' => $request->package_price,
        'package_deposit' => $request->package_deposit,
        'highlight_tour' => $request->highlight_tour,
        'package_detail' => $request->package_detail,
        'package_status' => $request->package_status,
        'updated_at' => Carbon::now()
      ]);
      return redirect()->route('list_package')->with('update', "แก้ไขข้อมูลเรียบร้อยแล้ว");
    }
  }


  public function save_package(Request $request)
  {
    //ตรวจสอบข้อมูล
    $request->validate(
      [
        'code_tour' => 'required|unique:package_tours|max:100',
        'package_status' => 'required',
        'image.*' => 'mimes:jpg,jpeg,png|max:2048',
        'image' =>  'max:5'

      ],
      [
        'code_tour.unique' => "มีรหัสทัวร์นี้แล้ว กรุณาใส่รหัสทัวร์ใหม่",
        'package_status.required' => "กรุณาเลือกสถานะแพ็คเกจ",
        'image.max' => "ไม่สามารถอัพโหลดได้เกิน 5 ภาพ"
      ]
    );
    //การเข้าไฟล์
    $package_file = $request->file('package_file');
    $package_cover = $request->package_cover;
    //generate รูปภาพ
    $name_gen = hexdec(uniqid());
    //ดึงนามสกุลไฟล์ภาพ
    $pk_ext = strtolower($package_file->getClientOriginalExtension());
    $pk_cover = strtolower($package_cover->getClientOriginalExtension());
    $package_file_name = $name_gen . '.' . $pk_ext;
    $pk_cover_name = $name_gen . '.' . $pk_cover;

    //อัพโหลดและบันทึกข้อมูล
    $upload_location = 'public/package_file/';
    $full_path = $upload_location . $package_file_name;
    $pk_cover_full_path = $upload_location . $pk_cover_name;
    $package_veh = implode(',', (array) $request['package_veh']);

    $pk_id = Str::random(12);
    if ($request->hasFile('image')) {
      foreach ($request->image as $key => $images) {
        $imageName = time() . rand(1, 99) . '.' . $images->extension();
        $images->move($upload_location, $imageName);

        package_img::insert([
          'package_id' => $pk_id,
          'package_img' => $imageName,
          'created_at' => Carbon::now()
        ]);
      }
    }

    package_tour::insert([
      'package_id' => $pk_id,
      'package_cover' => $pk_cover_full_path,
      'package_name' => $request->package_name,
      'package_place' => $request->package_location,
      'package_type' => $request->package_type,
      'code_tour' => $request->code_tour,
      'package_veh' => $package_veh,
      'package_min_customer' => $request->package_min_cus,
      'package_total_day' => $request->package_total_day,
      'package_period_start' => $request->package_period_start,
      'package_period_end' => $request->package_period_end,
      'package_price' => $request->package_price,
      'package_file' => $full_path,
      'package_deposit' => $request->package_deposit,
      'highlight_tour' => $request->highlight_tour,
      'package_detail' => $request->package_detail,
      'package_status' => $request->package_status,
      'created_at' => Carbon::now()
    ]);
    $package_file->move($upload_location, $package_file_name);
    $package_cover->move($upload_location, $pk_cover_name);
    return redirect()->route('list_package')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }


  public function add_package()
  {
    return view('admin.add_package');
  }

  public function add_quotation(Request $request, $id)
  {
    $quotation_id = date("ymd-hs");
    $package_file = $request->file('package_file');

    if ($package_file) {
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_ext = strtolower($package_file->getClientOriginalExtension());
      $package_file_name = $name_gen . '.' . $pk_ext;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $full_path = $upload_location . $package_file_name;

      DB::table('booking_quotations')->insert([
        'booking_id' => $request->booking_id,
        'quotation_id' => $quotation_id,
        'package_id' => $request->package_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'package_file' => $full_path,
        'quotation_detail' => $request->quotation_detail,
        'quotation_status' => '0',
        'created_at' => Carbon::now()
      ]);
      $package_file->move($upload_location, $package_file_name);
      return redirect()->route('booking_chk')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");
    } else {

      DB::table('booking_quotations')->insert([
        'booking_id' => $request->booking_id,
        'quotation_id' => $quotation_id,
        'package_id' => $request->package_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'package_file' => 'none',
        'quotation_detail' => $request->quotation_detail,
        'quotation_status' => '0',
        'created_at' => Carbon::now()
      ]);

      DB::table('member_booking_packages')
        ->where('booking_id', '=', $request->booking_id)
        ->update([
        'booking_status' => '1',
        'updated_at' => Carbon::now()      
      ]);
  
      return redirect()->route('booking_chk')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");
    }
  }

  public function list_car()
  {
    $list_car = ListCar::All();
    return view('admin.list_car', compact('list_car'));
  }

  public function add_car()
  {
    return view('admin.add_car');
  }

  public function add_listcar(Request $request)
  {
    $request->validate(
      [
        'car_name' => 'unique:list_cars|max:100',
        'car_number' => 'unique:list_cars|max:8'
      ],
      [
        'car_name.max' => "ห้ามระบุเกิน 100 ตัวอักษร",
        'car_number.max' => "สามารถระบุได้ไม่เกิน 8 ตัวอักษร",
        'car_name.unique' => "มีชื่อรถนี้แล้ว กรุณาระบุชื่อใหม่",
        'car_number.unique' => "มีทะเบียนรถนี้แล้ว กรุณาระบุทะเบียนใหม่",
      ]
    );
    ListCar::insert([
      'car_id' => Str::random(9),
      'car_name' => $request->car_name,
      'car_number' => $request->car_number,
      'car_book' => $request->car_book,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('list_car')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function edit_car($id)
  {
    $list_car = ListCar::find($id);
    return view('admin.edit_car', compact('list_car'));
  }

  public function update_car(Request $request, $id)
  {
    $request->validate(
      [
        'car_name' => 'max:100',
        'car_number' => 'unique:list_cars|max:8'
      ],
      [
        'car_name.max' => "ห้ามระบุเกิน 100 ตัวอักษร",
        'car_number.max' => "สามารถระบุได้ไม่เกิน 8 ตัวอักษร",
        'car_number.unique' => "มีทะเบียนรถนี้แล้ว กรุณาระบุทะเบียนใหม่",
      ]
    );
    //อัพเดทข้อมูลในฐานข้อมูล
    ListCar::find($id)->update([
      'car_name' => $request->car_name,
      'car_number' => $request->car_number,
      'car_book' => $request->car_book,
      'updated_at' => Carbon::now()
    ]);
    return redirect()->route('list_car')->with('success', "อัพเดทข้อมูลเรียบร้อยแล้ว");
  }

  public function bank()
  {
    return view('admin.bank');
  }

  public function payment_chk($id)
  {
    $user_payment = DB::table('user_payments')
    ->leftjoin('booking_quotations','user_payments.quotation_id', '=', 'booking_quotations.quotation_id') 
    ->leftjoin('package_tours', 'booking_quotations.package_id', '=','package_tours.package_id')
    ->leftjoin('member_booking_packages','booking_quotations.booking_id', '=', 'member_booking_packages.booking_id')  
    ->where('booking_quotations.booking_id','=',$id)
    ->get() ;    
    return view('admin.payment_chk', compact('user_payment'));
  }

  public function update_payment($id, $bkid)
  {
    DB::table('user_payments')
      ->where('quotation_id', '=', $id)
      ->update([
        'payment_status' => '2',
        'updated_at' => Carbon::now()
      ]);
      DB::table('booking_quotations')
      ->where('quotation_id', '=', $id)
      ->update([
        'quotation_status' => '2',
        'updated_at' => Carbon::now()
      ]);
      DB::table('member_booking_packages')
      ->where('booking_id', '=', $bkid)
      ->update([
        'booking_status' => '5',
        'updated_at' => Carbon::now()
      ]);
      return redirect()->route('booking_chk')->with('success', "ตรวจสอบยอดชำระเรียบร้อยแล้ว");
  }

public function user_data()
{
  $user_data = DB::table('users')
  ->where('is_admin','=','0')
  ->get();
  return view('admin.user_data', compact('user_data'));
}

public function user_data_booking($id)
{
  $user_data_booking = DB::table('member_booking_packages')
  ->join('package_tours','member_booking_packages.package_id','=','package_tours.package_id')
  ->where('member_id','=',$id)
  ->get();

  $user_profile = DB::table('users')
  ->where('id','=',$id)
  ->get();
  return view('admin.user_detail', compact('user_data_booking','user_profile'));
}

}