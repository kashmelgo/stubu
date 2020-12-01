<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homefeed extends Model
{
    use HasFactory;

    public function thread(){
        return $this->hasmany(Thread::class);
    }

}
