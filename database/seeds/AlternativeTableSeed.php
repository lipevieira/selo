<?php

use Illuminate\Database\Seeder;

class AlternativeTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alternatives')->insert([
            [
                'alternative' => '(a) Sim',
                'question_id' =>'1',
            ],[
                'alternative' => '(b) Existe, porém ainda não está estabelecida formalmente',
                'question_id' => '1',
            ],[
                'alternative' => '(c) Em fase de implantação',
                'question_id' => '1',
            ],[
                'alternative' => '(d) Não existe',
                'question_id' => '1',
            ],[
                'alternative' => '(a) Somente o nível OPERACIONAL tem acesso;',
                'question_id' => '2',
            ],[
                'alternative' => '(b) Somente os níveis SUPERVISÃO e GERÊNCIA/ CHEFIA tem acesso;',
                'question_id' => '2',
            ],[
                'alternative' => '(c) Somente nível de DIREÇÃO tem acesso;',
                'question_id' => '2',
            ],[
                'alternative' => '(d) Todos os funcionários têm acesso.',
                'question_id' => '2',
            ],[
                'alternative' => '(a) Sim',
                'question_id' => '3',
            ],[
                'alternative' => '(b) Não',
                'question_id' => '3',
            ],[
                'alternative' => '(a) Sim',
                'question_id' => '4',
            ],[
                'alternative' => '(b) Não',
                'question_id' => '4',
            ],[
                'alternative' => '(a) Sim',
                'question_id' => '5',
            ],[
                'alternative' => '(b) Não',
                'question_id' => '5',
            ],[
                'alternative' => '(a) SIm',
                'question_id' => '6',
            ],[
                'alternative' => '(b) Não',
                'question_id' => '6',
            ],[
                'alternative' => '(a) Código de ética',
                'question_id' => '7',
            ],[
                'alternative' => '(b) Programa de Diversidade',
                'question_id' => '7',
            ],[
                'alternative' => '(c) Não existe',
                'question_id' => '7',
            ],[
                'alternative' => '(d) Outros:',
                'question_id' => '7',
            ],[
                'alternative' => '(a) Sim:',
                'question_id' => '8',
            ],[
                'alternative' => '(b) Não:',
                'question_id' => '8',
            ],[
                'alternative' => '(a) Sim',
                'question_id' => '9',
            ],[
                'alternative' => '(b) Não:',
                'question_id' => '9',
            ],[
                'alternative' => '(a) Sim:',
                'question_id' => '10',
            ],[
                'alternative' => '(b) Não:',
                'question_id' => '10',
            ]
        ]);
    }
}
