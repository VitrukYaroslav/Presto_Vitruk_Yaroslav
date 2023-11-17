<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

  public function run(): void{$categorys = [
        "Abbigliamento", 
        "Tecnologia",
        "Make-up",
        "Beauty",
        "Arredamento",
        "Musica",
        "Libri",
        "Gaming",
        "Oggettistica",
        "Auto e Moto",
        "Giochi e Prima Infanzia"
    ];

        foreach ($categorys as $category){
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
