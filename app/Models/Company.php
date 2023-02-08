<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'commission_rate',
        'name'
    ];

    public function sellers(): HasMany
    {
        return $this->hasMany(Seller::class);
    }
}
