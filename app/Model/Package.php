<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{

    use SoftDeletes;
    // public function package(){
    //     return $this->belongsTo(Package::class,'package_id','id');
    // }
}
