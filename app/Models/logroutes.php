<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logroutes extends Model
{
    use HasFactory;
    protected $fillable = [
        'objecttype','objectid','user_id','page','objectname'
    ];

    public function courseVideo()
    {
        return $this->belongsTo(CourseVideos::class, 'objectid');
    }
}
