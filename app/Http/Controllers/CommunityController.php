<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CommunityPost;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = CommunityPost::with('user')->latest()->get();
        return view('community', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'category' => 'nullable|string',
        ]);

        CommunityPost::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'category' => $request->category,
            'likes' => 0,
            'comments_count' => 0,
        ]);
        
        return redirect()->back()->with('success', 'Your anonymous post has been shared with the community.');
    }
}
