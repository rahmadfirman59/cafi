<?php

namespace App\Services;

use App\Interfaces\CrudServicesInterfaces;
use App\Models\Kendaraan;

class KendaraansServices implements CrudServicesInterfaces
{

    protected $kendaraan;
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->kendaraan->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $k = $this->kendaraan->orderBy('id','asc');


        $name = $param['nama'] ?? "";
        if ($name !== '') $k->where('nama','like',"%$name%");

        return $k->paginate(10);
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->kendaraan->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $k = $this->kendaraan->find($id);

        if ($k) $k->update($param);
        return $k;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $k = $this->kendaraan->find($id);

        if ($k) $k->delete($id);
        return $k;
    }

    public function all()
    {
        return $this->kendaraan->get();
    }
}
