<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'firstName'         => 'John',
                'lastName'          => 'Algernon',
                'email'             => 'john@email.com',
                'password'          => 'enti',
                'verification_code' => sha1(time()),
                'is_verified'       => 1,
                'created_at'        => new DateTime()
            ]
        );

        factory(User::class, 50)->create();
    }
}
