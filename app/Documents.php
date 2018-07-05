<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'document';
    protected $fillable = [
        'autor',
        'titulo',
        'd_creacion',
        'version',
        'Documento'
    ];

    public $timestamps = false;
}
