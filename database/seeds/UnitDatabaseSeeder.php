<?php

use Illuminate\Database\Seeder;
use App\UserUnit;

class UnitDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            'ARD-FAS;2',
            'ARD-TS;3',
            'Accounting;2',
            'Admin;1',
            'Budget;2',
            'CEST;3',
            'CIERDeC;3',
            'CRHRDC;2',
            'DRRM;3',
            'GAD;2',
            'HALAL;3',
            'HR;3',
            'LGIA;3',
            'MIS;1',
            'PSTC-Abra;4',
            'PSTC-Apayao;4',
            'PSTC-Benguet;4',
            'PSTC-Ifugao;4',
            'PSTC-Kalinga;4',
            'PSTC-Mountain Province;4',
            'Planning;1',
            'Property & Supply;2',
            'RML;3',
            'RRDIC;3',
            'RSTL-Chem;3',
            'RSTL-Micro;3',
            'RxBox;3',
            'S&T Promotion;3',
            'Sericulture;3',
            'SETUP;3',
            'STARBOOKS;3',
            'Scholarship;3'
        ];

        foreach ($units as $unit) {
            $expUnit = explode(';', $unit);
            $instanceUnit = new UserUnit;
            $instanceUnit->division = $expUnit[1];
            $instanceUnit->name = $expUnit[0];
            $instanceUnit->save();
        }
    }
}
