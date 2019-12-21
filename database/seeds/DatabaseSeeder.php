<?php
use App\User;

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
        User::create([
            'is_admin' => 1,
            'username' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'address' => 'Yundo Address',
            'postcode' => '2600',
            'contact_phone_number' => '+639059123120',
            'email' => 'adminuser@gmail.com',
            'password' => bcrypt('Rush2019!')
        ]);
    }
}
