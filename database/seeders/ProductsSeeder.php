<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // khởi tạo mảng và lấy ra danh sách
        // khóa ngoại từ bảng categories
        $cateID=DB::table('categories')->pluck('id')->toArray();

        $proSeed=[];
        for($i=0;$i<10;$i++){
            $proSeed[]=[
                'name'=>fake()->name(),
                'price'=>fake()->randomNumber(),
                'quantity'=>fake()->randomNumber(),
                'image'=>fake()->image(),
                'category_id'=>fake()->randomElement($cateID),
                'describe'=>fake()->text(),
                'status'=>fake()->numberBetween(0,1),
            ];
        }
        DB::table('products')->insert($proSeed);
    }
}
