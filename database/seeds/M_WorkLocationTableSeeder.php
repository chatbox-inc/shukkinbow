<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class M_WorkLocationTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_work_location')->insert([
            'id' => 1,
            'location' => 'office',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('m_work_location')->insert([
            'id' => 2,
            'location' => 'remote',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}