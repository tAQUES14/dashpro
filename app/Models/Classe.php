<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
  //indicar o nome da tabela

  protected $table = 'classes';

  //indicar o nome da tabela
  protected $fillable = ['name', 'description', 'order_classe', 'course_id'];

  //criar relacionamento de um pra muitos
  public function course () 
  {
    return $this->belongsTo(Course::class);
  }
}
