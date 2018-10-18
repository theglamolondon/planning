<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	const CONFLIT_LIBELLE = "Conflit";
	const CONFLIT_COULEUR = "#e65251";

	public $timestamps = false;
	protected $primaryKey = "code";
	protected $keyType = "string";
}
