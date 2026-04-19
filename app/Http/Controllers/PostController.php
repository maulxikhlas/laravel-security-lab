<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import model Post
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Tampilkan halaman guestbook
    public function index()
    {
        $posts = Post::all();
        return view('guestbook', compact('posts'));
    }

    // Simpan komentar (Tanpa filter = Bahaya!)
    public function store(Request $request)
    {
        Post::create([
            'content' => $request->input('content')
        ]);

        return back();
    }
}