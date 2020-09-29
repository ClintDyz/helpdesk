<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesProcNote extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_services_proc_note';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'services_id',
        'srv_proc_id',
        'note'
    ];
}
