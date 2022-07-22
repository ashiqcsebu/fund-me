<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([

            [
                'name' => 'Admin 1',
                'email' => 'admin@gmail.com',
                'role' => '1',
                'ic' => '123',
                'phone' => '60114303345',
                'address' => 'Kajang,Malaysia',
                'user_status' => '1',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User  1',
                'email' => 'user1@gmail.com',
                'role' => '0',
                'ic' => '1234',
                'phone' => '60114303345',
                'address' => 'Kajang,Malaysia',
                'user_status' => '1',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User  2',
                'email' => 'user2@gmail.com',
                'role' => '0',
                'ic' => '12345',
                'phone' => '60114303345',
                'address' => 'Kajang,Malaysia',
                'user_status' => '1',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
//            [
//                'name' => 'Uniten 1',
//                'email' => 'uniten1@gmail.com',
//                'role' => '2',
//                'university_id' => '1',
//                'ic' => '123456',
//                'phone' => '60114303345',
//                'address' => 'Kajang,Malaysia',
//                'user_status' => '1',
//                'password' => bcrypt('123456'),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],
//            [
//                'name' => 'Uniten  2',
//                'email' => 'uniten2@gmail.com',
//                'role' => '2',
//                'university_id' => '1',
//                'ic' => '1234567',
//                'phone' => '60114303345',
//                'address' => 'Kajang,Malaysia',
//                'user_status' => '1',
//                'password' => bcrypt('123456'),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],

        ]);
    }
}
