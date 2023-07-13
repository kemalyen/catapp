<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $image = Image::get()->last();
        $user = Auth::user();
        return view('home', compact('image', 'user'));
    }

    public function edit()
    {
        $image = Image::get()->last();
        $user = Auth::user();
        return view('edit', compact('image', 'user'));
    }


    public function update(ImageRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Image::create(['path' => $imageName, 'description' => $request->description]);
        return back()
            ->with('success', 'Image uploaded');
    }
}
