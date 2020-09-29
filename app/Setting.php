<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_settings';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agency_name',
        'abbrev',
        'logo',
        'address',
        'contact_no',
        'website',
        'email',
        'background',
        'vision',
        'mandate',
        'mission'
    ];
}
