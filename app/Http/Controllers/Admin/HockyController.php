<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Http\Services\HockyService;

class HockyController extends Controller
{
    protected $HockyService;

    public function __construct(HockyService $HockyService)
    {
        $this->HockyService = $HockyService;
    }

    public function index(){
        return view('admin.hocky.list', [
            'title' => 'Danh Sách Học kỳ xét điểm',
            'hockys' => $this->HockyService->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.hocky.create', [
            'title'=>'Thêm học kỳ',
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->HockyService->create($request);
        if($result){
            return redirect('/admin/hockys/list'); 
        }
        return redirect()->back();

    }

    // public function show(Khoa $khoa)
    // {
    //     return view('admin.khoa.edit',[
    //         'title'=>'Cập nhật Khoa ' . $khoa->tenkhoa,
    //         'khoa' => $khoa,
    //         // 'khoas'=>$this->KhoaService->getAll(), 
    //     ]);
    // }

    // // public function edit(Khoa $khoa, CreateFormRequest $request)
    // // {
     
    // // }

    // public function update(UpdateKhoaRequest $request, Khoa $khoa)
    // {
    //     $this->KhoaService->update($request, $khoa);
    //     return redirect('/admin/khoas/list');
    // }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->HockyService->destroy($request);
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
