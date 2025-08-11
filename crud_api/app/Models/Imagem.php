<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;
    protected $fillable = ['name, path , user,'];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
