<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GMember extends Model
{
    protected $table='system_ugmembers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'UserName','GroupID ','Provider'
    ];

//    public function users() {
//
//        return $this->hasMany(GroupMember::class, 'UserName', 'username');
//
//    }


    public function groups() {


        return $this->belongsTo(Group::class, 'GroupID', 'GroupID');

    }

}
