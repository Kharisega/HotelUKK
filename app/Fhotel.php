<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fhotel extends Model
{
    protected $primaryKey = 'id_fasilitas';
    public $table = 'fasilitashtl';
    protected $guarded = [];
}
