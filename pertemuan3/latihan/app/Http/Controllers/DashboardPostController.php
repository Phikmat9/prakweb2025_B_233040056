<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->id());

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            'posts' => $posts->latest()->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imagePath = $request->file('image')
            ? $request->file('image')->store('post-images', 'public')
            : null;

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Postingan baru berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('dashboard.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $validatedData['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->id();

        $post->update($validatedData);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Postingan berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Postingan berhasil dihapus!');
    }
}
