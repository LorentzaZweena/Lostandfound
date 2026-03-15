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
        $data = $request->validate([
        'title' => 'required',
        'category' => 'required',
        'location' => 'required',
        'description' => 'required',
        'contact_email' => 'required|email',
        'image' => 'nullable|image|max:2048'
    ]);

    $data['status'] = 'lost';

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('items', 'public');
    }

        Item::create($data);
    }
}