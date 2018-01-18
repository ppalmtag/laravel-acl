<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = (new \DateTime())->format('Y-m-d H:i:s');

        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('roles')->insert([
            'name' => 'Viewer',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('roles')->insert([
            'name' => 'Editor',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('roles')->insert([
            'name' => 'Guest',
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
    }
}
