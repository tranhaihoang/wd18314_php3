<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // cách 1: nhập trực tiếp vào databaseseeder
        // tạo 1 bản ghi
//        DB::table('categories')->insert([
//            'name'=>'kientc',
//            'status'=> 0,
//        ]);

        // tạo 10 bản ghi ngẫu nhiên
        // tạo mảng rỗng
//        $cateSeed = [];
//        for($i=0;$i<10;$i++){
//            $cateSeed[]=[
//                'name'=>fake()->name(),
//                'status'=>fake()->numberBetween(0,1),
//            ];
//        }
//        DB::table('categories')->insert($cateSeed);


        //cách 2: tách thành từng file
        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
