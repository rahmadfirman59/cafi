<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CrudControllerInterfaces
{
    public function index(Request $request);
    public function create();
    public function edit($id);
    public function delete($id);
}
