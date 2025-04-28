<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    protected $fillable = [
        'borrower_id',
        'operator_id',
        'status',
        'request_date',
        'return_date'
    ];
}
