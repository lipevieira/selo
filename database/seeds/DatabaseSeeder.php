<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(QuestionTableSeed::class);

        $this->call([
            QuestionTableSeed::class,
            AlternativeTableSeed::class,
            ScheduleActionTableSeeder::class,
            UserTableSeeder::class,
            CompanyClassificationTableSeed::class,
        ]);
        // DB::table('clients')->insert([
        //     'name'  =>  'Empresa-02',
        //     'email'  =>  'empresa02@gmail.com',
        //     'password'  =>  bcrypt('07.052.477/0001-60'),
        // ]);
    }
}
