<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cc_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'firstname',
        'middlename',
        'lastname',
        'position',
        'division_id',
        'unit',
        'mobile_no',
        'email',
        'username',
        'password',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function division() {
        return $this->hasOne('App\UserDivision', 'id', 'division');
    }

    public function unit() {
        return $this->hasOne('App\UserUnit', 'id', 'unit');
    }

    public function getEmployee($id) {
        $userData = User::find($id);

        if ($userData) {
            $firstname = $userData->firstname;
            $middleInitial = !empty($userData->middlename) ?
                            ' '.$userData->middlename[0].'. ' : ' ';
            $lastname = $userData->lastname;
            $fullname = $firstname.$middleInitial.$lastname;
            $position = $userData->position;
            //$signature = $userData->signature;

            /*
            $groups = !empty($userData->groups) ?
                      unserialize($userData->groups) :
                      [];
            $roles = !empty($userData->roles) ?
                     unserialize($userData->roles) :
                     [];*/
        } else {
            $fullname = NULL;
            $position = NULL;
            //$signature = NULL;
            //$groups = [];
            //$roles = [];
        }

        return (object) [
            'name' => $fullname,
            'position' => $position,
            //'signature' => $signature,
            //'groups' => $groups,
            //'roles' => $roles,
        ];
    }
}


