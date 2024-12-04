<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        "user_id",
        "content"
        ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function likes()
    {
        return $this->hasMany(Like::class,"user_id");
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where("user_id", $user->id)->exists();
    }
}
