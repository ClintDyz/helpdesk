<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model {
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_menus';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order',
        'slug',
        'name',
        'description',
        'photo',
        'sub_menus',
        'created_by',
    ];

    public function creator() {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
