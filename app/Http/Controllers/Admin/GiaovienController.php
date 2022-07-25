<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\GiaovienService;
use App\Models\Giaovien;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GiaovienController extends Controller
{
    protected $GiaovienService;

    public function __construct(GiaovienService $GiaovienService)
    {
        $this->GiaovienService = $GiaovienService;
    }
    public function index()
    {
        return view('admin.giaovien.list',[
            'title' => 'Danh sách giáo viên',
            'giaoviens' => $this->GiaovienService->get(),
            'i'=>"0",
        ]);
    }


    public function create()
    {
        return view('admin.giaovien.create',[
            'title' => 'Thêm Giáo viên mới',
            'khoas' => $this->GiaovienService->getMaKhoa(),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->GiaovienService->create($request);
        if($result){
            return redirect('/admin/giaoviens/list'); 
        }
        return redirect()->back();
    }


    public function show(Giaovien $giaovien)
    {
        return view('admin.giaovien.edit',[
            'title'=>'Cập giáo viên ' . $giaovien->ten_gv,
            'giaoviens' => $giaovien,
            'khoas' => $this->GiaovienService->getMaKhoa(),
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request,Giaovien $giaovien)
    {
        $this->GiaovienService->update($request, $giaovien);
        return redirect('/admin/giaoviens/list');
    }

    public function destroy(Request $request) :JsonResponse
    {
        $result = $this->GiaovienService->destroy($request);
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
