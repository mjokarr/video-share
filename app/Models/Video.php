<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Hekmatinasser\Verta\Verta;
use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory, Likeable;

    // protected $guarded = [];
    protected $fillable = ['name', 'length', 'slug', 'thumbnail', 'description', 'url', 'category_id', 'file'];

    // protected $with = ['user', 'category', 'comments'];

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
        #################################################
        # NOTICE: Catching slug from url to find the video that is active on this page.
        #################################################
        $currentUrl = url()->current(); // get url
        $currentUrl = explode('/', $currentUrl); // Converting to Arr
        $currentVideoSlug = $currentUrl[4]; // Getting slug from url

        $routeKeyName = $this->getRouteKeyName() ?? 'id';
        $getCurrentVideo = $this->where($routeKeyName, $currentVideoSlug)->get(); // Getting current video by slug
        $getCurrentVideoCategoryId = $getCurrentVideo[0]->category_id; // Getting current category id

        $query = $this->where('category_id', $getCurrentVideoCategoryId);

        $allVideosInCategory = $query->get()->all();
        $numberOfAllVideosInCategory = count($allVideosInCategory);
        #################################################
        # NOTICE: Validation for count of related videos.
        #################################################
        if($count > $numberOfAllVideosInCategory)
        {
            return $query->get()->random($numberOfAllVideosInCategory);

        }
        return $query->get()->take($count);

    }

    # Create Relation to Category Class with category method.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    # used in video box component to show category information.
    protected function getCategoryNameAttribute()
    {
        return $this->category?->name;
    }

    protected function getGravatarAttribute ()
    {
        $hash = md5(strtolower($this->attributes['email']));
        return "https://s.gravatar.com/avatar/$hash";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getOwnerNameAttribute ()
    {
        // return $this->with('user')->user?->name;
        // return $this->user?->name->with('user');
        return $this->user?->name;
    }

    protected function getOwnerAvatarAttribute ()
    {
        $hash = md5(strtolower($this->user->email));
        return 'https://s.gravatar.com/avatar/' . $hash;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function getVideoUrlAttribute()
    {
        // $uri = str_replace('public', 'storage', $this->url);
        // return $url = 'http://localhost:8000/' . $uri;
        return Storage::url($this->url);
    }
}

