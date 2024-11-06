<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaSu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rating',
        'review_count',
        'fee',
        'area',
        'post_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
