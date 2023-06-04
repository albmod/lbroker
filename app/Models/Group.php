<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table='system_uggroups';
    protected $primaryKey = 'GroupID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Label',
        'Provider',
        'password',
    ];


//    public function rights() {
//
//        return $this->belongsToMany(Right::class,'system_ugrights');
//
//    }
    public function rights() {

        return $this->hasMany(Right::class, 'GroupID', 'GroupID');

    }

}
