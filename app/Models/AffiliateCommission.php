<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'value',
        'date',
    ];


    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
