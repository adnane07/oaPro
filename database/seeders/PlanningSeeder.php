<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\planning;


class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        planning::create([
            'heureDepart'=> '08',
            'heureFin'=>'09',
            'prix'=> '150',
            
        ]);
    }
}
