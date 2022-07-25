<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MainService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $MainService;

    public function __construct(MainService $MainService)
    {
        $this->MainService = $MainService;
    }
    public function index()
    {
        return view('admin.home',[
            'title'=>'Trang Quản Trị Admin',
            'sinhvien' => $this->MainService->getSV(),
            'giaovien' => $this->MainService->getGV(),
            'lop' => $this->MainService->getLop(),
            'khoa' => $this->MainService->getKhoa(),
        ]);
    }

}
