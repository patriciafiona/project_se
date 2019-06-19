<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App\User;

class CatatanKesehatan extends Model
{
	public function User(){
    	return  $this->belongsTo('App\User');
    }

    public function getJenisCatatanAttribute($status){
    	switch($status){
    		case 1: return "Massa Tubuh"; break;
    		case 2: return "Gula Darah"; break;
    		case 3: return "Tekanan Darah"; break;
    		case 4: return "Kolestrol"; break;
    		default : return "No Status";
    	}
    }

}
