<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //indicar o nome da tabela

    protected $table = 'courses';

    //indicar o nome da tabela
    protected $fillable = ['name', 'price'];

    //criar relacionamento entre um e muitos
    public function classe()
    {
        return $this->hasMany(Classe::class);
    }
}
