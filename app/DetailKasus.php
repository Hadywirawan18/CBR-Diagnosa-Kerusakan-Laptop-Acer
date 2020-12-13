<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fitur;

class DetailKasus extends Model
{
    protected $table = 'detail_kasus';

    public function Fitur()
    {
       return Fitur::where('id', $this->fitur_id)->first();
    }

    public function KasusId()
    {
        return $this->kasus_id;
    }

    public function Bobot()
    {
        $str = [
            'Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sanggat Tinggi'
        ];
        return $str[$this->bobot - 1];
    }
}
