<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = [
        'user_id',
        'tour_id',
        'rating',
        'comment',

    ];

    // Các quan hệ với các mô hình khác có thể được định nghĩa ở đây
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
