<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $filename = '';
        if (isset($data['image'])) {
            $image = $data['image'];
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('img/games'), $filename);
        }

        if (array_key_exists('age-warning',$data)) {
            $over18 = 1;
        } else {
            $over18 = 0;
        }

        Game::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'devices' => $data['devices'],
            'age_warning' => $over18,
            'banner_image' => $filename,
        ]);

        return redirect()->route('games.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Game $game)
    {
        // get item from database
        // check for 18+ varaible
        // if 18+ then show warning
        dd($request);
        if ($game->age_warning == '1' && $request === false){
            return view('games.warning', compact('game', 'bypassed'));
        } else {
            return view('games.details');
        }
        // if not then show page
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
            'age-warning' => ['string', 'max:15'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:10000'],
        ]);
    }
}
