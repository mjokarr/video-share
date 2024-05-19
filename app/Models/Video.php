<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Video extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['name', 'length', 'slug', 'thumbnail', 'description', 'url', 'category_id'];


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

    public function relatedVideos(int $count = 0)
    {
        # If my number of db videos lower than $count, we get an error in the videos.show page.
        # So, we need to get the number of videos in the db first, and after that compare them with $count.

        $numberOfVideosInDatabase = count(Video::all());

        if ($count > $numberOfVideosInDatabase)
        {
            return $newResult = Video::all()->random($numberOfVideosInDatabase);
        }
        return Video::all()->random($count);
    }

    # Create Relation to Category Class with category method.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }
}
