<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(User::where('email', 'kris@kris.net')->first())) {
            $user = new User([
                'name' 		=> 'Admin',
                'email'     => 'kris@kris.net',
                'password'  => bcrypt('YMpOOny4lGveRn'),
            ]);
            $user->is_admin = true;
            $user->save();
        }
    }
}
