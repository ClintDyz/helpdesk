<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckListReq extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_checklist_req';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'services_id',
        'requirements',
        'where_secure'
    ];
}
