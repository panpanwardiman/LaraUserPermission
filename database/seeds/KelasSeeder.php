<?php

use Illuminate\Database\Seeder;
use App\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'name' => '10 A'
        ]);

        Kelas::create([
            'name' => '10 B'
        ]);

        Kelas::create([
            'name' => '10 C'
        ]);
    }
}
