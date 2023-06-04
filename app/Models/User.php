<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table='members';
    protected $primaryKey = 'member_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'userpic',

        'last_access'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //return $this->belongsToMany('App\Role', 'my_custom_join_table', 'comment_key', 'role_key');




    public function groups() {

        return $this->hasMany(GMember::class, 'UserName', 'username');

    }








//    public function hasRight($username,$table,$right) {
//
//
//        $user=\App\Models\User::where('username',$username)->first();
//        $related = new Collection();
//        foreach($user->groups as $group)
//        {
//            $related = $related->merge(tables($group->GroupID,$table));
//
//        }
//
//
//        $filteredCollection = $related->filter(function ($item) use ($right) {
//            return stripos($item, $right) !== false;
//        });
//
//        if(count($filteredCollection)>0)  return true ;
//        else return false;
//
//
//
//    }



}
