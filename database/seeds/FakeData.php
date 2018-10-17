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
    	DB::table('templates')->insert([
    		[
			    "code" => "FORM",
			    "libelle" => "Formation",
			    "couleur" => "#efbc3b",
		    ],
    		[
			    "code" => "CONG",
			    "libelle" => "Congés",
			    "couleur" => "#ffffff",
		    ],
	    ]);

    	DB::table('grades')->insert([
    		[
    			"code" => "MAN",
    			"libelle" => "Manager",
    			"niveau" => 1,
		    ],
    		[
    			"code" => "SUP",
    			"libelle" => "Superviseur",
    			"niveau" => 2,
		    ],
    		[
    			"code" => "SEN-E",
    			"libelle" => "Senior Expérimenté",
    			"niveau" => 3,
		    ],
    		[
    			"code" => "SEN",
    			"libelle" => "Senior",
    			"niveau" => 4,
		    ],
    		[
    			"code" => "ASS-C",
    			"libelle" => "Assistant confirmé",
    			"niveau" => 5,
		    ],
    		[
    			"code" => "ASS-D",
    			"libelle" => "Assistant débutant",
    			"niveau" => 6,
		    ],
    		[
    			"code" => "ASS-PE",
    			"libelle" => "Assistant premier emploi",
    			"niveau" => 7,
		    ],
    		[
    			"code" => "STA",
    			"libelle" => "Stagiaire",
    			"niveau" => 8,
		    ],
	    ]);

        DB::table('membres')->insert([
        	[
        		"matricule" => "S001",
        		"nom" => "Oula",
        		"prenoms" => "Fabrice",
		        "grade_id" => "MAN",
		        "couleur" => "#74c2f7",
	        ],
        	[
        		"matricule" => "S002",
        		"nom" => "Diby",
        		"prenoms" => "Constant",
		        "grade_id" => "MAN",
		        "couleur" => "#e0fccc",
	        ],
        	[
        		"matricule" => "S003",
        		"nom" => "Dassorou",
        		"prenoms" => "Maxime",
		        "grade_id" => "MAN",
		        "couleur" => "#edbbda",
	        ],
        	[
        		"matricule" => "S004",
        		"nom" => "Koné",
        		"prenoms" => "Yssouf",
		        "grade_id" => "MAN",
		        "couleur" => "#fceacc",
	        ],
        	[
        		"matricule" => "S005",
        		"nom" => "Adou",
        		"prenoms" => "franck",
		        "grade_id" => "SUP",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S006",
        		"nom" => "Diop",
        		"prenoms" => "Sirina",
		        "grade_id" => "SUP",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S007",
        		"nom" => "Goly",
        		"prenoms" => "Anne",
		        "grade_id" => "SEN-E",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S008",
        		"nom" => "Kalo",
        		"prenoms" => "Ismël",
		        "grade_id" => "SEN-E",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S009",
        		"nom" => "Kena",
        		"prenoms" => "Joseph",
		        "grade_id" => "SEN",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S010",
        		"nom" => "Lago",
        		"prenoms" => "Grâce",
		        "grade_id" => "SEN",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S011",
        		"nom" => "Kouadio",
        		"prenoms" => "Axel",
		        "grade_id" => "ASS-C",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S012",
        		"nom" => "Kouamé",
        		"prenoms" => "Kévin",
		        "grade_id" => "ASS-C",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S013",
        		"nom" => "Koffi",
        		"prenoms" => "Robert",
		        "grade_id" => "ASS-D",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S014",
        		"nom" => "Yao",
        		"prenoms" => "Junior",
		        "grade_id" => "ASS-D",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S015",
        		"nom" => "Diarra",
        		"prenoms" => "Roxan",
		        "grade_id" => "ASS-PE",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S016",
        		"nom" => "Mambo",
        		"prenoms" => "Kevin",
		        "grade_id" => "ASS-PE",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S017",
        		"nom" => "Kouassi",
        		"prenoms" => "Ines",
		        "grade_id" => "STA",
		        "couleur" => null,
	        ],
        	[
        		"matricule" => "S018",
        		"nom" => "Boka",
        		"prenoms" => "Maryse",
		        "grade_id" => "STA",
		        "couleur" => null,
	        ],
        ]);

        DB::table("missions")->insert([
        	[
		        "titre" => "CIE",
		        "debut" => \Carbon\Carbon::now()->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(3)->toDateString(),
		        "details" => null,
	        ],
        	[
		        "titre" => "Orange CI",
		        "debut" => \Carbon\Carbon::now()->addDays(7)->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(8)->toDateString(),
		        "details" => null,
	        ],
        	[
		        "titre" => "FER",
		        "debut" => \Carbon\Carbon::now()->addDays(10)->toDateString(),
		        "fin" => \Carbon\Carbon::now()->addDays(13)->toDateString(),
		        "details" => null,
	        ],
        ]);

        DB::table('effectuer')->insert([
        	[
        		"membre_id" => 1,
        		"mission_id" => 1,
	        ],
        	[
        		"membre_id" => 5,
        		"mission_id" => 1,
	        ],
        	[
        		"membre_id" => 10,
        		"mission_id" => 1,
	        ],
        	[
        		"membre_id" => 2,
        		"mission_id" => 2,
	        ],
        	[
        		"membre_id" => 7,
        		"mission_id" => 2,
	        ],
        	[
        		"membre_id" => 1,
        		"mission_id" => 3,
	        ],
        	[
        		"membre_id" => 9,
        		"mission_id" => 3,
	        ],
        	[
        		"membre_id" => 8,
        		"mission_id" => 3,
	        ],
        ]);
    }
}
