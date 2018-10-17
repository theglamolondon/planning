<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	const MANAGER = 'MAN';
	const SUPERVISEUR = 'SUP';
	const SENIOR_EXPERIMENTE = 'SEN-E';
	const SENIOR = 'SEN';
	const ASSISTANT_CONFIRME = 'ASS-C';
	const ASSISTANT_DEBUTANT = 'ASS-D';
	const ASSISTANT_PREMIER_EMPLOI = 'ASS-PE';
	const STAGIAIRE = 'STA';

	public $timestamps = false;
	protected $primaryKey = "code";
	protected $keyType = "string";

	public function membres(){
		return $this->hasMany(Membre::class,"grade_id");
	}
}
