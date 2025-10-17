<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json([
            'authors' => Author::with('books')->latest()->orderByDesc('is_popular')->paginate(6)
        ]);
    }
}
