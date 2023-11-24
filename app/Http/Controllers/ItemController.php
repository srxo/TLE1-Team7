<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        // Use the Item model to search for items in the database
        $results = Item::where('name', 'like', '%' . $searchTerm . '%')->get();

        return view('search', ['results' => $results]);
    }

    public function details($id)
    {
        // Use the Item model to retrieve details from the database
        $details = Item::find($id);

        return view('details', ['details' => $details]);
    }
}
