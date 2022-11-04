<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostShowResource;
use App\Models\Community;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = new PostShowResource(Post::with(['comments', 'postVotes' => function($query) {
            $query->where('user_id', auth()->id());
        }])->where('slug', $slug)->first());

        $posts = PostResource::collection($community->posts()->orderBy('votes', 'desc')->take(6)->get());

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post', 'posts'));
    }
}
