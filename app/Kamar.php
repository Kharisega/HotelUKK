<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    public $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $guarded = [];
}
