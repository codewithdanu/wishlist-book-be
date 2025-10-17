<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with(['author', 'genres', 'ratings.user'])->withAvg('ratings', 'rating');

        if ($request->has('search')) {
            $search = $request->input('search');
            $books->where('title', 'like', "%{$search}%")
                  ->orWhereHas('author', function ($query) use ($search) {
                      $query->where('name', 'like', "%{$search}%");
                  });
        }

        if($request->has('genres')) {
            $genres = $request->input('genres');
            $books->whereHas('genres', function ($query) use ($genres) {
                $query->whereIn('name', (array) $genres);
            });
        }

        if($request->has('languages')) {
            $languages = $request->input('languages');
            $books->where(function ($query) use ($languages) {
                foreach ((array) $languages as $language) {
                    $query->orWhere('languages', 'like', "%{$language}%");
                }
            });
        }

        if($request->has('author')) {
            $author = $request->input('author');
            $books->whereHas('author', function ($query) use ($author) {
                $query->where('name', 'like', "%{$author}%");
            });
        }

        if($request->has('perPage')) {
            $perPage = $request->input('perPage');
            $books = $books->paginate($perPage);
        } else {
            $books = $books->get();
        }

        return response()->json([
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::with(['author', 'genres', 'ratings.user'])->withAvg('ratings', 'rating')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['book' => $book]);
    }

    public function totalReviews()
    {
        $totalReviews = Book::withCount('ratings')->get()->sum('ratings_count');

        return response()->json([
            'total_reviews' => $totalReviews
        ]);
    }
}
