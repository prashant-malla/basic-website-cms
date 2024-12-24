<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Admin\Post;
use App\Traits\HasFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use HasFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $posts = Post::where('type', $type)->get();

        return view('admin.posts.index', [
            'posts' => $posts,
            'type' => $type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = request()->get('type');

        return view('admin.posts.create', [
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $type = $request->get('type');
        $validated = $request->validated();
        $validated['type'] = $type;
        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadFile($request->file('image'));
        }

        Post::create($validated);

        return to_route('admin.posts.index', ['type' => $type]);
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
    public function edit(Request $request, string $id)
    {
        $type = $request->get('type');
        $post = Post::where('type', $type)->where('id', $id)->firstOrFail();

        return view('admin.posts.edit', [
            'post' => $post,
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $validated = $request->validated();
        $type = $request->get('type');
        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadFile($request->file('image'));
            if ($post->image) {
                $this->deleteFile($post->image);
            }
        }

        $post->update($validated);

        return to_route('admin.posts.index', ['type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = request()->get('type');
        $post = Post::where('id', $id)->findOrFail();
        $post->delete();

        return to_route('admin.posts.index', $type);
    }
}
