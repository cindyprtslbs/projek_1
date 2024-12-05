<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;

class LikeController extends Controller
{
    public function toggleLike(Post $post)
    {
        $existing_like = $post->likes()->where('USER_ID', auth()->id())->first();

        if ($existing_like) {
            $existing_like->delete();
            $action = 'unliked';
        } else {
            Like::create([
                'LIKE_ID' => Str::uuid(),
                'POSTING_ID' => $post->POSTING_ID,
                'USER_ID' => auth()->id(),
                'CREATE_BY' => auth()->id(),
            ]);
            $action = 'liked';
        }

        return response()->json([
            'action' => $action,
            'likes_count' => $post->likes()->count(),
        ]);
    }
}
