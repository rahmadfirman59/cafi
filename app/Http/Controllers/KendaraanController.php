<?php

namespace App\Http\Controllers;

use App\Http\Requests\KendaraanRequest;
use App\Interfaces\CrudControllerInterfaces;
use App\Services\KendaraansServices;
use Illuminate\Http\Request;

class KendaraanController extends Controller implements CrudControllerInterfaces
{
    protected $kendaraansServices;
    public function __construct(KendaraansServices $kendaraansServices)
    {
        $this->middleware(['auth','menu']);
        $this->kendaraansServices = $kendaraansServices;
    }
    public function proses_file(Request $request)
    {

        $f = $this->save_file($request, 'foto_kendaraan', 'foto_kendaraan', rand(0,25));
        if ($f !== '') $request->merge(['foto' =>$f ]);
    }

    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->kendaraansServices->search($request);
        return view('kendaraans.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('kendaraans.create');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.

        $data = $this->kendaraansServices->find($id);
        return view('kendaraans.edit')
            ->with('data',$data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->kendaraansServices->delete($id);
        return redirect()->route('kendaraans')
            ->with('message', $this->sukseshapus());
    }

    public function store(KendaraanRequest $request)
    {

        try {
            $this->proses_file($request);
            $this->kendaraansServices->create($request->all());
            return redirect()->route('kendaraans')
                ->with('message',$this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $this->proses_file($request);
            $this->kendaraansServices->update($request->all(),$id);
            return redirect()->route('kendaraans')
                ->with('message',$this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }
}
