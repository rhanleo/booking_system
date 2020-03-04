<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    public $table = 'packages';

    protected $fillable = [
        'package_uuid', 'vendor_uuid', 'package_name', 'package_description', 'rates','is_live'
    ];

}
