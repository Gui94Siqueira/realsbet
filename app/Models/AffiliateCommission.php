<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via atribuição em massa
    protected $fillable = [
        'affiliate_id', // ID do afiliado
        'value',        // Valor da comissão
        'date',         // Data da comissão
        'observations', // Observações sobre a comissão
    ];

    /**
     * Define o relacionamento com o modelo Affiliate.
     * Cada comissão pertence a um afiliado.
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
