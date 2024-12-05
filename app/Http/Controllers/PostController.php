<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        // $postings = Post::all();
        $postings = Post::with('comments.user')->get();

        return view('posts.index', compact('postings','menus'));
    }

    public function store(Request $request)
    {
        $posting = new Post;
        $posting->posting_id = uniqid();
        $posting->sender = Auth::user()->name;
        $posting->message_text = $request->message_text;

        if ($request->hasFile('message_gambar')) {
            $image = $request->file('message_gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Simpan langsung ke assets/images tanpa subfolder tambahan
            $image->move(public_path('assets/images'), $imageName);

            // Simpan hanya nama file ke database, tanpa path
            $posting->message_gambar = $imageName;
        }

        $posting->message_gambar = basename($posting->message_gambar);

        $posting->create_by = Auth::user()->id;
        $posting->create_date = now();
        $posting->update_date = now();
        $posting->save();

        return redirect()->route('posts.index');
    }

    public function addComment(Request $request, $posting_id)
    {

        $request->validate([
            'komentar_text' => 'required|string|max:255',
            'komentar_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $comment = new Comment;
        $comment->posting_id = $posting_id;
        $comment->user_id = Auth::user()->id;
        $comment->komentar_text = $request->komentar_text;

        if ($request->hasFile('message_gambar')) {
            $image = $request->file('message_gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('assets/images'), $imageName);

            $posting->message_gambar = $imageName;
        }

        $comment->create_by = Auth::user()->id;
        $comment->create_date = now();
        $comment->save();

        return redirect()->back();
    }

    public function like($posting_id)
    {
        // Cek apakah user sudah like postingan ini
        $existingLike = Like::where('posting_id', $posting_id)
                            ->where('user_id', Auth::user()->id)
                            ->first();

        // Jika sudah ada like, hapus like tersebut (unlike)
        if ($existingLike) {
            $existingLike->delete();

            // Kembalikan jumlah like terbaru setelah unlike
            return response()->json([
                'likes_count' => Like::where('posting_id', $posting_id)->count(),
                'liked' => false // Berikan informasi bahwa like telah dihapus
            ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
        }

        // Jika belum ada like, tambahkan like baru
        $like = new Like;
        $like->like_id = uniqid();
        $like->posting_id = $posting_id;
        $like->user_id = Auth::user()->id;
        $like->create_by = Auth::user()->id;
        $like->create_date = now();
        $like->save();

        // Kembalikan jumlah like terbaru setelah like
        return response()->json([
            'likes_count' => Like::where('posting_id', $posting_id)->count(), // Menghitung jumlah like
            'liked' => true
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }

    public function destroy($posting_id)
    {
        $postings = Post::find($posting_id);

        $postings->delete();

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus.');
    }
}

