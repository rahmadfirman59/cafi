<?php

namespace App\Interfaces;

interface CrudServicesInterfaces
{

    public function find($value,$column = 'id');

    public function search($param);

    public function create($param);

    public function update($param,$id);

    public function delete($id);
}
