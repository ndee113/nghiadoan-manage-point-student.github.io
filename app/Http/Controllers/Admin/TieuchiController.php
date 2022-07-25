<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tieuchi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\TieuchiService;

class TieuchiController extends Controller
{
    protected $TieuchiService;

    public function __construct(TieuchiService $TieuchiService)
    {
        $this->TieuchiService = $TieuchiService;
    }

    public function index()
    {
        return view('admin.tieuchi.list', [
            'title' => 'Danh Sách Tiêu Chí đánh giá',
            'tieuchis' => $this->TieuchiService->getAll(),
            
        ]);
    }

    public function create()
    {
        return view('admin.tieuchi.create',[
            'title' => 'Thêm tiêu chí đánh giá',
        ]);
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $result = $this->TieuchiService->create($request);
        if($result){
            return redirect('/admin/tieuchis/list'); 
        }
        return redirect()->back();
    }

    public function show(Tieuchi $tieuchi)
    {
        return view('admin.tieuchi.edit',[
            'title'=>'Cập nhật tiêu chí ' . $tieuchi->noidung_tc,
            'tieuchi' => $tieuchi,
            //  
        ]);
        //  return dd($tieuchi->all());
    }

    // public function edit($id)
    // {
    //     //
    // }

    public function update(Request $request, Tieuchi $tieuchi)
    {
        $this->TieuchiService->update($request, $tieuchi);
        return redirect('/admin/tieuchis/list');
    }

    public function destroy(Request $request)  : JsonResponse
    {
        $result = $this->TieuchiService->destroy($request);
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
