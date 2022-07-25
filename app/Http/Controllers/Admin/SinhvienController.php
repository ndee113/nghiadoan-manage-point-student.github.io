<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\SinhvienService;

class SinhvienController extends Controller
{

    protected $SinhvienService;

    public function __construct(SinhvienService $SinhvienService)
    {
        $this->SinhvienService = $SinhvienService;
    }

    public function index()
    {
        // $sinhvien = $this->SinhvienService->create_ma_sv();
        // return $sinhvien;
        return view('admin.sinhvien.list', [
            'title' => 'Danh Sách Sinh Vien',
            'sinhviens' => $this->SinhvienService->get(),
            'i' => "0",
            
        ]);
    }

    public function create()
    {
        return view('admin.sinhvien.create',[
            'title' => 'Thêm Sinh Vien',
            'sinhviens' => $this->SinhvienService->get(),
            'lops' => $this->SinhvienService->getMaLop()
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->SinhvienService->create($request);
        if($result){
            return redirect('/admin/sinhviens/list'); 
        }
        return redirect()->back();
    }

    public function show(Sinhvien $sinhvien)
    {
        return view('admin.sinhvien.edit',[
            'title'=>'Cập nhật Sinh viên ' . $sinhvien->ten_sinhvien,
            'sinhvien' => $sinhvien,
            'lops' => $this->SinhvienService->getMaLop()
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Sinhvien $sinhvien)
    {
        $this->SinhvienService->update($request, $sinhvien);
        return redirect('/admin/sinhviens/list');
    }

    public function destroy(Request $request)  : JsonResponse
    {
        $result = $this->SinhvienService->destroy($request);
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
