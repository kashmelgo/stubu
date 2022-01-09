<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use CommentableTrait, LikeableTrait;

    protected $fillable=['body','user_id'];

    use HasFactory;

    public function likeable(){
        return $this->morphTo();
    }

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function thread(){
        return $this->belongsTo(Thread::class, 'commentable_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function reports(){
        return $this->morphMany(Report::class, 'reportable');
    }
}
