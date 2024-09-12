<?php

namespace App\Services;


use App\Interfaces\CrudServicesInterfaces;
use App\Models\User;

class UsersServices implements CrudServicesInterfaces
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->user->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $user = $this->user->orderBy('id','desc');

        $name = $param['nama'] ?? "";
        if ($name !== '') $user->where('name','like',"%$name%");

        $user = $user->with(['roles']);

        $user = $user->paginate(10);
        return $user;
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->user->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $user = $this->user->find($id);

        if ($user) $user->update($param);
        return $user;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $user = $this->user->find($id);
        if ($user) $user->delete($id);
        return $user;
    }
}
