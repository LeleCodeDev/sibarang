<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrower_id',
        'operator_id',
        'status',
        'request_date',
        'return_date'
    ];

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }

    public function operator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function requestItems(): HasMany
    {
        return $this->hasMany(BorrowItem::class);
    }
}
