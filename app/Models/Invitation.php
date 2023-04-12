<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    public function comapny(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [
        'employer_name',
        'email',
        'status',
        'company_id',
        'token',
        'admin_id',
    ];

}
