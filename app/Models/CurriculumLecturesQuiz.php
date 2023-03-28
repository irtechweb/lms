<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumLecturesQuiz extends Model
{
    use HasFactory;

    protected $table = 'curriculum_lectures_quiz';

    protected $fillable = [
        'lecture_quiz_id',
        'section_id',
        'type',
        'title',
        'description',
        'contenttext',
        'media',
        'media_type',
        'sort_order',
        'publish',
        'resources',
        'createdOn',
        'updatedOn',
    ];

    public function courseVideo()
    {
        return $this->belongsTo(CourseVideos::class, 'media');
    }

}
