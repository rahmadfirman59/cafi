<?php

namespace App\Http\Controllers;

use App\Interfaces\CrudControllerInterfaces;
use App\Services\DepartemensServices;
use Illuminate\Http\Request;

class DepartemenController extends Controller implements CrudControllerInterfaces
{
    protected $departemensServices;

    public function __construct(DepartemensServices $departemensServices)
    {
        $this->departemensServices = $departemensServices;
    }

    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
