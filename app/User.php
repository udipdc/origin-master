<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    protected $guard_name = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

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

    protected $dates = ['deleted_at'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function BlastEmail()
    {
        return $this->hasMany('App\BlastEmail','recruiter_id','id');
    }

    public function RequriterNotification()
    {
        return $this->hasMany('App\Notification','recruiter_id','id');
    }

    public function AdminNotification()
    {
        return $this->hasMany('App\Notification','admin_id','id');
    }

    public function ImportNurseData()
    {
        //return $this->hasMany('App\ImportNurseData','recruiter_id','id');
        return $this->hasMany('App\ImportNurseData','recruiter_id','id');
    }

    public function ClientCoverSheet()
    {
        return $this->hasMany('App\ClientCoverSheet','create_by','id');
    }

    /*start header logo name set time use.*/
        public static function separate_contact_name($contact_name)
        {
            $separate = explode(" ", $contact_name);
            $letters = "";
            foreach($separate as $value)
            {
                $letters .= mb_strtoupper(mb_substr($value, 0, 1));
            }
            return $letters;
        }
    /*end header logo name set time use.*/

}
