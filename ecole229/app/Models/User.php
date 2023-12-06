<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTime;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firsname',
        "lastname",
        'email',
        'password',
        "email_verified",
        "verify_at",
        "birthday",
        "avatar"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }

    public function getFullnameAttribute(){
        return $this->firsname.''.$this->lastname;
    }

    public function getAgeAttribute(){
       if($this->birthday) {
        $date_birthday = new DateTime($this->birthday);
        $date_now = new DateTime();
        $cal = $date_now -> diff($date_birthday);
        return $cal->y;
       }
       return 0;
    }
    //scoop
    public function scopeActive($query, $status){
        $query->where('email_verified', $status);
    }

    //faire plusieurs actions
    protected static function booted(){
        static::created(function($user){
            $user->update(['email_verified'=> true]);
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table= "users";
}
