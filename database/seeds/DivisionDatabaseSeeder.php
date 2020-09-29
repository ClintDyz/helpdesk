<?php

use Illuminate\Database\Seeder;
use App\UserDivision;

class DivisionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            'Office of the Regional Director',
            'Finance Administrative Services',
            'Technical Services Division',
            'Provincial Science and Technology Center'
        ];

        foreach ($divisions as $division) {
            $instanceDiv = new UserDivision;
            $instanceDiv->name = $division;
            $instanceDiv->save();
        }
    }
}
