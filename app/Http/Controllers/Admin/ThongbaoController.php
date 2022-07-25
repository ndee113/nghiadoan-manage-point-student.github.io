<?php

namespace App\Http\Controllers\Admin;

use App\Models\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Http\Services\ThongbaoService;

class ThongbaoController extends Controller
{
    protected $ThongbaoService;

    public function __construct(ThongbaoService $ThongbaoService)
    {
        $this->ThongbaoService = $ThongbaoService;
    }

    public function index(){
        return view('admin.thongbao.list', [
            'title' => 'Danh Sách thông báo',
            'thongbaos' => $this->ThongbaoService->get(),
        ]);
    }

    public function create()
    {
        return view('admin.thongbao.create', [
            'title'=>'Thêm thông báo mới',
            'hockys' => $this->ThongbaoService->getHK(),

        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->ThongbaoService->create($request);
        if($result){
            return redirect('/admin/thongbaos/list'); 
        }
        return redirect()->back();

    }

    public function show(Thongbao $thongbao)
    {
        return view('admin.thongbao.edit',[
            'title'=>'Cập nhật thông báo ' .$thongbao->id_thongbao,
            'thongbao' => $thongbao,
            'hockys' => $this->ThongbaoService->getHK(),
        ]);
    }

    // // public function edit(Khoa $khoa, CreateFormRequest $request)
    // // {
     
    // // }

    public function update(Request $request, Thongbao $thongbao)
    {
        $this->ThongbaoService->update($request, $thongbao);
        return redirect('/admin/thongbaos/list');
    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->ThongbaoService->destroy($request);
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
