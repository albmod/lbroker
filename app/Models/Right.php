<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    protected $table='system_ugrights';

    /**
    •A - add,
    •D - delete,
    •E - edit,
    •S - search/list,
    •P - print/export,
    •I - import,
    •M - admin permission. When advanced permissions are in effect (e.g., Users can see/edit their own records only), this permissions grants access to all records.

     */
    protected $fillable = [
        'TableName',
        'GroupID',
        'AccessMask',
        'Page',
    ];


    public function groups() {

        return $this->belongsToMany(Group::class,'system_ugrights');

    }



}
