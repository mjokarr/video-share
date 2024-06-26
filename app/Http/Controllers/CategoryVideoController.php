<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryVideoController extends Controller
{
    public function index(Category $category)
    {
        $videos = $category->load('videos')->videos()->paginate(18);
        $title = $category->name;
        return view('videos.index', compact('videos', 'title'));
    }
}
