<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function save_file(Request $request,$column_name = 'file', $folder = '', $filename = '')
    {
        if ($request->hasFile($column_name)) {
            $file = $request->file($column_name);
            if ($folder === '') $folder = $column_name;
            $filename = $filename . '_' . Str::random(10) . '.'. $file->extension();
            return Storage::putFileAs($folder, $file, $filename);
        }
        return '';
    }
    function number_to_roman($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $result = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $result .= $roman;
                    break;
                }
            }
        }
        return $result;
    }

}
