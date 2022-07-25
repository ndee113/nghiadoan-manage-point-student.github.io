<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Requests\StorelopRequest;
// use App\Http\Requests\UpdatelopRequest;

use App\Models\Lop;
use App\Http\Requests\LopRequest;
use Illuminate\Http\Request;
use App\Http\Services\LopService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LopController extends Controller
{
    protected $LopService;

    public function __construct(LopService $LopService)
    {
        $this->LopService = $LopService;
    }

    public function index()
    {
        return view('admin.lop.list',[
            'title' => 'Danh sách lớp',
            'lops' => $this->LopService->get(),
            'khoahocs' => $this->LopService->getKH(),
            'i' => "",
            
        ]);
    }

    public function create()
    {
        return view('admin.lop.create', [
            'title'=>'Thêm Lớp Mới',
            'khoas' => $this->LopService->getMaKhoa(),
            'khoa_hocs' => $this->LopService->getMaKhoaHoc(),
        ]);
    }

    public function store(LopRequest $request)
    {
        $result = $this->LopService->create($request);
        if($result){
            return redirect('/admin/lops/list'); 
        }
        return redirect()->back();
    }

    public function show(Lop $lop)
    {
        return view('admin.lop.edit',[
            'title'=>'Cập nhật Lớp ' . $lop->ten_lop,
            'lop' => $lop,
            'khoas' => $this->LopService->getMaKhoa(),
            'khoa_hocs' => $this->LopService->getMaKhoaHoc(),
            'giaovien' => $this->LopService->getMaGV(),
         
            
        ]);
    }

    public function edit(Lop $lop)
    {
        
    }

    public function update(LopRequest $request, lop $lop)
    {
        $this->LopService->update($request, $lop);
        return redirect('/admin/lops/list');
    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->LopService->destroy($request);
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
    public function getGVbyKhoaAjax(Request $request){
        $result = $this->LopService->getGVbyKhoaAjax($request);
        return $result;
    }
}
