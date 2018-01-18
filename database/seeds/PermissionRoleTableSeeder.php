<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = (new \DateTime())->format('Y-m-d H:i:s');

        // Admin
        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 3,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 4,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 5,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 6,
            'role_id' => 1,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);

        // Viewer

        DB::table('permission_role')->insert([
            'permission_id' => 3,
            'role_id' => 2,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);

        // Editor

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 3,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 3,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 3,
            'role_id' => 3,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => 5,
            'role_id' => 3,
            'created_at' => $dt,
            'updated_at' => $dt,
        ]);
    }
}
