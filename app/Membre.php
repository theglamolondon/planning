<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    public $timestamps = false;

    public function grade(){
    	return $this->belongsTo(Grade::class, "grade_id");
    }
}
