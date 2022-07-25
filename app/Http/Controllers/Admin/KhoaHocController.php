<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\KhoaHocService;

class KhoaHocController extends Controller
{

    protected $KhoaHocService;

    public function __construct(KhoaHocService $KhoaHocService)
    {
        $this->KhoaHocService = $KhoaHocService;
    }

    public function index()
    {
        return view('admin.khoahoc.list',[
            'title' => 'Danh sách Khóa Học',
            'khoahocs' => $this->KhoaHocService->getAll(),
            'i' => "",
        ]);
    }

    public function create()
    {
        return view('admin.khoahoc.create', [
            'title'=>'Thêm Khóa học',
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->KhoaHocService->create($request);
        if($result){
            return redirect('/admin/khoahocs/list'); 
        }
        return redirect()->back();

    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->KhoaHocService->destroy($request);
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
