<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fkamar extends Model
{
    protected $primaryKey = 'id_fasilitas';
    public $table = 'fasilitaskmr';
    protected $guarded = [];
}
