<?php

namespace App\Http\Controllers;

use App\Effectuer;
use App\Grade;
use App\Membre;
use App\Mission;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
	use Calendar;

	/**
	 * @param null $annee
	 * @param null $mois
	 * @param null $jour
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showPlanOfWeek($annee=null, $mois=null, $jour=null)
    {
		$week = $this->getWeek(intval($annee), intval($mois), intval($jour));

		$taches = Mission::with("membres")
		                 ->whereBetween('debut',[$week->dimanche->toDateString(),$week->samedi->toDateString()])->get();

		return view("plan-hebdo", compact("week", "taches"));
    }

    public function showPlanOfMonth(Request $request)
    {
	    $start = Carbon::now()->firstOfMonth();
	    $end = Carbon::now()->endOfMonth();

	    if($request->has('mois') && $request->has('annee'))
	    {
			$start->setDate($request->query('annee'), $request->query('mois'), 1);
			$end = Carbon::create($request->query('annee'), $request->query('mois'), 1)->endOfMonth();
	    }

    	$membres = Membre::with('grade')
	                     ->where('grade_id', '<>', Grade::MANAGER)
	                     ->get();

	    $missions = Mission::join('effectuer','mission_id','=','missions.id')
	                     ->join('membres', 'membre_id', '=', 'membres.id')
	                     ->where('debut', '<=',$end->toDateString())
	                     ->where('fin','>=',$start->toDateString())
	                     ->get();
	    //dd($missions);

		$managers = Membre::with('grade')
		                  ->where('grade_id', '=', Grade::MANAGER)
		                  ->get();

		$templates = Template::all();

		//dd($missions);
	    return view("plan-mensuel", compact("start", "end", "missions", "membres", "managers", "templates"));
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Throwable
	 */
    public function addPlanning(Request $request)
    {
    	$mission = new Mission();
	    $mission->titre = $request->input('titre');
	    $mission->debut = Carbon::createFromFormat("d/m/Y",$request->input('debut'))->toDateString();
	    $mission->fin = Carbon::createFromFormat("d/m/Y",$request->input('fin'))->toDateString();
	    $mission->details = $request->input('details');
	    $mission->template_id = null;
	    $mission->saveOrFail();

	    //Ajout du manager
	    $effectuer = new Effectuer();
	    $effectuer->membre_id = $request->input('manager');
	    $effectuer->mission_id = $mission->id;
	    $effectuer->saveOrFail();

	    //Ajout des autres membres
    	foreach ($request->input("membres") as $membre)
	    {
		    $effectuer = new Effectuer();
		    $effectuer->membre_id = $membre;
		    $effectuer->mission_id = $mission->id;
		    $effectuer->saveOrFail();
	    }

    	return back();
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function performPlan(Request $request)
    {
		$date = Carbon::createFromFormat('d/m/Y',$request->query('periode'));
		return redirect()->route('index', ["annee" => $date->year, "mois" => $date->month, "jour" => $date->day]);
    }

    public function removePlanning($membre, $mission)
    {
    	Effectuer::where('membre_id','=',$membre)
		    ->where('mission_id','=',$mission)
	        ->delete();

    	return back();
    }
}