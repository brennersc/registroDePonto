<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PontoModel extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $table = 'ponto_models';

    public $primaryKey = 'id';

    protected $keyType = 'bigInteger';

    protected $dates = ['deleted_at'];

    protected $casts = [
        'id'        => 'integer',
        'data'      => 'date',
        'hora'      => 'datetime:H:i',
        'user_id'   => 'integer'        
    ];

    protected $fillable = [
        'id', 'data', 'hora','user_id'
    ];
}
