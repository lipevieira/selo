<?php

use Illuminate\Database\Seeder;

class ScheduleActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule_actions')->insert([
            [
                'description' => 'Acolher os colaboradores que passam por situações de discriminação',
                'weight' => '8',
            ],[
                'description' => 'Analisar os riscos estratégicos, financeiros, regulatórios,  operacionais ou reputacionais relacionados às questões raciais	',
                'weight' => '10',
            ],[
                'description' => 'Apoiar ou desenvolver projetos de valorização da diversidade étnico-racial  ',
                'weight' => '6',
            ],[
                'description' => 'Aplicar Política de contratação de colaboradores negros (as) ',
                'weight' => '8',
            ],[
                'description' => 'Apresentar uma política de e/ou programa de equidade racial de forma transversal e integrada com as demais políticas da empresa ',
                'weight' => '8',
            ],[
                'description' => 'Avaliar o impacto de suas ações de promoção da igualdade racial na geração de valor para o negócio	',
                'weight' => '8',
            ],[
                'description' => 'Capacitar gestores e equipes nos temas de diversidade e igualdade de oportunidades para evitar os preconceitos conscientes – e os inconscientes também.	',
                'weight' => '3',
            ],[
                'description' => 'Comprometer alta liderança com a questão da promoção racial',
                'weight' => '8',
            ],[
                'description' => 'Considerar que a promoção da equidade racial é um fator que pode diferenciá-la no     mercado	',
                'weight' => '7',
            ],[
                'description' => 'Criação de ouvidoria	',
                'weight' => '7',
            ],[
                'description' => 'Criar comitê gestor ',
                'weight' => '4',
            ],[
                'description' => 'Criar oportunidade para Ascenção de negros e negras na organização',
                'weight' => '6',
            ],[
                'description' => 'Cuidar da comunicação externa para que as campanhas publicitárias não tenham vieses de discriminação	',
                'weight' => '3',
            ],[
                'description'=> 'Dar oportunidades para inclusão de negros e negras em posições gerenciais e executivas',
                'weight'  => '8',
            ],[
                'description' => 'Desenvolver ou apoiar programas educacionais para seus funcionários negros e negras dentro ou fora da organização ',
                'weight'  => '6',
            ],[
                'description' => 'Divulgação externa do Selo da Diversidade Étnico-Racial;',
                'weight'  => '4',
            ],
            [
                'description' => 'Divulgar internamente o Selo da Diversidade Étnico-Racial;',
                'weight'  => '1',
            ],[
                'description' => 'Elaborar políticas afirmativas com metas e ações planejadas',
                'weight'  => '8',
            ],[
                'description' => 'Envolver empregados de diferentes áreas e etnias no diálogo e nas ações para a promoção da equidade racial	',
                'weight'  => '5',
            ],[
                'description' => 'Estabelecer missão, compromissos e valores que incorporem os temas de inclusão.',
                'weight'  => '2',
            ],[
                'description' => 'Estimular e divulgar externamente a valorização da diversidade étnico-racial com fornecedores, clientes, comunidades, etc.',
                'weight'  => '9',
            ],[
                'description' => 'Estimular seu setor de atividade a se envolver na promoção da equidade racial  ',
                'weight'  => '9',
            ],[
                'description' => 'Estimular seus fornecedores ou parceiros comerciais a adotar a promoção da equidade racial	',
                'weight'  => '9',
            ],[
                'description' => 'Exigir em contrato que a legislação que proíbe a discriminação de raça e de gênero no ambiente de trabalho seja cumprida por seus fornecedores',
                'weight'  => '10',
            ],[
                'description' => 'Fazer diagnósticos de sua cultura organizacional para conhecer os gargalos ou barreiras para a promoção da equidade racial',
                'weight'  => '8',
            ],[
                'description' => 'Incentivar a contratação de jovens aprendizes e estagiários negros e negras;',
                'weight'  => '5',
            ],[
                'description' => 'Incentivar a qualificação profissional de colaboradores negros e negras',
                'weight'  => '6',
            ],[
                'description' => 'Incluir no estatuto (ou documento equivalente) a política de valorização da diversidade étnico-racial;',
                'weight'  => '1',
            ],[
                'description' => 'Inserir no planejamento estratégico a Promoção da Equidade racial',
                'weight'  => '8',
            ],[
                'description' => 'Levar em consideração as necessidades dos consumidores e clientes em sua diversidade racial, cultural.',
                'weight'  => '7',
            ],[
                'description' => 'Monitorar a equidade racial desde os cadastros de recrutamento, seleção e ingresso',
                'weight'  => '8',
            ],[
                'description' => 'Patrocinar ou elaborar projetos que visem à valorização da diversidade na cidade',
                'weight'  => '9',
            ],[
                'description' => 'Privilegiar a contratação de fornecedores que tenham compromisso em combater o racismo e promover a equidade racial	',
                'weight'  => '10',
            ],[
                'description' => 'Promover ações e campanhas internas de sensibilização para um ambiente inclusivo',
                'weight'  => '3',
            ],[
                'description' => 'Realizar análise e estudo anual dos diagnósticos censitários ( Censo )',
                'weight'  => '3',
            ],[
                'description' => 'Realizar pesquisas com seus colaboradores em relação a satisfação e percepção de igualdade de oportunidades, considerando a questão racial	',
                'weight'  => '6',
            ],[
                'description' => 'Ter projetos e/ou programas de formação de jovens para Inclusão econômica	',
                'weight'  => '7',
            ],[
                'description' => 'Utilização de negros e negras no marketing da empresa.',
                'weight'  => '5',
            ],[
                'description' => 'Utilizar as informações de políticas e práticas da equidade racial como um dos critérios de avaliação de seus fornecedores ',
                'weight'  => '10',
            ]
        ]);
    }
}
