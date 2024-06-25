<?php

namespace App\Models;

use App\Observers\LikeObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([LikeObserver::class])]

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'vote'];

    public function likeable(): MorphTo
    {
    return  $this->morphTo();
    }
}
