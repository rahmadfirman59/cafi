<?php

namespace App\Services;

use App\Interfaces\CrudServicesInterfaces;
use App\Models\PermintaanKendaraan;

class PermintaanKendaraansServices implements CrudServicesInterfaces
{

    protected  $permintaanKendaraan;
    public function __construct(PermintaanKendaraan $permintaanKendaraan)
    {
        $this->permintaanKendaraan = $permintaanKendaraan;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->permintaanKendaraan->where($column,$value)->first();
    }

    public function search($param)
    {
        //
        $p = $this->permintaanKendaraan->orderBy('id','asc');

        return $p->paginate(10);
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->permintaanKendaraan->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $p = $this->permintaanKendaraan->find($id);

        if ($p) $p->update($param);
        return $p;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $p = $this->permintaanKendaraan->find($id);

        if ($p) $p->delete($id);
        return $p;
    }

   public function number_to_roman($number)
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
    public function generate()
    {
        $last = $this->permintaanKendaraan->whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->orderBy('nomor_pesanan', 'desc')
            ->first();
        $no = !empty($last) ? last(explode('/', $last->nomor_pesanan))+1 : 1;
        for ($i = strlen($no); $i < 5; $i++) $no = '0' . $no;
        return join('/', [
            date('Y'),
            $this->number_to_roman(date('n')),
            $no,
        ]);

    }
}
