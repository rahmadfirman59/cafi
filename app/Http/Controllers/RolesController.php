<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use App\Interfaces\CrudControllerInterfaces;
use App\Services\RolesServices;
use Illuminate\Http\Request;

class RolesController extends Controller implements CrudControllerInterfaces
{
    protected $rolesServices;

    public function __construct(RolesServices $rolesServices)
    {
        $this->middleware(['auth','menu']);
        $this->rolesServices = $rolesServices;
    }

    public function index(Request $request)
    {

        // TODO: Implement index() method.
        $data = $this->rolesServices->search($request);
        return view('roles.index')
            ->with(compact('data'));

    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('roles.create');
    }

    public function edit($id)
    {
        $data = $this->rolesServices->find($id);
        return view('roles.edit')
            ->with('data',$data);
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->rolesServices->delete($id);
            return redirect()->route('roles')
                ->with('message', $this->sukses());
    }

    public function store(RolesRequest $request)
    {
        try {
            $menu =json_encode($request->menu);
            $request->merge(['menu'=>$menu]);
            $this->rolesServices->create($request->all());
            return redirect()->route('roles')
                ->with('message', $this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $menu =json_encode($request->menu);
            $request->merge(['menu'=>$menu]);
            $this->rolesServices->update($request->all(),$id);
            return redirect()->route('roles')
                ->with('message', $this->sukses());
        }catch (\Exception $e){
            return redirect()->back()
                ->withInput($request->input())
                ->with('message', $this->gagal($e->getMessage()));
        }
    }
}
