<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dataPost = Post::leftJoin('categories AS cat', 'posts.categories_id', '=', 'cat.id')
            ->select(
                'posts.id',
                'posts.content',
                'posts.image',
                'posts.posted',
                'cat.title AS categories_id',
                'posts.title',
                'posts.slug',
                'posts.description'
            )->paginate(3);

        dd($dataPost);

        return view('dashboard.index', compact('dataPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('title', 'id');

        $dataPost = $this->index()->getData()['dataPost'];

        return view('dashboard.create', compact('categories', 'dataPost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        try {
            Post::create($request->validated());
            return redirect()->route('post.create');
        } catch (\Throwable $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        dd($post->toArray());
        echo "Metod SHOW";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $regisPost = Post::find($id);

        $categories = $this->create()->getData()['categories'];

        return view('dashboard.edit', compact('regisPost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            
            $archivo = $request->file('image');
            $fileName = "post_{$post->id}_".time().'.'.$archivo->extension();
            $data['image'] = $fileName;
            $archivo->move('image', $fileName);
        }

        $post->update($data);

        return to_route('post.create')->with('Mensaje', 'Registro Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return to_route('post.create');
        
    }
}
