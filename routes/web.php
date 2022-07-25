<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LopController;
use App\Http\Controllers\Admin\DiemController;
use App\Http\Controllers\Admin\KhoaController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\HockyController;
use App\Http\Controllers\Home\SignUpController;
use App\Http\Controllers\Admin\HoiDongController;
use App\Http\Controllers\Admin\KhoaHocController;
use App\Http\Controllers\Admin\NoidungController;
use App\Http\Controllers\Admin\TieuchiController;
use App\Http\Controllers\Admin\GiaovienController;
use App\Http\Controllers\Admin\SinhvienController;
use App\Http\Controllers\Admin\ThongbaoController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Home\SinhVien\HomeController;
use App\Http\Controllers\Home\HoiDong\HDHomeController;
use App\Http\Controllers\Home\GiaoVien\GVHomeController;
use App\Http\Controllers\Home\Sinhvien\SignInController;
use App\Http\Controllers\Home\HoiDong\HDSignInController;
use App\http\Controllers\Home\GiaoVien\GVSignInController;
// reference the Dompdf namespace
use Dompdf\Dompdf;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Administrator
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
    
        #menu
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #khoa
        Route::prefix('khoas')->group(function(){
            Route::get('list', [KhoaController::class, 'index']);
            Route::get('add', [KhoaController::class, 'create'])->name('khoas.create');
            Route::post('add', [KhoaController::class, 'store']);
            Route::get('edit/{khoa}', [KhoaController::class, 'show']);
            Route::post('edit/{khoa}', [KhoaController::class, 'update']);
            Route::DELETE('destroy', [KhoaController::class, 'destroy']);
        });

        #khoahoc
        Route::prefix('khoahocs')->group(function(){
            Route::get('list', [KhoaHocController::class, 'index']);
            Route::get('add', [KhoaHocController::class, 'create'])->name('khoahocs.create');
            Route::post('add', [KhoaHocController::class, 'store']);
            // Route::get('edit/{khoa}', [KhoaController::class, 'show']);
            // Route::post('edit/{khoa}', [KhoaController::class, 'update']);
            Route::DELETE('destroy', [KhoaHocController::class, 'destroy']);
        });

        #lop
        Route::prefix('lops')->group(function(){
            Route::get('list', [LopController::class, 'index']);
            Route::get('add', [LopController::class, 'create'])->name('lops.create');
            Route::post('add', [LopController::class, 'store']);
            Route::get('edit/{lop}', [LopController::class, 'show']);
            Route::post('edit/{lop}', [LopController::class, 'update']);
            Route::DELETE('destroy', [LopController::class, 'destroy']);
            Route::post('getGVbyKhoa', [LopController::class, 'getGVbyKhoaAjax']);
            
            #Ajax get gv by khoa
        });
        
        #sinhvien
        Route::prefix('sinhviens')->group(function(){
            Route::get('list', [SinhvienController::class, 'index']);
            Route::get('add', [SinhvienController::class, 'create'])->name('sinhviens.create');
            Route::post('add', [SinhvienController::class, 'store']);
            Route::get('edit/{sinhvien}', [SinhvienController::class, 'show']);
            Route::post('edit/{sinhvien}', [SinhvienController::class, 'update']);
            Route::DELETE('destroy', [SinhvienController::class, 'destroy']);
            Route::post('export_csv', [SinhvienController::class,'export_csv'])->name('export_sv');
            Route::post('import_csv', [SinhvienController::class,'import_csv']);
        });
        #giaovien
        Route::prefix('giaoviens')->group(function(){
            Route::get('list', [GiaovienController::class, 'index']);
            Route::get('add', [GiaovienController::class, 'create'])->name('giaoviens.create');
            Route::post('add', [GiaovienController::class, 'store']);
            Route::get('edit/{giaovien}', [GiaovienController::class, 'show']);
            Route::post('edit/{giaovien}', [GiaovienController::class, 'update']);
            Route::DELETE('destroy', [GiaovienController::class, 'destroy']);
        });
        Route::prefix('hoidongs')->group(function(){
            Route::get('list', [HoiDongController::class, 'index']);
            Route::get('add', [HoiDongController::class, 'create'])->name('hoidongs.create');
            Route::post('add', [HoiDongController::class, 'store']);
            Route::get('edit/{hoidong}', [HoiDongController::class, 'show']);
            Route::post('edit/{hoidong}', [HoiDongController::class, 'update']);
            Route::DELETE('destroy', [HoiDongController::class, 'destroy']);
        });
        #tieuchi
          Route::prefix('tieuchis')->group(function(){
            Route::get('list', [TieuchiController::class, 'index']);
            Route::get('add', [TieuchiController::class, 'create'])->name('tieuchis.create');
            Route::post('add', [TieuchiController::class, 'store']);
            Route::get('edit/{tieuchi}', [TieuchiController::class, 'show']);
            Route::post('edit/{tieuchi}', [TieuchiController::class, 'update']);
            Route::DELETE('destroy', [TieuchiController::class, 'destroy']);
        });
        #noidung
          Route::prefix('noidungs')->group(function(){
            Route::get('list', [NoidungController::class, 'index']);
            Route::get('add', [NoidungController::class, 'create'])->name('noidungs.create');
            Route::post('add', [NoidungController::class, 'store']);
            Route::get('edit/{noidung}', [NoidungController::class, 'show']);
            Route::post('edit/{noidung}', [NoidungController::class, 'update']);
            Route::DELETE('destroy', [NoidungController::class, 'destroy']);
        });
        #hoc_ky
          Route::prefix('hockys')->group(function(){
            Route::get('list', [HockyController::class, 'index']);
            Route::get('add', [HockyController::class, 'create'])->name('hockys.create');
            Route::post('add', [HockyController::class, 'store']);
            // Route::get('edit/{hocky}', [HockyController::class, 'show']);
            // Route::post('edit/{hocky}', [HockyController::class, 'update']);
            Route::DELETE('destroy', [HockyController::class, 'destroy']);
        });
        #thong_bao
          Route::prefix('thongbaos')->group(function(){
            Route::get('list', [ThongbaoController::class, 'index']);
            Route::get('add', [ThongbaoController::class, 'create'])->name('thongbaos.create');
            Route::post('add', [ThongbaoController::class, 'store']);
            Route::get('edit/{thongbao}', [ThongbaoController::class, 'show']);
            Route::post('edit/{thongbao}', [ThongbaoController::class, 'update']);
            Route::DELETE('destroy', [ThongbaoController::class, 'destroy']);
        });
        #diem
          Route::prefix('diems')->group(function(){
            Route::get('list', [DiemController::class, 'index']);
        });
        
    });
});

// Controller - dang nhap sv - dang nhap - dang xuat
Route::get('dang-nhap-sinh-vien', [SignInController::class, 'index'])->name('sign-in');
Route::post('dang-nhap-sinh-vien/store',[SignInController::class, 'store'])->name('sign-in-store');
Route::get('dang-xuat-sinh-vien', [SignInController::class, 'sign_out'])->name('sign-out');      
 
// authentication sinh vien - trang chu danh cho sinh vien
Route::middleware(['auth.sinhvien'])->group(function(){

    Route::prefix('', )->group(function(){

        Route::get('/', [HomeController::class, 'index'])->name('home-users');
        Route::get('home', [HomeController::class, 'index']);

        #cac chuc nang student
        Route::prefix('sinhvien', )->group(function(){
        Route::get('cham-diem-ren-luyen', [HomeController::class, 'sv_chamdiem'])->name('cham-diem');
        Route::post('cham-diem-ren-luyen', [HomeController::class, 'store_diem'])->name('store-diem');
        Route::get('sua-diem-ren-luyen', [HomeController::class, 'edit_diem'])->name('edit-diem');
        Route::post('update-diem', [HomeController::class, 'update_diem'])->name('update-diem');
        Route::get('xem-diem-ren-luyen', [HomeController::class, 'list_diem'])->name('list_diem_sv');
        Route::get('thong-tin-tai-khoan', [HomeController::class, 'profile'])->name('profile-student');
        Route::get('doi-mat-khau', [HomeController::class, 'change_password'])->name('stu-change_password');
        });

    });
});

// User Controller - danh cho CB-GV - dang nhap - dang xuat
Route::get('sign-in-teacher', [GVSignInController::class, 'index'])->name('sign-in-gv');
Route::post('sign-in-teacher/store', [GVSignInController::class, 'store'])->name('sign-in-store-gv');
Route::get('sign-out-teacher', [GVSignInController::class, 'sign_out'])->name('sign-out-gv'); 
// authentication CB - GV 
Route::middleware(['auth.giaovien'])->group(function(){

    Route::prefix('teacher', )->group(function(){

        Route::get('/', [GVHomeController::class, 'index'])->name('home-teacher');
        Route::get('home', [GVHomeController::class, 'index']);
    
        #cac chuc nang
        Route::get('bang-top-hop-sv', [GVHomeController::class, 'filter_sv'])->name('filter');
        Route::get('view-diem-sv/{id}&{hocky}', [GVHomeController::class, 'view_diem_lop'])->name('view_diem');
        Route::get('edit-diem-sv/{id}&{hocky}', [GVHomeController::class, 'update_diem_lop']);
        Route::post('store-diem-sv/{id}&{hocky}', [GVHomeController::class, 'store_diem_lop']);
        // Route::post('store-diem-sv', [GVHomeController::class, 'store_diem_lop']);
        // Route::get('gv-edit-diem-theo-lop/{id}&{hocky}', [GVHomeController::class, 'show_diem_sv']);


    
    });
});

// User Controller - danh cho HD - dang nhap - dang xuat
Route::get('sign-in-hoidong', [HDSignInController::class, 'index'])->name('sign-in-hd');
Route::post('sign-in-hoidong/store', [HDSignInController::class, 'store'])->name('sign-in-store-hd');
Route::get('sign-out-hoidong', [HDSignInController::class, 'sign_out'])->name('sign-out-hd'); 
// authentication HĐ
Route::middleware(['auth.hoidong'])->group(function(){

    Route::prefix('hoidong', )->group(function(){

        Route::get('/', [HDHomeController::class, 'index'])->name('home-hoidong');
        Route::get('home', [HDHomeController::class, 'index']);
    
        #cac chuc nang
        Route::get('bang-top-hop-gv', [HDHomeController::class, 'filter_gv'])->name('hd_filter');
        Route::get('view-diem-gv/{id}&{hocky}', [HDHomeController::class, 'view_diem_lop'])->name('view_diem');
        Route::get('edit-diem-gv/{id}&{hocky}', [HDHomeController::class, 'update_diem_lop']);
        Route::post('store-diem-gv/{id}&{hocky}', [HDHomeController::class, 'store_diem_lop']);
        Route::get('view-diem-hd/{id}&{hocky}', [HDHomeController::class, 'view_diem_lop'])->name('hd_view_diem_lop');
        //pdf convert
        Route::get('print-pdf-bang-diem/{id}&{hocky}',[HDHomeController::class, 'in_diem_theo_lop']);

    });
});


