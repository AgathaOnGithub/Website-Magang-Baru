<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship;

class InternshipSeeder extends Seeder
{
    public function run()
    {
        Internship::create([
            'name' => 'Digital Marketing',
            'description' => ' adalah strategi pemasaran yang menggunakan media digital untuk mempromosikan produk atau layanan. Digital marketing juga dikenal sebagai online marketing atau internet marketing. ',
            'location' => 'Sukabumi',
            'start_date' => now(),
            'end_date' => now()->addMonths(3)
        ]);
    }
}