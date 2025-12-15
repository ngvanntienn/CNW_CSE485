<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Review extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'user_id', 'rating' , 'review_text' ,'review_date'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
