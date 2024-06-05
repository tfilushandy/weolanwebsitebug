<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Comment;

class CommentController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'content' => 'required',
        'rating' => 'required|integer|min:1|max:5',
        'produk_id' => 'required|exists:produk,id'
    ]);

    $input = $request->all();
    $input['user_id'] = auth()->user()->id;

    Comment::create($input);

    return back();
}
}
