<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        Review::create([
            'description' => $request->input('description'),
            'game_id' => $game->id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('games.show', $game);
    }
}
