<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChemMicroSched extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_chem_micro_sched';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sample_accept',
        'remarks',
        'tel_no',
        'telefax',
        'mobile_no',
        'email'=>'null',
    ];
}
