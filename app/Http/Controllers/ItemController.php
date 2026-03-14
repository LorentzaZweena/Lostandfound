<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'location' => 'required',
        'status' => 'required',
        'contact_email' => 'required|email'
    ]);

        Item::create($validated);

        return redirect('/items')->with('success','Item reported!');
    }
}
