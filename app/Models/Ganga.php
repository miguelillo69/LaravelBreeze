<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganga extends Model
{
    use HasFactory;
    protected $table = 'gangas';

    protected $fillable = ['title', 'description','price', 'category', 'price_sale', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria() {
        return $this->belongsTo(Category::class, 'category');
    }
}
