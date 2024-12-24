<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PhotoGallery;
use App\Traits\HasFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhotoGalleryController extends Controller
{
    use HasFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = PhotoGallery::get();

        return view('admin.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'main_image' => 'required|image',
            'other_images.*' => 'required|image',
            'is_active' => 'boolean',
        ]);
        $validated['slug'] = Str::slug($validated['title']);
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $this->uploadFile($validated['main_image'], 'photo_galleries');
        }
        $photoGallery = PhotoGallery::create($validated);
        if ($photoGallery) {
            if ($validated['other_images']) {
                foreach ($validated['other_images'] as $image) {
                    $imageName = $this->uploadFile($image, 'photo_galleries');
                    $photoGallery->images()->create(['image_name' => $imageName]);
                }
            }
        }

        return to_route('admin.photo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);

        return view('admin.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'main_image' => 'nullable|image',
            'other_images.*' => 'nullable|image',
            'is_active' => 'boolean',
        ]);
        $photoGallery = PhotoGallery::findOrFail($id);

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $this->uploadFile($validated['main_image'], 'photo_galleries');
            if ($photoGallery->image) {
                $this->deleteFile($photoGallery->image, 'photo_galleries');
            }
        }
        $success = $photoGallery->update($validated);
        if ($success) {
            if ($validated['other_images']) {
                foreach ($validated['other_images'] as $image) {
                    $imageName = $this->uploadFile($image, 'photo_galleries');
                    $photoGallery->images()->create(['image_name' => $imageName]);
                }
            }
        }

        return to_route('admin.photo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = PhotoGallery::findOrFail($id);
        $photo->delete();

        return to_route('admin.photo.index');
    }
}
