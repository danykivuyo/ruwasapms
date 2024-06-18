<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */

	protected $jsonString = '
    [
        {
           "name": "Arusha",
            "districts":[
                          {
                            "name":"Arumeru Magharibi"
                          },
                          {
                            "name": "Arumeru Mashariki"
                          },
                          {
                            "name": "Arusha M "
                          },
                          {
                           "name":"Karatu"
                          },
                          {
                            "name": "Longido"
                          },
                          {
                            "name": "Monduli"
                          }
                         ]
        },
        {
            "name": "Dar es Salaam",
            "districts":[
                          {
                            "name":"Kinondoni"
                          },
                          {
                            "name": "Temeke"
                          },
                          {
                            "name": "Ilala"
                          },
                          {
                           "name":"Ubungo"
                          },
                          {
                            "name": "Kigamboni"
                          }
                         ]
        },
        {
            "name": "Dodoma",
            "districts":[
                          {
                            "name":"Bahi"
                          },
                          {
                            "name": "Chamwino"
                          },
                          {
                            "name": "Chemba"
                          },
                          {
                           "name":"Dodoma"
                          },
                          {
                            "name": "Kondoa"
                          },
                          {
                            "name": "Kongwa"
                          },
                          {
                            "name": "Mpwapwa"
                          }
                         ]
        },
        {
		"name": "Iringa",
		"districts":[
					  {
			            "name":"Bahi"
					  },
				      {
				        "name": "Chamwino"
				      },
				      {
				        "name": "Chemba"
				      },
				      {
				       "name":"Dodoma M"
					  },
					  {
				       "name":"Dodoma V"
					  },
				      {
				        "name": "Kondoa"
				      },
				      {
				        "name": "Kongwa"
				      },
				      {
				        "name": "Mpwapwa"
				      }
     				]

	},
	{
		"name": "Kagera",
		"districts":[
					  {
			            "name":"Biharamulo"
					  },
				      {
				        "name": "Bukoba M"
				      },
				      {
				        "name": "Bukoba V"
				      },
				      {
				       "name":"Karagwe"
					  },
					  {
				       "name":"Missenyi"
					  },
				      {
				        "name": "Muleba"
				      },
				      {
				        "name": "Ngara"
				      },
				      {
				        "name": "Kyerwa"
				      }
     				]
	},
	{
	 	"name" : "Katavi",
		"districts" : [
			{
				"name" : "Mlele"
			},
			{
				"name" : "Mpanda"
			}
		]
	},
	{
		"name": "Kaskazini Pemba",
		"districts":[
					  {
			            "name":"Micheweni"
					  },
				      {
				        "name": "Wete"
				      }
				      
     				]
	},
	{
		"name": "Kaskazini Unguja",
		"districts":[
					  {
			            "name":"Unguja Kaskazini A"
					  },
				      {
				        "name": "Unguja Kaskazini B"
				      }
     				]
	},
	{
		"name": "Kigoma",
		"districts":[
					  {
			            "name":"Kasulu"
					  },
				      {
				        "name": "Kibondo"
				      },
				      {
				        "name": "Kigoma V"
				      },
				      {
				       "name":"Kigoma M"
					  },
					  {
				       "name":"Kigoma Ujiji"
					  },
				      {
				        "name": "Buhigwe"
				      },
				      {
				        "name": "Kakonko"
				      },
				      {
				        "name": "Uvinza"
				      }
     				]
	},
	{
		"name": "Kilimanjaro",
		"districts":[
					  {
			            "name":"Hai"
					  },
				      {
				        "name": "Moshi M"
				      },
				      {
				        "name": "Moshi V"
				      },
				      {
				       "name":"Mwanga"
					  },
					  {
				       "name":"Rombo"
					  },
				      {
				        "name": "Same"
				      },
				      {
				        "name": "Siha"
				      }
     				]
	},
	{
		"name": "Kusini Pemba",
		"districts":[
					  {
			            "name":"Chake Chake"
					  },
				      {
				        "name": "Mkoani"
				      }
     				]
	},
	{
		"name": "Kusini Unguja",
		"districts":[
					  {
			            "name":"Kati Unguja"
					  },
				      {
				        "name": "Kusini Unguja"
				      }
     				]
	},
	{
		"name": "Lindi",
		"districts":[
					  {
			            "name":"Kilwa"
					  },
				      {
				        "name": "Lindi M"
				      },
				      {
				        "name": "Lindi V"
				      },
				      {
				       "name":"Nachingwea"
					  },
					  {
				       "name":"Ruangwa"
					  },
				      {
				        "name": "Liwale"
				      }
     				]
	},
	{
		"name": "Manyara",
		"districts":[
					  {
			            "name":"Babati"
					  },
				      {
				        "name": "Babati V"
				      },
				      {
				       "name":"Hanang"
					  },
					  {
				       "name":"Kiteto"
					  },
				      {
				        "name": "Mbulu"
				      },
				      {
				        "name": "Simanjiro"
				      }
     				]
	},
	{
		"name": "Mara",
		"districts":[
					  {
			            "name":"Bunda"
					  },
				      {
				        "name": "Musoma M"
				      },
				      {
				        "name": "Musoma V"
				      },
				      {
				       "name":"Rorya"
					  },
					  {
				       "name":"Serengeti"
					  },
				      {
				        "name": "Tarime"
				      }
     				]
	},
	{
		"name": "Mbeya",
		"districts":[
					  {
			            "name":"Chunya"
					  },
				      {
				        "name": "Ileje"
				      },
				      {
				        "name": "Kyela"
				      },
				      {
				       "name":"Mbarali"
					  },
					  {
				       "name":"Mbeya M"
					  },
				      {
				        "name": "Mbeya V"
				      },
				      {
				        "name": "Mbozi"
				      }
     				]
	},
	{
		"name": "M Magharibi",
		"districts":[
					  {
			            "name":"Magharibi Unguja"
					  },
				      {
				        "name": "M Unguja"
				      }
     				]
	},
	{
		"name": "Morogoro",
		"districts":[
					  {
			            "name":"Gairo"
					  },
				      {
				        "name": "Morogoro M"
				      },
				      {
				        "name": "Morogoro V"
				      },
				      {
				       "name":"Kilombero"
					  },
					  {
				       "name":"Kilosa"
					  },
				      {
				        "name": "Mvomero"
				      },
				      {
				        "name": "Malinyi"
				      },
				      {
				        "name": "Ulanga"
				      }
     				]
	},
	{
		"name": "Mtwara",
		"districts":[
					  {
			            "name":"Masasi"
					  },
				      {
				        "name": "Masasi M"
				      },
				      {
				        "name": "Mtwara Mikindani"
				      },
				      {
				       "name":"Mtwara M"
					  },
					  {
				       "name":"Mtwara V"
					  },
				      {
				        "name": "Newala"
				      },
				      {
				        "name": "Tandahimba"
				      }
     				]

	},
	{
		"name": "Mwanza",
		"districts":[
					  {
			            "name":"Geita"
					  },
				      {
				        "name": "Ilemela"
				      },
				      {
				        "name": "Kwimba"
				      },
				      {
				       "name":"Magu"
					  },
					  {
				       "name":"Misungwi"
					  },
				      {
				        "name": "Nyamagana"
				      },
				      {
				        "name": "Sengerema"
				      },
				      {
				        "name": "Ukerewe"
				      }
     				]
	},
	{
		"name" : "Njombe",
		"districts" : [
			{
				"name" : "Njombe"
			},
			{
				"name" : "Wanging\'ombe"
			}
		]
	},
	{
		"name": "Pwani",
		"districts":[
					  {
			            "name":"Bagamoyo"
					  },
				      {
				        "name": "Kibaha"
				      },
				      {
				        "name": "Kibiti"
				      },
				      {
				       "name":"Kisarawe"
					  },
					  {
				       "name":"Mafia"
					  },
				      {
				        "name": "Mkuranga"
				      },
				      {
				        "name": "Rufiji"
				      }
     				]
	},
	{
		"name": "Rukwa",
		"districts":[
				      {
				        "name": "Nkansi"
				      },
				      {
				        "name": "Sumbawanga M"
				      },
				      {
				       "name":"Sumbawanga V"
					  },
					  {
				       "name":"Kalambo"
					  }
     				]
	},
	{
		"name": "Ruvuma",
		"districts":[
					{
						"name" : "Madaba"
					},
					  {
			            "name":"Mbinga"
					  },
				      {
				        "name": "Namtumbo"
				      },
				      {
				        "name": "Songea M"
				      },
				      {
				       "name":"Songea V"
					  },
					  {
				       "name":"Tunduru"
					  },
				      {
				        "name": "Nyasa"
				      }
     				]
	},
	{
		"name": "Shinyanga",
		"districts":[
					  {
			            "name":"Bariadi"
					  },
				      {
				        "name": "Shinyanga M"
				      },
				      {
				        "name": "Shinyanga V"
				      },
				      {
				       "name":"Bukombe"
					  },
					  {
				       "name":"Kahama M"
					  },
				      {
				        "name": "Kahama V"
				      },
				      {
				        "name": "Kishapu"
				      },
				      {
				        "name": "Maswa"
				      },
				      {
				      	"name": "Meatu"
				      }
     				]

	},
	{
		"name": "Singida",
		"districts":[
					  {
			            "name":"Iramba"
					  },
				      {
				        "name": "Manyoni"
				      },
				      {
				        "name": "Singida M"
				      },
				      {
				       "name":"Singida V"
					  },
					  {
				       "name":"Ikungi"
					  },
				      {
				        "name": "Mkalama"
				      }
     				]
	},
	{
		"name": "Tabora",
		"districts":[
					  {
			            "name":"Igunga"
					  },
				      {
				        "name": "Tabora M"
				      },
				      {
				        "name": "Nzega"
				      },
				      {
				       "name":"Sikonge"
					  },
					  {
				       "name":"Urambo"
					  },
				      {
				        "name": "Uyui"
				      },
				      {
				        "name": "Kaliua"
				      }
     				]
	},
	{
		"name": "Tanga",
		"districts":[
					  {
			            "name":"Handeni"
					  },
				      {
				        "name": "Handeni M"
				      },
				      {
				        "name": "Handeni V"
				      },
				      {
				       "name":"Korogwe"
					  },
					  {
				       "name":"Lushoto"
					  },
				      {
				        "name": "Mkinga"
				      },
				      {
				        "name": "Muheza"
				      },
				      {
				        "name": "Pangani"
				      },{
				      	"name":"Tanga"
				      }
     				]
	}
]
        ';
	public function run(): void
	{
		//
		$data = json_decode($this->jsonString, true);
		$regions = [];
		foreach ($data as $region) {
			$r = [];
			$r["name"] = $region['name'];
			$r["created_at"] = now();
			$r["updated_at"] = now();
			$regions[] = $r;
		}

		foreach ($regions as $region) {
			DB::table('regions')->insert($region);
		}
	}
}
