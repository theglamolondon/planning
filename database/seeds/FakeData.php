<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class FakeData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membres')->insert([
        	[
        		"matricule" => "S001",
        		"nom" => "Konan",
        		"prenoms" => "Boniface",
	        ],
        	[
        		"matricule" => "S002",
        		"nom" => "Tapé",
        		"prenoms" => "Jacob",
	        ],
        	[
        		"matricule" => "S003",
        		"nom" => "Touvoly",
        		"prenoms" => "Robert",
	        ],
        ]);

        DB::table("taches")->insert([
        	[
		        "titre" => "Achat de pneus",
		        "debut" => \Carbon\Carbon::now()->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(3)->toDateString(),
		        "details" => null,
	        ],
        	[
		        "titre" => "Achat Rose",
		        "debut" => \Carbon\Carbon::now()->addDays(7)->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(8)->toDateString(),
		        "details" => null,
	        ],
        	[
		        "titre" => "Vol Abidjan-Paris",
		        "debut" => \Carbon\Carbon::now()->addDays(10)->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(13)->toDateString(),
		        "details" => null,
	        ],
        ]);

        DB::table('effectuer')->insert([
        	[
        		"membre_id" => 1,
        		"tache_id" => 1,
	        ],
        	[
        		"membre_id" => 1,
        		"tache_id" => 2,
	        ],
        	[
        		"membre_id" => 2,
        		"tache_id" => 1,
	        ],
        	[
        		"membre_id" => 3,
        		"tache_id" => 2,
	        ],
        	[
        		"membre_id" => 2,
        		"tache_id" => 3,
	        ],
        ]);
    }
}
