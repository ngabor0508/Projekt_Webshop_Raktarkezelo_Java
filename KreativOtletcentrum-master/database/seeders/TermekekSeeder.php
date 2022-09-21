<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Termekek;

class TermekekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {  
        $csvFile = fopen(base_path("database/seeders/data.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Termekek::create([
                    "kodszam" => $data['0'],
                    "name" => $data['1'],
                    "price" => empty($data['2']) ? 0 : $data['2'],
                    "quantity" => $data['3'],
                    "url" => $data['4'],
                    "kategoria" => $data['5']

                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
        // $termekek=[
        // [
        //     'name' => 'Samsung Galaxy',
        //     'price' => 1000,
        //     'kodszam'=> 'saaas'
        // ],
        // [
        //     'name' => 'Samsung Galaxy4',
        //     'price' => 10001,
        //     'kodszam'=> 'saasa'
        // ],
        // [
        //     'name' => 'Samsung Galaxy3',
        //     'price' => 100002,
        //     'kodszam'=> 'saaad'
        // ],
        // [
        //     'name' => 'Samsung Galaxy2',
        //     'price' => 10001,
        //     'kodszam'=> 'saaxa'
        // ]
        // ];

        // foreach ($termekek as $key => $value) {
        //     Termekek::create($value);
        // }
        
    }
}
