<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clients')->insert(
                [
                    'title' => 'mr ',
                    'name' => 'Srikar',
                    'last_name' => 'potu',
                    'address' => 'icici street',
                    'zip_code' => '500090',
                    'city' => 'mancherial',
                    'state' => 'TS',
                    'email' => 'spotu16@gmail.com',            
                ]
                );
         DB::table('clients')->insert(
                [
                    'title' => 'mrs',
                    'name' => 'srilatha',
                    'last_name' => 'potu',
                    'address' => 'xyz street',
                    'zip_code' => '500090',
                    'city' => 'chennur',
                    'state' => 'ts',
                    'email' => 'srilathag@gmail.com',            
                ]
                );
    }
}
