<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $menus = Menu::all();
        $comments = $post->comments()->latest('CREATE_DATE')->paginate(10);
        
        return response()->json([
        'menus' => $menus,
        'comments' => $comments,
    ]);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'KOMENTAR_TEXT' => 'required|string|max:255',
            'KOMENTAR_GAMBAR' => 'nullable|string|max:200',
        ]);

        $comment = Comment::create([
            'KOMEN_ID' => Str::uuid(),
            'POSTING_ID' => $post->POSTING_ID,
            'USER_ID' => auth()->id(),
            'KOMENTAR_TEXT' => $request->KOMENTAR_TEXT,
            'KOMENTAR_GAMBAR' => $request->KOMENTAR_GAMBAR,
            'CREATE_BY' => auth()->id(),
        ]);

        return response()->json($comment, 201);
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'KOMENTAR_TEXT' => 'required|string|max:255',
            'KOMENTAR_GAMBAR' => 'nullable|string|max:200',
        ]);

        $comment->update([
            'KOMENTAR_TEXT' => $request->KOMENTAR_TEXT,
            'KOMENTAR_GAMBAR' => $request->KOMENTAR_GAMBAR,
        ]);

        return response()->json($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
