<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\abzagencyController;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(abzAgencySeeder::class);
    }
}

class abzAgencySeeder extends Seeder
{

    public function generateName(){
        $starts = ['Airic', 'Dylan', 'Ryan', 'Omar', 'Sarah', 'Jamal', 'Arnold',
            'Ebrina', 'Herwin', 'Joseph', 'Bethany', 'Simon', 'Adam', 'Rose', 'Samuel', 'Andrew', 'Selina',
            'Christopher', 'Dilip', 'Alicia', 'Beryl', 'Alonzo', 'Mia', 'Gabriel', 'Ivan', 'Anna', 'Boris',
            'Patrick', 'Veronika', 'Cordelia', 'Akay', 'Ayla', 'Nourhan', 'Loyd', 'Lindsay', 'Jason', 'Al', 'Esther',
            'Hannibal', 'Eric', 'Helga', 'Sveinbjоrn', 'Jaspen', 'Roxy', 'Xerxes', 'Federico', 'Dolores', 'Elvis',
        ];

        # Массив окончаний
        $ends = ['Wilson','Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White',
            'Harris','Martin', 'Thompson', 'Garcia', 'Martinez', 'Robinson', 'Clark', 'Rodriguez',
            'Lewis','Lee', 'Walker', 'Hall', 'Allen', 'Young', 'Hernandez', 'King', 'Wright',
            'Lopez', 'Hill','Scott', 'Green', 'Adams', 'Baker', 'Gonzalez', 'Nelson', 'Carter', 'Mitchell', 'Perez', 'Roberts', 'Turner',
            'Phillips', 'Campbell', 'Parker', 'Evans', 'Edwards', 'Collins'
        ];
        $name = $starts[array_rand($starts)] .' '. $ends[array_rand($ends)];
        return $name;
    }

    public function run()
    {
        DB::table('employee_models')->delete();

        DB::table('employee_models')->insert([
            'full_name' => $this->generateName(),
            'position' => 'director',
            'employment_date' => date("Y-m-d"),
            'salary' => 100000,
            'boss_id'=> 0
        ]);

        for($i=0;$i<50;$i++) {
            DB::table('employee_models')->insert([
                'full_name' => $this->generateName(),
                'position' => 'sub-director',
                'employment_date' => date("Y-m-d"),
                'salary' => ceil(rand(500, 10000)),
                'boss_id'=> 1
            ]);
        }

        for($j=2;$j<=51;$j++) {
            for ($i = 0; $i < 100; $i++) {
                DB::table('employee_models')->insert([
                    'full_name' => $this->generateName(),
                    'position' => 'Project Manager',
                    'employment_date' => date("Y-m-d"),
                    'salary' => ceil(rand(500, 10000)),
                    'boss_id' => $j
                ]);
            }
        }

        for($j=52;$j<=5051;$j++) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('employee_models')->insert([
                    'full_name' => $this->generateName(),
                    'position' => 'Team-lead',
                    'employment_date' => date("Y-m-d"),
                    'salary' => ceil(rand(3000, 4000)),
                    'boss_id' => $j
                ]);
            }
        }

        for($j=5052;$j<=15051;$j++) {
            DB::table('employee_models')->insert([
                'full_name' => $this->generateName(),
                'position' => 'Senior',
                'employment_date' => date("Y-m-d"),
                'salary' => ceil(rand(2500, 3800)),
                'boss_id' => $j
            ]);
        }

        for($j=15052;$j<=25051;$j++) {
            DB::table('employee_models')->insert([
                'full_name' => $this->generateName(),
                'position' => 'Middle',
                'employment_date' => date("Y-m-d"),
                'salary' => ceil(rand(1500, 2000)),
                'boss_id' => $j
            ]);
        }

        for($j=25052;$j<=35051;$j++) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('employee_models')->insert([
                    'full_name' => $this->generateName(),
                    'position' => 'Junior',
                    'employment_date' => date("Y-m-d"),
                    'salary' => ceil(rand(500, 1000)),
                    'boss_id' => $j
                ]);
            }
        }
    }
}