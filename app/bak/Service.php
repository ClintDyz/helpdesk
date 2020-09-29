<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_services';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'division_id',
        'unit_owner',
        'authorized',
        'title',
        'description',
        'office_division',
        'classification',
        'transaction_type',
        'who_avail',
        'disp_picture'
    ];
}
