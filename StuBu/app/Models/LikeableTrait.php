<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

trait LikeableTrait
{

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }


    public function likeit(int $value)
    {
        $like = $this->likes()->where('user_id',auth()->user()->id)->first();
        if($like != NULL){
            if($like->value == $value){
                $like->delete();
                $value = 0;
            }else{
                $like->value = $value;
                $like->save();
            }
        }else{
            $like= new Like();
            $like->user_id = auth()->user()->id;
            $like->value = $value;
            $this->likes()->save($like);
        }
        return $value;
    }

    public function isLiked(){
        $liked = $this->likes()->where('user_id',auth()->user()->id)->first();
        if($liked){
            return $liked->value == 1;
        }else{
            return false;
        }
    }

    public function isUnLiked(){
        $liked = $this->likes()->where('user_id',auth()->user()->id)->first();
        if($liked){
            return $liked->value == -1;
        }else{
            return false;
        }
    }
}
