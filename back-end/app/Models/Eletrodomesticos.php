<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eletrodomesticos extends Model
{
    use HasFactory;
    
    protected $table;
    protected $fillable = ['nome', 'descricao', 'tensao', 'marca_id'];

    public function marcasRelacionamento()
    {
        return $this->hasOne(Marcas::class, 'id', 'marca_id');
    }

}
