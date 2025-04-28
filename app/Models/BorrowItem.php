<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowItem extends Model
{
    protected $fillable = [
        'borrow_request_id',
        'item_id',
        'quantity'
    ];
}
