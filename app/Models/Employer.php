<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    protected $fillable = ['company_name'];

    public function jobOffers(): HasMany
    {
        return $this->hasMany(jobOffer::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
