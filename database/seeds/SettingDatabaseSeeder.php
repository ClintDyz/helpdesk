<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instanceSetting = new Setting;
        $instanceSetting->agency_name = 'Department of Science and Technology - Cordillera Administrative Region';
        $instanceSetting->abbrev = 'DOST-CAR';
        $instanceSetting->address = 'Km.6 BSU Compound La Trinidad, Benguet';
        $instanceSetting->website = 'car.dost.gov.ph';
        $instanceSetting->save();
    }
}
