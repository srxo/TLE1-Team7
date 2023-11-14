<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SearchController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        // Update the path to the JSON file
        $jsonFile = public_path('data.json');
        $jsonData = File::get($jsonFile);

        $data = json_decode($jsonData, true);

        $results = [];
        foreach ($data as $item) {
            if (stripos($item['name'], $searchTerm) !== false) {
                $results[] = $item;
            }
        }

        return view('search', ['results' => $results]);
    }

    public function details($id)
    {
        // Update the path to the JSON file
        $jsonFile = public_path('data.json');
        $jsonData = File::get($jsonFile);

        $data = json_decode($jsonData, true);

        $details = null;
        foreach ($data as $item) {
            if ($item['name'] === $id) {
                $details = $item;
                break;
            }
        }

        return view('details', ['details' => $details]);
    }
}


