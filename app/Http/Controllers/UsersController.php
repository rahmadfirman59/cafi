<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Interfaces\CrudControllerInterfaces;
use App\Services\RolesServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller implements CrudControllerInterfaces
{
    protected  $usersServices,$rolesServices;
    public function __construct(UsersServices $usersServices,RolesServices $rolesServices)
    {
        $this->middleware(['auth','menu']);
        $this->usersServices = $usersServices;
        $this->rolesServices = $rolesServices;
    }

    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->usersServices->search($request);
        return view('users.index')
            ->with("data",$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
        $role = $this->rolesServices->all();
        return view('users.create')
            ->with('role',$role);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $role = $this->rolesServices->all();
        $data = $this->usersServices->find($id);
        return view('users.edit')
            ->with('data',$data)
            ->with('role',$role);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->usersServices->delete($id);
        return redirect()->route('users')
            ->with('message', $this->sukseshapus());
    }

    public function store(UsersRequest $request)
    {

        $password = Hash::make($request->input("password"));
        $request->merge(["password"=> $password ]);

        $this->usersServices->create($request->all());
        return redirect()->route('users')
            ->with('message', $this->sukses());
    }

    public function update(Request $request,$id)
    {
        $password = $request->input('password') ?? "";

        if ($password)
        {
            $request->merge(["password" => Hash::make($password)]);
            $this->usersServices->update($request->all(),$id);
        }else{
            $this->usersServices->update($request->only(['name',"email","role_id","satker_id"]),$id);
        }

        return redirect()->route('users')
            ->with('message', $this->sukses());

    }
}
