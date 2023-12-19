<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::all();
        $search = $request->input('search');
        $genre = $request->input('genre');

        $query = Game::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('devices', 'like', '%' . $search . '%');
        }

        if ($genre) {
            $query->whereHas('genres', function ($query) use ($genre) {
                $query->whereIn('genre_id', $genre);
            });
        }

        $games = $query->get();

        return view('games', compact('games', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Genre::all();

        $data = $this->validator($request->all())->validate();

        $filename = '';
        if (isset($data['image'])) {
            $image = $data['image'];
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('img/games'), $filename);
        }

        $game = Game::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'devices' => $data['devices'],
            'banner_image' => $filename,
        ]);

        foreach ($data['genre_id'] as $genre) {
            $game->genres()->attach($genre);
        }

        return redirect()->route('games.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }

    /**
     * Validate the specified resource
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string', 'max:500'],
            'devices' => ['required', 'string', 'max:500'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:10000'],
            'genre_id' => ['required', 'array', 'max:2'],
        ]);
    }
}
