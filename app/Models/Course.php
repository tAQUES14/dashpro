<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{

    use HasFactory, AuditingAuditable;

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
