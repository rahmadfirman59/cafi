<?php

namespace App\Http\Controllers;

use App\Interfaces\CrudControllerInterfaces;
use App\Services\KendaraansServices;
use App\Services\PermintaanKendaraansServices;
use Illuminate\Http\Request;

class VerifikasiPermintaanKendaraanController extends Controller
{
    protected $permintaanKendaraansServices,$kendaraansServices;
    public function __construct(PermintaanKendaraansServices $permintaanKendaraansServices,KendaraansServices $kendaraansServices)
    {
        $this->permintaanKendaraansServices = $permintaanKendaraansServices;
        $this->kendaraansServices = $kendaraansServices;
    }

    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->permintaanKendaraansServices->search($request);
        return view('verifikasi-permintaan-kendaraan.index')
            ->with('data',$data);
    }


    public function detail($id)
    {
        $kendaraan = $this->kendaraansServices->all();
        $data = $this->permintaanKendaraansServices->find($id);
        return view('verifikasi-permintaan-kendaraan.detail')
            ->with('kendaraan',$kendaraan)
            ->with('data',$data);
    }

    public function update(Request $request,$id)
    {
        $request->merge(["tanggal_verifikasi"=>date("Y-m-d H:i:s")]);

        $this->permintaanKendaraansServices->update($request->all(),$id);
        return redirect()->route('verifikasi.permintaan.kendaraans')
            ->with('message',$this->sukses());
    }
}
