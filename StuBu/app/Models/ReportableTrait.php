<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait ReportableTrait
{

    public function reports()
    {
        return $this->morphMany(Comment::class,'commentable')->latest();
    }

}
