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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function getLengthToHumanAttribute()
    {
        return gmdate('i:s', $this->value);
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
