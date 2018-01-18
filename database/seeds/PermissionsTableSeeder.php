<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = (new \DateTime())->format('Y-m-d H:i:s');

        DB::table('permissions')->insert([
            'name' => 'showMenuStyles',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permissions')->insert([
            'name' => 'showMenuItems',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permissions')->insert([
            'name' => 'showMenuProducts',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permissions')->insert([
            'name' => 'createStyle',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permissions')->insert([
            'name' => 'updateStyle',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permissions')->insert([
            'name' => 'deleteStyle',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
    }
}
