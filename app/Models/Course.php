<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //indicar o nome da tabela

    protected $table = 'courses';

    //indicar o nome da tabela
    protected $fillable =['name'];
}
