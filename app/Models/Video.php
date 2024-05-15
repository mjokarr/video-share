<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Video extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['name', 'length', 'slug', 'thumbnail', 'description', 'url'];


    protected function getLengthAttribute($value)
    {
        return gmdate('i:s', $value);
    }

    protected function getCreatedAtAttribute($value)
    {
        $newVertaTime = new Verta($value);
        return $newVertaTime->formatDifference();
    }

    public function relatedVideos(int $count = 6)
    {
        return Video::all()->random($count);
    }

}
