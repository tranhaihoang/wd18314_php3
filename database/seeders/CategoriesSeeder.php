<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tạo 1 bản ghi
//        DB::table('categories')->insert([
//            'name'=>'kientc@',
//            'status'=> 1,
//        ]);

        // tạo 10 bản ghi ngẫu nhiên
        // tạo mảng rỗng
        $cateSeed = [];
        for($i=0;$i<10;$i++){
            $cateSeed[]=[
                'name'=>fake()->name(),
                'status'=>fake()->numberBetween(0,1),
            ];
        }
        DB::table('categories')->insert($cateSeed);
    }
}
