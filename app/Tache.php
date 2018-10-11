<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
	public $timestamps = false;

	public function membres(){
		return $this->belongsToMany(Membre::class,'effectuer', 'tache_id', 'membre_id');
	}
}