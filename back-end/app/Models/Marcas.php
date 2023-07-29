<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;
    
    protected $table;
    protected $fillable = ['id', 'nome'];

    public function eletrodomesticosRelacionamento()
    {
        return $this->hasMany(Eletrodomesticos::class, 'marca_id', 'id');
    }
}
