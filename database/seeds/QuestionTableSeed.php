<?php

use Illuminate\Database\Seeder;

class QuestionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'name' => '1) A organização possui uma política interna de valorização da Diversidade Étnico-Racial aprovada pela direção?',
                'field_option' => 'NAO',
            ], [
                'name' => '2) Caso tenha, mesmo que não estabelecida formalmente, ou esteja em fase de implantação, esta política de  valorização da Diversidade Étnico-Racial é de conhecimento em quais níveis da organização?',
                'field_option' => 'NAO',
            ], [
                'name' => '3) Os funcionários são informados sobre seus indicadores, resultados e procedimentos adotados na gestão?',
                'field_option' => 'NAO',
            ], [
                'name' => '4) A direção da organização monitora e avalia periodicamente as políticas de valorização da Diversidade      Étnico-Racial adotadas?	',
                'field_option' => 'NAO',
            ], [
                'name' => '5) Há algum registro documentado desse monitoramento e avaliação?',
                'field_option' => 'NAO',
            ], [
                'name' => '6) Existe, na organização, algum departamento, área ou funcionário formalmente responsável para tratar do tema da Diversidade Étnico-Racial?',
                'field_option' => 'NAO',
            ], [
                'name' => '7) Existe na organização, nos espaços de discussão e diálogo, algum instrumento de validação ou legitimação   das políticas de Diversidade Étnico-Racial?',
                'field_option' => 'SIM',
            ], [
                'name' => '8) Os requisitos de Diversidade Étnico-Racial e equidade são considerados nos processos de contratação de     mão-de-obra terceirizada e na cadeia de fornecimento?',
                'field_option' => 'NAO',
            ], [
                'name' => '9) Nas ações de publicidade e propaganda da organização é realizada uma análise para evitar ações           discriminatórias e valorizar a diversidade e a equidade na sociedade?   ',
                'field_option' => 'NAO',
            ], [
                'name' => '10) A organização possui outra política da diversidade?',
                'field_option' => 'SIM',
            ]
        ]);
    }
}
