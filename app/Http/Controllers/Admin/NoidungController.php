<?php

namespace App\Http\Controllers\Admin;

use App\Models\Noidung;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\NoidungService;

class NoidungController extends Controller
{
    protected $NoidungService;

    public function __construct(NoidungService $NoidungService)
    {
        $this->NoidungService = $NoidungService;
    }

    public function index()
    {
        return view('admin.noidung.list', [
            'title' => 'Danh Sách nội dung đánh giá',
            'noidungs' => $this->NoidungService->getAll(),
            
        ]);
    }

    public function create()
    {
        return view('admin.noidung.create',[
            'title' => 'Thêm nội dung đánh giá',
            'tieuchis' => $this->NoidungService->getTC(),
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->NoidungService->create($request);
        if($result){
            return redirect('/admin/noidungs/list'); 
        }
        return redirect()->back();
    }

    public function show(Noidung $noidung)
    {
        return view('admin.noidung.edit',[
            'title'=>'Cập nhật nội dung ' . $noidung->noidung,
            'noidung' => $noidung,
            'tieuchis' => $this->NoidungService->getTC(),
        ]);
    }

    // public function edit($id)
    // {
    //     //
    // }

    public function update(Request $request, Noidung $noidung)
    {
        $this->NoidungService->update($request, $noidung);
        return redirect('/admin/noidungs/list');
    }

    public function destroy(Request $request)  : JsonResponse
    {
        $result = $this->NoidungService->destroy($request);
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
