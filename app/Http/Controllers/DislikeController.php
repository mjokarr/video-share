<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DislikeController extends Controller
{
    // public function like(Request $request, string $likeable_type, string $likeable_id) {
    //     $modelName = 'App\\Models\\' . ucfirst($likeable_type);
    //     $routeKey = (new $modelName())->getRouteKeyName();

    //     $likeable = $modelName::where($routeKey, $likeable_id)->first();
    //}

    ##############
    # Notice:
    ##############
    # First we write logic here. similar to the code above.
    # but it would be better if we write our logic in AppServiceProver.php to get likable id and type.
    # and it would be better if we put our code in Likeable Trait to create a query.(for like and dislike)

    public function storeDislike(Request $request, string $likeable_type, $likeable_id)
    {
        $likeable_id->dislikedBy(auth()->user());
        return back();
    }

}

