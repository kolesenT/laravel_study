<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController
{
    public function index(Request $request)
    {
        //dd(Auth::user()->role->name);
        $query = Movie::query()
            ->with(['user', 'genres'])
            ->orderByDesc('created_at');

        if ($request->has('title')) {
            $search = '%'.$request->get('title').'%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
                $q->orWhere('description', 'like', $search);
            });
        }

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        if ($request->has('year')) {
            $query->when($request->get('year') > 0)
                ->where('year', $request->get('year'));
        }

        $movies = $query
            ->paginate(3)
            ->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('home', compact('movies', 'genres', 'actors'));
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
