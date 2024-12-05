<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'title',
        'date',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_user')->withPivot('grade')->withTimestamps();
    }
}
