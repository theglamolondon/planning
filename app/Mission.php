<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
	public $timestamps = false;

	public function membres(){
		return $this->belongsToMany(Membre::class,'effectuer', 'mission_id', 'membre_id');
	}
}