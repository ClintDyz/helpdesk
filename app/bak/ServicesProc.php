<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesProc extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_services_proc';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'services_id',
        'proccess_name'
    ];
}
