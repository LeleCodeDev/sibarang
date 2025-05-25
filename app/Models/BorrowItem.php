<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_request_id',
        'item_id',
        'quantity'
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function borrowRequest() {
        return $this->belongsTo(borrowRequest::class);
    }
}
