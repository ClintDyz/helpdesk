<?php

use Illuminate\Database\Seeder;
use App\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instanceUser = new User;
        $instanceUser->firstname = 'Admin';
        $instanceUser->middlename = 'Admin';
        $instanceUser->lastname = 'Admin';
        $instanceUser->position = 'MIS';
        $instanceUser->division = 1;
        $instanceUser->unit = 14;
        $instanceUser->mobile_no = '+639062888586';
        $instanceUser->email = 'admin@admin.com';
        $instanceUser->username = 'admin';
        $instanceUser->password = bcrypt('admin');
        $instanceUser->role = 'admin';
        $instanceUser->is_active = 'y';
        $instanceUser->save();
    }
}
