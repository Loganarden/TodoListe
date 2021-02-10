<?php

namespace Database\Seeders;

use App\Models\Tache;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('taches')->insert([
           'titre' => Str::random(15),
           'description' => Str::random(200),
           'date' => Carbon::now()->format('Y-m-d'),
       ]);
    }
}
