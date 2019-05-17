<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class RekamMedis extends Model
{
    public function getTanggalLahirAttribute($value){
        $date = new DateTime($value);
        return $date->format('d/m/Y');
    }

    public function getGolonganDarahAttribute($golDarah){
        switch($golDarah){
            case 1: return "A"; break;
            case 2: return "B"; break;
            case 3: return "O"; break;
            case 4: return "AB"; break;
            default : return "Undefine";
        }
    }
}
