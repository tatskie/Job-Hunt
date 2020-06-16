<?php

namespace App;

use App\Job;
use App\Post;
use App\Work;
use App\Reply;
use App\Skill;
use App\Company;
use App\Message;
use App\Education;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $table ='users';
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_initial', 'date_of_birth', 'contact', 'address', 'city', 'country', 'gender', 'avatar', 'email', 'verified', 'password', 'provider', 'provider_id', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //age
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }
    //set name to lowercase
    public function setNameAttribute($first_name)
    {
        $this->attributes['first_name'] = strtolower($first_name);
    }

    //set name to uppercase
    public function getNameAttribute($first_name)
    {
        return ucwords($first_name);
    }

    //set email to lowercase
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    //verify user
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    //set user to admin
    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function sender()
    {
        return $this->hasMany(Message::class);
    }

    public function reciever()
    {
        return $this->hasMany(Message::class);
    }
}
