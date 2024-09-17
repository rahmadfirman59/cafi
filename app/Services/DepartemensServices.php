<?php

namespace App\Services;

use App\Interfaces\CrudServicesInterfaces;
use App\Models\Departemen;

class DepartemensServices implements CrudServicesInterfaces
{
    protected $departemen;
    public function __construct(Departemen $departemen)
    {
        $this->departemen = $departemen;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->departemen->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $d = $this->departemen->orderBy('id','asc');


        $name = $param['nama'] ?? "";
        if ($name !== '') $d->where('nama','like',"%$name%");

        return $d->paginate(10);
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->departemen->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $d = $this->departemen->find($id);

        if ($d) $d->update($param);
        return $d;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $d = $this->departemen->find($id);

        if ($d) $d->delete($id);
        return $d;
    }
    public function all()
    {
        return $this->departemen->get();
    }
}
