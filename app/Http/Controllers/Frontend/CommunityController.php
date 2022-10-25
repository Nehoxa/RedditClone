<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug)
    {
        $communities = Community::where('slug', $slug)->first();
        $posts = CommunityPostResource::collection($communities->posts()->with('user')->paginate(3));

        return Inertia::render('Frontend/Communities/Show', compact('communities', 'posts'));
    }
}
