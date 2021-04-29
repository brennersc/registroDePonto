<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncionarioModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'funcionario_models';

    public $primaryKey = 'id';

    protected $keyType = 'bigInteger';

    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'id'        => 'integer',
        'cpf'       => 'string',
        'cargo'     => 'string',
        'nascimento'    => 'date',
        'cep'       => 'string',
        'rua'       => 'string',
        'bairro'    => 'string',
        'cidade'    => 'string',
        'estado'    => 'string',
        'user_id'   => 'integer',
        'admin_id'   => 'integer'
        
    ];

    protected $fillable = [
        'id', 'cpf', 'cargo', 'nascimento', 'cep', 'rua', 'bairro',
        'cidade','estado','user_id','admin_id'
    ];
}
