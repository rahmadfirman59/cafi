<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function sukses()
    {
        return array('type' => "success", 'content' => "Data Berhasil Disimpan");
    }

    public function gagal($pesan = "Gagal")
    {
        return array('type' => "error","title"=>"Oops...", 'content' => $pesan);
    }

    public function sukseshapus()
    {
        return array('type' => "success", 'content' => "Data Berhasil Dihapus");
    }

}
