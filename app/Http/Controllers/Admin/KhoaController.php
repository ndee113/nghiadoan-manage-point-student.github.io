<?php

namespace App\Http\Controllers\Admin;

use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Services\KhoaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKhoaRequest;

class KhoaController extends Controller
{
    protected $KhoaService;

    public function __construct(KhoaService $KhoaService)
    {
        $this->KhoaService = $KhoaService;
    }

    public function index(){
        return view('admin.khoa.list', [
            'title' => 'Danh Sách Khoa',
            'khoas' => $this->KhoaService->getAll(),
            'i' => "",
        ]);
    }

    public function create()
    {
        return view('admin.khoa.create', [
            'title'=>'Thêm Khoa Mới',
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->KhoaService->create($request);
        if($result){
            return redirect('/admin/khoas/list'); 
        }
        return redirect()->back();

    }

    public function show(Khoa $khoa)
    {
        return view('admin.khoa.edit',[
            'title'=>'Cập nhật Khoa ' . $khoa->tenkhoa,
            'khoa' => $khoa,
            'i' => "",
            // 'khoas'=>$this->KhoaService->getAll(), 
        ]);
    }

    // public function edit(Khoa $khoa, CreateFormRequest $request)
    // {
     
    // }

    public function update(UpdateKhoaRequest $request, Khoa $khoa)
    {
        $this->KhoaService->update($request, $khoa);
        return redirect('/admin/khoas/list');
    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->KhoaService->destroy($request);
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

