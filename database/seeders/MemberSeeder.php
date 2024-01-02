<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'province' => 'AGADIR IDA-OUTANANE',
                'fullName' => 'Ramy Mohamed',
                'groupe' => 'AGA 6',
                'secteur' => 'Services',
                'mobile' => '630291186',
                'email' => 'Ramymed99@gmail.com',
                'legalStatus' => 'Création Hors MBGA',
                'startActivity' => Carbon::create ('09/05/2016'),
                'creationProcedure' => 'N/A'
            ],
            [
                'province' => 'AGADIR IDA-OUTANANE',
                'fullName' => 'FATNI Abdelilah',
                'groupe' => 'AGA 5',
                'secteur' => 'Commerce & Distribution',
                'mobile' => '639647034',
                'email' => 'contact@smart-mecanica.ma',
                'legalStatus' => 'En cours',
                'startActivity' => null,
                'creationProcedure' => 'N/A'
            ],
            [
                'province' => 'TIZNIT',
                'fullName' => 'FATNI Abdelilah',
                'groupe' => 'TIZ 3',
                'secteur' => 'Agriculture',
                'mobile' => '778919376',
                'email' => 'juvenalgonepaul@gmail.com',
                'legalStatus' => 'En cours',
                'startActivity' => null,
                'creationProcedure' => 'N/A'
            ],
            [
                'province' => 'TIZNIT',
                'fullName' => 'AGADIR IDA-OUTANANE',
                'groupe' => 'AGA 7',
                'secteur' => 'Digital',
                'mobile' => '0606196089',
                'email' => 'abdessamadrahmouni@gmail.com',
                'legalStatus' => 'Création Hors MBGA',
                'startActivity' => Carbon::create('01/01/2021'),
                'creationProcedure' => 'N/A'
            ],
        ]);
    }
}
