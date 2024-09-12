<?php

namespace App\Services;


use App\Interfaces\CrudServicesInterfaces;
use App\Models\Role;

class RolesServices implements CrudServicesInterfaces
{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->role->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.

        $role = $this->role->orderBy('id','asc');


        $name = $param['nama'] ?? "";
        if ($name !== '') $role->where('nama','like',"%$name%");

        return $role->paginate(10);
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->role->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.

        $role = $this->role->find($id);

        if ($role) $role->update($param);
        return $role;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $role = $this->role->find($id);

        if ($role) $role->delete($id);
        return $role;
    }

    public function all()
    {
        return $this->role->get();
    }
}
