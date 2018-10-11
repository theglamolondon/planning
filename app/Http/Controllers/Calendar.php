<?php
/**
 * Created by PhpStorm.
 * User: SUPPORT.IT
 * Date: 08/10/2018
 * Time: 08:24
 */

namespace App\Http\Controllers;


use App\Calendar\Week;
use Carbon\Carbon;

trait Calendar
{
	/**
	 * @param int|null $annee
	 * @param int|null $mois
	 * @param int|null $jour
	 *
	 * @return Week
	 */
	public function getWeek(int $annee=null, int $mois=null, int $jour=null)
	{
		$date = Carbon::create($annee,$mois,$jour);
		$week = new Week();
		if($jour == null){
			$week->lundi = Carbon::now()->addDay(-($date->dayOfWeek-1));
			$week->mardi = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::TUESDAY -1);
			$week->mercredi = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::WEDNESDAY-1);
			$week->jeudi = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::THURSDAY-1);
			$week->vendredi = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::FRIDAY-1);
			$week->samedi = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::SATURDAY-1);
			$week->dimanche = Carbon::now()->addDay(-($date->dayOfWeek-1) + Carbon::SUNDAY-1);
		}else{
			$week->lundi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1));
			$week->mardi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::TUESDAY -1));
			$week->mercredi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::WEDNESDAY-1));
			$week->jeudi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::THURSDAY-1));
			$week->vendredi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::FRIDAY-1));
			$week->samedi = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::SATURDAY-1));
			$week->dimanche = Carbon::createFromDate($annee,$mois,$jour)->addDay(-($date->dayOfWeek-1) + (Carbon::SUNDAY-1));
		}
		return $week;
	}

	public function getMonth(int $annee, int $mois)
	{

	}

	public static function getMonthsNames()
	{
		return [
			1 => 'Janvier', 2 => 'Février', 3 => 'Mars',
			4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
			7 => 'Juillet', 8 => 'Août', 9 => 'Septembre',
			10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
		];
	}
}