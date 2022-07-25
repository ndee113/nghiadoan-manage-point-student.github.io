<?php

namespace App\Http\Controllers\Admin;

use App\Models\HoiDong;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\HoiDongService;

class HoiDongController extends Controller
{
    protected $HoiDongService;

    public function __construct(HoiDongService $HoiDongService)
    {
        $this->HoiDongService = $HoiDongService;
    }
    public function index()
    {
        return view('admin.hoidong.list',[
            'title' => 'Danh sách Hội đồng',
            'hoidongs' => $this->HoiDongService->get(),
            'i'=>"0",
        ]);
    }
    public function create()
    {
        return view('admin.hoidong.create',[
            'title' => 'Thêm Hội đồng mới',
            'khoas' => $this->HoiDongService->getMaKhoa(),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->HoiDongService->create($request);
        if($result){
            return redirect('/admin/hoidongs/list'); 
        }
        return redirect()->back();
    }


    public function show(HoiDong $hoidong)
    {
        return view('admin.hoidong.edit',[
            'title'=>'Cập giáo viên ' . $hoidong->ten_hd,
            'hoidongs' => $hoidong,
            'khoas' => $this->HoiDongService->getMaKhoa(),
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,HoiDong $hoidong)
    {
        $this->HoiDongService->update($request, $hoidong);
        return redirect('/admin/hoidongs/list');
    }

    public function destroy(Request $request) :JsonResponse
    {
        $result = $this->HoiDongService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xoá Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]); 
    }
}
