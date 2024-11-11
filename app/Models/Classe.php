<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Classe extends Model implements Auditable
{

    use HasFactory, AuditingAuditable;

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
