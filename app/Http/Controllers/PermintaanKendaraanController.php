<?php

namespace App\Http\Controllers;

use App\Interfaces\CrudControllerInterfaces;
use App\Services\KendaraansServices;
use App\Services\PermintaanKendaraansServices;
use Illuminate\Http\Request;

class PermintaanKendaraanController extends Controller implements CrudControllerInterfaces
{
    protected $permintaanKendaraansServices,$kendaraansServices;
    public function __construct(PermintaanKendaraansServices $permintaanKendaraansServices,KendaraansServices $kendaraansServices)
    {
        $this->middleware(["auth","menu"]);
        $this->permintaanKendaraansServices = $permintaanKendaraansServices;
        $this->kendaraansServices = $kendaraansServices;
    }

    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->permintaanKendaraansServices->search($request);
        return view('permintaan-kendaraan.index')
            ->with('data',$data);

    }

    public function create()
    {
        // TODO: Implement create() method.
        $kendaraan = $this->kendaraansServices->all();
        $nomor = $this->permintaanKendaraansServices->generate();

        return view('permintaan-kendaraan.create')
            ->with('nomor',$nomor)
            ->with('kendaraan',$kendaraan);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function store(Request $request)
    {

//        return  $request;
        try {
            $this->permintaanKendaraansServices->create($request->all());
            return redirect()->route('permintaan.kendaraans')
                ->with('message', $this->sukses());
        }catch (\Exception $exception){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $this->permintaanKendaraansServices->update($request->all(),$id);
            return redirect()->route('permintaan.kendaraans')
                ->with('message', $this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }
}
