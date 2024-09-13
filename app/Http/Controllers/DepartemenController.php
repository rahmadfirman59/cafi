<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartemenRequest;
use App\Interfaces\CrudControllerInterfaces;
use App\Services\DepartemensServices;
use Illuminate\Http\Request;

class DepartemenController extends Controller implements CrudControllerInterfaces
{
    protected $departemensServices;

    public function __construct(DepartemensServices $departemensServices)
    {
        $this->middleware(['auth','menu']);
        $this->departemensServices = $departemensServices;
    }

    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.

        $data = $this->departemensServices->search($request);

        return view('departemens.index')
            ->with('data',$data);

    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('departemens.create');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $data = $this->departemensServices->find($id);
        return view('departemens.edit')
            ->with('data',$data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->departemensServices->delete($id);

        return redirect()->route('departemens')
            ->with('message', $this->sukses());
    }

    public function store(DepartemenRequest $request)
    {
        try {
            $this->departemensServices->create($request->all());
            return redirect()->route('departemens')
                ->with('message',$this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }


    public function update(DepartemenRequest $request,$id)
    {
        try {
            $this->departemensServices->update($request->all(),$id);
            return redirect()->route('departemens')
                ->with('message',$this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }
}
