<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyClassificationTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_classifications')->insert([
            [
                'type'  =>  'Micro(5 a 9 funcionários)',
            ],
            [
                'type'  =>  'Pequena(10 a 12 funcionários)',
            ],
            [
                'type'  =>  'Pequena(13 a 49 funcionários)',
            ],
            [
                'type'  =>  'Média(50 a 99 funcionários)',
            ],
            [
                'type'  =>  'Grande (+ de 100 funcionários)',
            ],
            [
                'type'  =>  'ENTIDADE SEM FINS LUCRATIVOS QUE LUTA PELA VALORIRAÇÃO DA DIVERSIDADE?',
            ],
    
        ]);
    }
}
