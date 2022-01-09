<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable=["reasons","status"];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
