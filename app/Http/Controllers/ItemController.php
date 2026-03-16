<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private function getItems()
    {
        return Item::with('user')->latest()->get();
    }

    public function home()
    {
        return view('home', ['items' => $this->getItems()]);
    }

    public function index()
    {
        return view('items.index', ['items' => $this->getItems()]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'contact_email' => 'required|email',
            'image' => 'nullable|image'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('items','public');
        }

        $data['user_id'] = auth()->id();

        Item::create($data);

        return redirect('/report')->with('success', 'Your report has been submitted successfully.');
    }
}