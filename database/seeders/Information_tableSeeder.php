<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Information_tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('information_tables')->insert([
            'sentence_number' => 1,
            'annai_type' => 1,
            'annai_title' => "お知らせテスト 01（表題）",
            'Start_date' => "20220616",
            'End_date' => "20220701",
            'Start_time' => "1800",
            'End_time' => "800",
            'annai_test' => "お知らせ文章お知らせ文章お知らせ
                        文章お知らせ文章",
            'touroku_person' => '',
            'touroku_Terminal' => '',
            'kousin_person' => '',
            'kousin_Terminal' => '',
            'kousin_num' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
