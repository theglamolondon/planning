<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Effectuer extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'membre_id';
	protected $table = 'effectuer';

	public function membres()
	{
		return $this->belongsTo(Membre::class,'membre_id');
	}

	public function missions(){
		return $this->belongsTo(Mission::class, 'mission_id');
	}
}
