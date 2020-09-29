<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesProcItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_services_proc_itm';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'services_id',
        'srv_proc_id',
        'client_step',
        'agency_action',
        'fee',
        'proc_time',
        'respond_person',
    ];
}
