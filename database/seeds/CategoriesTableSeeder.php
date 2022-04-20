<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Medicina d’emergenza-urgenza',
            'Geriatria',
            'Medicina dello sport e dell’esercizio fisico',
            'Oncologia medica',
            'Medicina di comunità e delle cure primarie',
            'Allergologia e immunologia clinica',
            'Dermatologia e venereologia',
            'Ematologia',
            'Endocrinologia e malattie del metabolismo',
            'Scienza dell’alimentazione',
            'Malattie dell’apparato digerente',
            'Malattie dell’apparato cardiovascolare',
            'Malattie dell’apparato respiratorio',
            'Malattie infettive e tropicali',
            'Nefrologia',
            'Reumatologia',
            'Neurologia',
            'Psichiatria',
            'Ginecologia e Ostetricia',
            'Pediatria',
            'Medicina estetica',
        ];

        foreach ($categories as $category) {
            $new_category = new Category();

            $new_category->name = $category;

            $new_category->save();
        }
    }
}
