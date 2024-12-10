<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    // Defina os campos que são atribuíveis em massa
    protected $fillable = [
        'name', 'cpf', 'email', 'phone', 'address', 'city', 'state', 'active'
    ];

    // O Laravel gerencia automaticamente created_at e updated_at
    public $timestamps = true; // Isso é o padrão, mas você pode adicionar se necessário
}
