<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';

    protected $fillable = ['title', 'description', 'image', 'starts', 'brand', 'category', 'price'];

    protected $hidden = ['created_at', 'updated_at'];
}
