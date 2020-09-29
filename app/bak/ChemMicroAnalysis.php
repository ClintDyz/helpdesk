<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChemMicroAnalysis extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_chem_micro_analysis';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'authorized',
        'analysis_type',
        'sample',
        'param_test',
        'test_method',
        'fee',
        'info'
    ];
}
