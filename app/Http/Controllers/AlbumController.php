<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create a new album using the validated data
        $album = new Album();
        $album->title = $validatedData['title'];
        $album->save();

        // Redirect or return a success response
        return redirect()->route('albums.index')->with('success', 'Album created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        // Retrieve the album by ID
        $pictures = $album->getMedia();

        // Return a view with the album data
        return view('albums.show', compact('album', 'pictures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the album by ID
        $album = Album::findOrFail($id);

        // Pass the album to the edit view
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // Add more fields as needed
        ]);

        // Find the album by ID
        $album = Album::findOrFail($id);

        // Update the album's title
        $album->title = $validatedData['title'];
        // Update other fields if necessary

        // Save the changes
        $album->save();

        // Redirect back with a success message
        return redirect()->route('albums.index')->with('success', 'Album updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the album by ID
        $album = Album::findOrFail($id);

//        // Check if the album has any associated pictures
//        if ($album->pictures()->count() > 0) {
//            // Prevent deletion if there are pictures
//            return redirect()->route('albums.index')->with('error', 'Album cannot be deleted because it has pictures.');
//        }

        // Delete the album if no pictures are found
        $album->delete();

        // Redirect back with a success message
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully!');
    }

    public function upload(Request $request, Album $album){
        if ($request->has('image')) {
            $album->addMedia($request->image)->toMediaCollection('albums');
        }
        return redirect()->route('albums.index')->with('success', 'Album added successfully!');
    }
}
