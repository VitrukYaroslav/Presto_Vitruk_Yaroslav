<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{


    public function up(): void{
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $categories =[
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
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }

    }



    public function down(): void{
        Schema::dropIfExists('categories');
    }
};
